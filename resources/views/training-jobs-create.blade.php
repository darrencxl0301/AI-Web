{{-- resources/views/training-jobs-create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    {{-- Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Training Studio</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('training-jobs.index') }}" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">← Back to Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <h1 class="text-3xl font-bold tracking-tight">Create New Training Job</h1>
            <p class="mt-2 text-gray-400 text-lg">Fine-tune a Small Language Model (SLM) with your specific business data.</p>
        </div>

        <form method="POST" action="{{ route('training-jobs.store') }}" class="space-y-8">
            @csrf

            <div class="bg-gray-900/50 border border-gray-800 rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 rounded-full bg-emerald-500/10 flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold">General Settings</h3>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label for="job_name" class="block text-sm font-medium text-gray-400 mb-2">Job Name</label>
                        <input type="text" name="job_name" id="job_name" required 
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition-all" 
                               placeholder="e.g. Customer-Support-Qwen-v1">
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
                <div class="bg-gray-900/50 border border-gray-800 rounded-2xl p-8">
                    <label class="block text-sm font-medium text-gray-400 mb-4 uppercase tracking-wider text-xs">Step 1: Base Model</label>
                    <select name="base_model_id" required class="w-full bg-gray-800 border-gray-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="" disabled selected>Select an AI model...</option>
                        @foreach($baseModels as $model)
                            <option value="{{ $model->id }}">{{ $model->name }} ({{ $model->provider }})</option>
                        @endforeach
                    </select>
                </div>

        
                <div class="bg-gray-900/50 border border-gray-800 rounded-2xl p-8">
                    <label class="block text-sm font-medium text-gray-400 mb-4 uppercase tracking-wider text-xs">Step 2: Training Data</label>
                    <select name="dataset_id" required class="w-full bg-gray-800 border-gray-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="" disabled selected>Choose a dataset...</option>
                        @forelse($datasets as $dataset)
                            <option value="{{ $dataset->id }}">{{ $dataset->file_name }}</option>
                        @empty
                            <option disabled>No files uploaded yet</option>
                        @endforelse
                    </select>
                </div>
            </div>


            <div class="bg-gray-900/50 border border-gray-800 rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold">Training Parameters (LoRA)</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Epochs</label>
                        <input type="number" name="epochs" value="3" min="1" max="50"
                               class="w-full bg-gray-800 border-gray-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-blue-500 outline-none">
                        <p class="mt-2 text-xs text-gray-500">Number of times to iterate over the dataset.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Learning Rate</label>
                        <input type="text" name="learning_rate" value="0.0002"
                               class="w-full bg-gray-800 border-gray-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-blue-500 outline-none">
                        <p class="mt-2 text-xs text-gray-500">Suggested: 2e-4 for QLoRA fine-tuning.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-6 pt-4">
                <a href="{{ route('training-jobs.index') }}" class="text-gray-400 hover:text-white transition-colors">Cancel</a>
                <button type="submit" 
                        class="px-10 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold rounded-2xl transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-emerald-500/20">
                    Initialize Training
                </button>
            </div>
        </form>
    </div>
</div>
@endsection