@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex flex-col">
    {{-- 1. Top Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-4">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="h-4 w-px bg-gray-800"></span>
                    <span class="text-gray-400 text-sm font-medium">New training request</span>
                </div>
                <a href="/training-jobs" class="text-gray-400 hover:text-white text-sm">Cancel & Return</a>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
        {{-- 2. Sidebar --}}
        <aside class="hidden lg:flex flex-col w-64 bg-gray-900/50 border-r border-gray-800">
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    Dashboard
                </a>
                <a href="/data-upload" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    Data Upload
                </a>
                <a href="/training-jobs" class="flex items-center px-4 py-3 text-sm font-medium bg-emerald-500/10 text-emerald-400 rounded-xl border border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
                    Training Jobs
                </a>
            </nav>
        </aside>

        {{-- 3. Form Content --}}
        <main class="flex-1 overflow-y-auto bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-emerald-950/10 via-gray-950 to-gray-950">
            <div class="max-w-3xl mx-auto px-8 py-12">
                <div class="mb-10">
                    <h2 class="text-3xl font-bold text-white tracking-tight">Configure Training Job</h2>
                    <p class="text-gray-500 mt-2 text-sm">Fine-tune a Small Language Model with your preprocessed data assets.</p>
                </div>

                <form action="{{ route('training-jobs.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="bg-gray-900/40 border border-white/5 p-8 rounded-[2rem]">
                        <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-4">Task Identification</label>
                        <input type="text" name="job_name" required 
                            class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-white outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                            placeholder="e.g., Customer_Support_Llama_v1">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-900/40 border border-white/5 p-8 rounded-[2rem]">
                            <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-4">Base Architecture</label>
                            <select name="base_model_id" required class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-sm text-white outline-none focus:ring-2 focus:ring-emerald-500">
                                @foreach($baseModels as $bm)
                                    <option value="{{ $bm->id }}">{{ $bm->name }} ({{ $bm->parameters }})</option>
                                @endforeach
                            </select>
                        </div>

                       
                        <div class="bg-gray-900/40 border border-white/5 p-8 rounded-[2rem]">
                            <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-4">Validated Dataset</label>
                            <select name="dataset_id" required class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-sm text-white outline-none focus:ring-2 focus:ring-emerald-500">
                                @forelse($availableDatasets as $ds)
                                    <option value="{{ $ds->id }}">{{ $ds->file_name }}</option>
                                @empty
                                    <option disabled>No validated data available. Contact Admin.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                
                    <div class="bg-gray-900/40 border border-white/5 p-8 rounded-[2rem]">
                        <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-6">Fine-tuning Hyperparameters</label>
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <label class="block text-xs text-gray-500 mb-2">Epochs</label>
                                <input type="number" name="epochs" value="3" min="1" max="10" 
                                    class="w-full bg-black/40 border-gray-800 rounded-xl p-3 text-white outline-none focus:ring-2 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-2">Learning Rate</label>
                                <select name="lr" class="w-full bg-black/40 border-gray-800 rounded-xl p-3 text-sm text-white outline-none focus:ring-2 focus:ring-emerald-500">
                                    <option value="2e-4">2e-4 (Standard)</option>
                                    <option value="1e-5">1e-5 (Conservative)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" @if($availableDatasets->isEmpty()) disabled @endif
                        class="w-full bg-emerald-500 hover:bg-emerald-400 disabled:bg-gray-800 disabled:text-gray-600 text-gray-950 py-5 rounded-[1.5rem] font-black tracking-widest transition-all shadow-xl shadow-emerald-500/20 active:scale-[0.98]">
                        INITIALIZE SLM TRAINING SESSION
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection