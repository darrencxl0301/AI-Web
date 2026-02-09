@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex flex-col">
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Model Hub</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-xs text-gray-500 font-mono hidden md:block">USER_SESSION: {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
    
        <aside class="hidden lg:flex flex-col w-64 bg-gray-900/50 border-r border-gray-800 flex-shrink-0">
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="/data-upload" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    Data Upload
                </a>
                <a href="/training-jobs" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Training Jobs
                </a>

                <a href="/model-hub" class="flex items-center px-4 py-3 text-sm font-medium bg-emerald-500/10 text-emerald-400 rounded-xl border border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Model Hub
                </a>
                <a href="/chat" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Model Testing
                </a>
            </nav>
        </aside>

        {{-- 3. Main Content Area --}}
        <main class="flex-1 overflow-y-auto bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-emerald-950/10 via-gray-950 to-gray-950">
            <div class="max-w-6xl mx-auto px-8 py-10">
                <div class="mb-12">
                    <h2 class="text-3xl font-bold tracking-tight text-white">Model Hub</h2>
                    <p class="text-gray-500 mt-2">Manage, configure and launch your specialized AI models.</p>
                </div>

                @if($publishedModels->isEmpty())
                    <div class="flex flex-col items-center justify-center py-32 border-2 border-dashed border-white/5 rounded-3xl bg-gray-900/20">
                        <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mb-4 text-gray-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <p class="text-gray-500 font-medium text-lg">No published models yet</p>
                        <p class="text-gray-600 text-sm mt-1">Deploy a completed training task from the monitor to see it here.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($publishedModels as $model)
                        <div class="group bg-gray-900/40 border border-white/5 hover:border-emerald-500/40 rounded-3xl p-6 transition-all duration-300 shadow-2xl hover:shadow-emerald-500/10">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <h4 class="text-xl font-bold text-white group-hover:text-emerald-400 transition-colors">{{ $model->job_name }}</h4>
                                    <p class="text-xs text-gray-500 font-mono mt-1 uppercase tracking-wider">{{ $model->baseModel->name }}</p>
                                </div>
                                <span class="flex items-center gap-1.5 text-[10px] bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full font-black border border-emerald-500/20">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                                    LIVE
                                </span>
                            </div>

                            <div class="grid grid-cols-2 gap-4 py-5 border-y border-white/5 mb-8">
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Duration</p>
                                    <p class="text-sm font-mono text-gray-300 mt-0.5">{{ $model->scheduled_duration }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Accuracy</p>
                                    <p class="text-sm text-emerald-400 mt-0.5 font-mono">98.2%</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <a href="/chat?model={{ $model->id }}" class="flex-1 bg-emerald-500 hover:bg-emerald-400 text-gray-950 text-center py-3.5 rounded-2xl text-xs font-black transition-all active:scale-95 shadow-lg shadow-emerald-500/20">
                                    LAUNCH CHAT
                                </a>
        
                                <button onclick="openPromptConfig({{ $model->id }}, '{{ addslashes($model->user_prompt ?? $model->system_prompt) }}')" 
                                    class="p-3.5 bg-white/5 text-gray-400 rounded-2xl hover:text-white hover:bg-white/10 transition-all border border-white/5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>

<div id="promptModal" class="fixed inset-0 z-50 hidden bg-gray-950/90 backdrop-blur-md flex items-center justify-center p-4">
    <div class="bg-gray-900 border border-white/10 w-full max-w-2xl rounded-[2.5rem] overflow-hidden shadow-2xl">
        <form id="promptForm" method="POST">
            @csrf
            <div class="p-10">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-white tracking-tight">Prompt Engineering</h3>
                        <p class="text-sm text-gray-500 mt-1">Customize the core identity of this model.</p>
                    </div>
                    <button type="button" onclick="closePromptModal()" class="text-gray-500 hover:text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mb-3">System Instruction</label>
                        <textarea name="user_prompt" id="modal_prompt_area" rows="12" 
                            class="w-full bg-black/40 border-gray-800 rounded-3xl p-5 text-sm font-mono leading-relaxed text-emerald-100 outline-none focus:ring-2 focus:ring-emerald-500/50 transition-all"
                            placeholder="Loading..."></textarea>
                    </div>

                    <div class="flex items-center justify-between p-5 bg-emerald-500/5 border border-emerald-500/10 rounded-2xl">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                            <span class="text-xs text-emerald-400 font-bold uppercase tracking-wider">Current baseline active</span>
                        </div>
                        <button type="button" id="reset_btn" class="text-[10px] font-black text-gray-500 hover:text-red-400 transition-colors uppercase tracking-widest">
                            RESET TO ADMIN DEFAULT
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800/30 p-8 flex justify-end gap-4 border-t border-white/5">
                <button type="button" onclick="closePromptModal()" class="px-6 py-2 text-sm font-bold text-gray-500">Cancel</button>
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-gray-950 px-10 py-3 rounded-2xl text-sm font-black transition-all shadow-lg shadow-emerald-500/20">
                    SAVE CHANGES
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openPromptConfig(jobId, currentPrompt) {
    const modal = document.getElementById('promptModal');
    const form = document.getElementById('promptForm');
    const textArea = document.getElementById('modal_prompt_area');
    const resetBtn = document.getElementById('reset_btn');
    
    form.action = `/model-hub/${jobId}/update`;
    
    textArea.value = currentPrompt;

    resetBtn.onclick = () => {
        if(confirm('Revert to Admin baseline instructions?')) {
            window.location.href = `/model-hub/${jobId}/reset`;
        }
    };

    modal.classList.remove('hidden');
}

function closePromptModal() {
    document.getElementById('promptModal').classList.add('hidden');
}
</script>
@endsection