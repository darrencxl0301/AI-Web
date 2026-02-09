<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\TrainingJob;
use App\Models\Dataset;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $stats = [
            'total_users' => User::count(),
            'total_jobs' => TrainingJob::count(),
            'running_jobs' => TrainingJob::where('status', 'running')->count(),
            'failed_jobs' => TrainingJob::where('status', 'failed')->count(),
            'pending_datasets' => Dataset::where('status', 'pending')->count(), 
        ];

        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers'));
    }

    public function editUser(User $user)
    {
        return view('admin.users-edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:user,admin',
        ]);

        $user->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'User profile updated.');
    }
    public function settings() {
        $apiKey = config('services.llm_api_key'); 
        return view('admin.settings', compact('apiKey'));
    }

    public function auditModel(TrainingJob $job) {
        return response()->json([
            'user' => $job->user->name,
            'parameters' => $job->hyperparameters,
            'custom_prompt' => $job->user_prompt ?? 'Using Admin Default',
            'api_usage' => $job->api_calls_count
        ]);
    }


    public function showDeployLab(TrainingJob $job) {
        if (!auth()->user()->isAdmin()) abort(403);
        return view('admin.deploy-lab', compact('job'));
    }

    public function testInference(Request $request, TrainingJob $job) {
        return response()->json([
            'status' => 'success',
            'response' => "Model [{$job->job_name}] says: Test passed with given prompt."
        ]);
    }
}