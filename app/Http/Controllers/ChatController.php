<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingJob;
use App\Services\GoogleAIService;
use Illuminate\Support\Facades\Process;

class ChatController extends Controller
{
    protected $aiService;

    public function __construct(GoogleAIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function sendMessage(Request $request)
    {
        $userQuery = $request->input('message');
        $modelId = $request->input('model_id');
        $useRag = $request->input('is_rag', false);

        $job = TrainingJob::with('dataset')->find($modelId);
        $context = "";

        if ($useRag && $job && $job->dataset && $job->dataset->usage_type === 'rag') {
            $indexFile = storage_path('app/' . $job->dataset->preprocessed_path);
            $metaFile = str_replace('.index', '_meta.pkl', $indexFile);
            $scriptPath = base_path('scripts/rag_search.py');

            $result = Process::run("python \"{$scriptPath}\" \"{$userQuery}\" \"{$indexFile}\" \"{$metaFile}\"");

            if ($result->successful()) {
                preg_match('/---CONTEXT_START---(.*?)---CONTEXT_END---/s', $result->output(), $matches);
                $context = trim($matches[1] ?? "");
            }
        }

        $finalMessage = $userQuery;
        if (!empty($context)) {
            $finalMessage = "Context for reference:\n{$context} , Please answer the question based on the context.\n\nUser Question: {$userQuery}";
        }

        $modelType = $job->job_type ?? 'default'; 
        $aiResult = $this->aiService->chat($finalMessage, $modelType);

        if ($aiResult['success']) {
            return response()->json([
                'reply' => $aiResult['response'],
                'has_context' => !empty($context)
            ]);
        }

        return response()->json(['reply' => 'Error: ' . $aiResult['error']], 500);
    }
}