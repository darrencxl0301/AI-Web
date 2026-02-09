<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingJob;
use App\Models\BaseModel;
use App\Models\Dataset;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;

class TrainingJobController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = TrainingJob::with(['user', 'baseModel', 'dataset'])->latest();

        if (!$user->isAdmin()) {
            $query->where('user_id', $user->id);
        }

        $jobs = $query->get();

        return view('training-jobs', compact('jobs'));
    }

    public function adminStart(Request $request, $id)
    {
        $job = TrainingJob::findOrFail($id);
        
        $duration = $request->hours . "h " . $request->minutes . "m";

        $job->update([
            'status' => 'running',
            'started_at' => now(),
            'scheduled_duration' => $duration,
            'progress' => 1,
            'hyperparameters' => array_merge($job->hyperparameters ?? [], [
                'epochs' => $request->epochs
            ])
        ]);

        return back();
    }

    public function adminTerminate(Request $request, TrainingJob $job)
    {
        if (!auth()->user()->isAdmin()) abort(403);

        $job->update([
            'status' => 'failed',
            'error_message' => $request->reason
        ]);

        return back()->with('error', 'Job terminated.');
    }
    

    public function create()
    {
        $availableDatasets = Dataset::where('user_id', auth()->id())
                                    ->where('status', 'completed')
                                    ->get();
                                    
        $baseModels = BaseModel::all(); 
        
        return view('training-jobs.create', compact('availableDatasets', 'baseModels'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'job_name' => 'required|string|max:255',
            'base_model_id' => 'required|exists:base_models,id',
            'dataset_id' => 'required|exists:datasets,id',
            'epochs' => 'nullable|integer|min:1|max:100',
            'learning_rate' => 'nullable|numeric'
        ]);

        $dataset = Dataset::where('id', $request->dataset_id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        TrainingJob::create([
            'user_id' => Auth::id(),
            'job_name' => $request->job_name,
            'base_model_id' => $request->base_model_id,
            'dataset_id' => $request->dataset_id,
            'status' => 'queued', 
            'hyperparameters' => [
                'epochs' => $request->input('epochs', 3), 
                'learning_rate' => $request->input('learning_rate', 0.001),
                'batch_size' => 32
            ]
        ]);

        return redirect()->route('training-jobs.index')
                         ->with('success', 'Training job created successfully!');
    }

    public function adminComplete(TrainingJob $job)
    {
        if ($job->status === 'running') {
            $job->update([
                'status' => 'completed',
                'progress' => 100,
                'fine_tuned_model_path' => 'models/outputs/' . $job->job_name . '_v1.bin'
            ]);
        }

        return response()->json(['message' => 'Job completed successfully']);
    }
    public function deploy(TrainingJob $job)
    {
        if ($job->status !== 'completed') {
            return back()->with('error', 'Job must be completed before deployment.');
        }

        $job->update([
            'status' => 'deployed', 
            'fine_tuned_model_path' => 'https://api.sme-ai.com/v1/models/' . $job->job_name
        ]);

        return redirect()->route('model-hub')->with('success', 'Model deployed to production!');
    }






    public function showDeployLab(TrainingJob $job) {
        return view('admin.deploy-lab', compact('job'));
    }

    public function publish(Request $request, TrainingJob $job) {
        $job->update([
            'status' => 'deployed',
            'admin_api_key' => $request->admin_api_key,
            'system_prompt' => $request->system_prompt,
            'is_published' => true
        ]);
        return redirect()->route('training-jobs.index')->with('success', 'Model is LIVE for the user.');
    }


    public function testInference(Request $request, TrainingJob $job)
    {
        $apiKey = $request->input('admin_api_key');
        $systemPrompt = $request->input('system_prompt');
        $userQuery = $request->input('user_query');
        $modelId = "gemini-2.0-flash-lite"; 

        try {
            $url = "https://generativelanguage.googleapis.com/v1/models/{$modelId}:generateContent?key={$apiKey}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => "Instructions: {$systemPrompt}\n\nQuestion: {$userQuery}"]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 500,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Model response empty.';
                
                return response()->json([
                    'success' => true,
                    'output' => $text
                ]);
            }

            $error = $response->json()['error']['message'] ?? 'Unknown API Error';
            return response()->json(['success' => false, 'message' => "Gemini API Error: " . $error]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => "Connection Error: " . $e->getMessage()]);
        }
    }
}