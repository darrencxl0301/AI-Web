<?php

namespace App\Http\Controllers;

use App\Models\TrainingJob;
use App\Models\Dataset; 
use Illuminate\Http\Request;

class ModelHubController extends Controller
{
    public function index()
    {
        $publishedModels = TrainingJob::where('user_id', auth()->id())
                            ->where('is_published', true)
                            ->latest()
                            ->get();

        return view('model-hub', compact('publishedModels'));
    }

    public function updateConfig(Request $request, TrainingJob $job) {
        if ($job->user_id !== auth()->id()) abort(403);
        
        $job->update(['user_prompt' => $request->user_prompt]);
        return back()->with('success', 'Your custom instructions have been saved.');
    }

    public function resetConfig(TrainingJob $job) {
        if ($job->user_id !== auth()->id()) abort(403);
        
        $job->update(['user_prompt' => null]);
        return back()->with('success', 'Model reverted to Admin baseline.');
    }

    // app/Http/Controllers/ModelHubController.php

    public function testing(Request $request)
    {
        $publishedModels = TrainingJob::where('user_id', auth()->id())
                            ->where('is_published', true)
                            ->with(['baseModel', 'dataset']) 
                            ->latest()
                            ->get();

        $availableRagDatasets = \App\Models\Dataset::where('user_id', auth()->id())
                            ->where('usage_type', 'rag')
                            ->where('status', 'completed')
                            ->get();

        $selectedModelId = $request->query('model');

        if (!$selectedModelId && $publishedModels->isNotEmpty()) {
            $selectedModelId = $publishedModels->first()->id;
        }

        return view('model-testing', compact('publishedModels', 'selectedModelId', 'availableRagDatasets'));
    }
}