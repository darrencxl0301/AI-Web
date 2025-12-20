<?php

namespace App\Http\Controllers;

use App\Models\TrainingJob;
use Illuminate\Http\Request;

class TrainingJobController extends Controller
{
    public function index()
    {
        $jobs = TrainingJob::orderBy('created_at', 'desc')->get();
        
        return view('training-jobs', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model_type' => 'required|string',
            'dataset_name' => 'required|string',
            'epochs' => 'required|integer|min:1|max:10',
            'batch_size' => 'required|integer|in:4,8,16,32'
        ]);

        $job = TrainingJob::create([
            'name' => $request->name,
            'model_type' => $request->model_type,
            'dataset_name' => $request->dataset_name,
            'epochs' => $request->epochs,
            'batch_size' => $request->batch_size,
            'status' => 'queued'
        ]);

        // Simulate training job progression (in a real app, this would be handled by a queue)
        $this->simulateTraining($job);

        return response()->json([
            'message' => 'Training job created successfully',
            'job' => $job
        ]);
    }

    public function show(TrainingJob $job)
    {
        return response()->json($job);
    }

    public function retry(TrainingJob $job)
    {
        $job->update([
            'status' => 'queued',
            'progress' => 0,
            'error_message' => null,
            'started_at' => null,
            'completed_at' => null
        ]);

        $this->simulateTraining($job);

        return response()->json([
            'message' => 'Training job restarted',
            'job' => $job
        ]);
    }

    protected function simulateTraining(TrainingJob $job)
    {
        // This would normally be handled by a queue job
        // For demo purposes, we'll update the job status periodically
        
        // Mark as started
        $job->update([
            'status' => 'running',
            'started_at' => now()
        ]);

        // Simulate completion after some time (in real app, use queue jobs)
        // For now, we'll just set some realistic values
        if (rand(1, 10) > 8) {
            // 20% chance of failure
            $job->update([
                'status' => 'failed',
                'error_message' => 'Out of memory during training. Consider reducing batch size.',
                'completed_at' => now()
            ]);
        } else {
            // 80% chance of success
            $job->update([
                'status' => 'completed',
                'progress' => 100,
                'loss' => round(rand(50, 200) / 1000, 4), // Random loss between 0.05-0.2
                'accuracy' => round(rand(85, 98) + rand(0, 99) / 100, 2), // Random accuracy 85-98%
                'completed_at' => now()->addMinutes(rand(30, 120)),
                'metrics' => [
                    'final_loss' => round(rand(50, 200) / 1000, 4),
                    'best_accuracy' => round(rand(85, 98) + rand(0, 99) / 100, 2),
                    'total_epochs' => $job->epochs,
                    'learning_rate' => '3e-4'
                ]
            ]);
        }
    }

    public function getStats()
    {
        $stats = [
            'total' => TrainingJob::count(),
            'completed' => TrainingJob::where('status', 'completed')->count(),
            'running' => TrainingJob::where('status', 'running')->count(),
            'queued' => TrainingJob::where('status', 'queued')->count(),
            'failed' => TrainingJob::where('status', 'failed')->count(),
        ];

        return response()->json($stats);
    }
}