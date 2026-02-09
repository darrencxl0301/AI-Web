@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex flex-col">
    {{-- 1. Top Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-4">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400 tracking-tighter">SME.AI</a>
                    <span class="h-4 w-px bg-gray-800"></span>
                    <span class="text-gray-400 text-sm font-medium">Command Center</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex items-center text-gray-300 text-sm bg-white/5 px-3 py-1.5 rounded-full border border-white/5">
                        <div class="w-2 h-2 bg-emerald-400 rounded-full mr-2 animate-pulse"></div>
                        {{ auth()->user()->name }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-red-400 transition-colors text-sm font-bold">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
        <aside class="hidden lg:flex flex-col w-64 bg-gray-900/50 border-r border-gray-800 flex-shrink-0">
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-sm font-medium bg-emerald-500/10 text-emerald-400 rounded-xl border border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
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
                <a href="/model-hub" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Model Hub
                </a>
                <a href="/chat" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Model Testing
                </a>
            </nav>
        </aside>

        {{-- 3. Main Content --}}
        <main class="flex-1 overflow-y-auto bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-emerald-950/10 via-gray-950 to-gray-950">
            <div class="max-w-6xl mx-auto px-8 py-10">
                <div class="mb-12">
                    <h2 class="text-3xl font-bold tracking-tight text-white">Dashboard Overview</h2>
                    <p class="mt-2 text-gray-500">Welcome back, {{ explode(' ', auth()->user()->name)[0] }}. Monitor your model performance and data lifecycle.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    <div class="bg-gray-900/40 border border-white/5 rounded-3xl p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-500/10 rounded-2xl flex items-center justify-center text-emerald-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Total Datasets</p>
                                <p class="text-3xl font-mono font-bold text-white">{{ $stats['datasets'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900/40 border border-white/5 rounded-3xl p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-500/10 rounded-2xl flex items-center justify-center text-indigo-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Active Models</p>
                                <p class="text-3xl font-mono font-bold text-white">{{ $stats['active_models'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900/40 border border-white/5 rounded-3xl p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-purple-500/10 rounded-2xl flex items-center justify-center text-purple-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Storage Used</p>
                                <p class="text-3xl font-mono font-bold text-white">2.4 GB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- 1. Recent Training Activity --}}
                    <div class="bg-gray-900/40 border border-white/5 rounded-[2.5rem] overflow-hidden shadow-2xl">
                        <div class="p-8 border-b border-white/5 bg-white/5 flex justify-between items-center">
                            <h3 class="font-bold text-lg">Training Cycles</h3>
                            <a href="/training-jobs" class="text-[10px] font-black text-emerald-400 hover:text-white uppercase tracking-widest">View All</a>
                        </div>
                        <div class="p-8 space-y-6">
                            @forelse($recentActivity as $job)
                            <div class="flex items-center gap-4 group">
                                <div class="w-2 h-2 rounded-full {{ $job->status === 'completed' ? 'bg-emerald-400' : 'bg-orange-400' }}"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-gray-200 group-hover:text-emerald-400 transition-colors">{{ $job->job_name }}</p>
                                    <p class="text-[10px] text-gray-500 font-mono uppercase">{{ $job->status }} • {{ $job->updated_at->diffForHumans() }}</p>
                                </div>
                                <a href="/chat?model={{ $job->id }}" class="p-2 bg-white/5 rounded-lg text-gray-500 hover:text-white transition-all opacity-0 group-hover:opacity-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                            @empty
                            <p class="text-gray-600 text-sm italic">No training data detected.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- 2. Quick Workflow Actions --}}
                    <div class="space-y-6">
                        <h3 class="text-sm font-black text-gray-500 uppercase tracking-[0.2em] px-2">Launch Protocol</h3>
                        
                        <a href="/data-upload" class="flex items-center p-6 bg-emerald-500/5 border border-emerald-500/10 rounded-3xl hover:bg-emerald-500/10 transition-all group">
                            <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center mr-5 shadow-lg shadow-emerald-500/20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-gray-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold group-hover:text-emerald-400">Ingest Knowledge Assets</p>
                                <p class="text-gray-500 text-xs mt-1">Upload business intelligence for preprocessing.</p>
                            </div>
                        </a>

                        <a href="/training-jobs/create" class="flex items-center p-6 bg-indigo-500/5 border border-indigo-500/10 rounded-3xl hover:bg-indigo-500/10 transition-all group">
                            <div class="w-12 h-12 bg-indigo-500 rounded-2xl flex items-center justify-center mr-5 shadow-lg shadow-indigo-500/20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold group-hover:text-indigo-400">Initiate Fine-Tuning</p>
                                <p class="text-gray-500 text-xs mt-1">Spawn a new SLM training task.</p>
                            </div>
                        </a>

                        <a href="/chat" class="flex items-center p-6 bg-purple-500/5 border border-purple-500/10 rounded-3xl hover:bg-purple-500/10 transition-all group">
                            <div class="w-12 h-12 bg-purple-500 rounded-2xl flex items-center justify-center mr-5 shadow-lg shadow-purple-500/20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold group-hover:text-purple-400">Inference Laboratory</p>
                                <p class="text-gray-500 text-xs mt-1">Chat and validate your specialized models.</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- System Health (Hardware indicators) --}}
                <div class="mt-12 bg-gray-900/20 border border-white/5 rounded-[2.5rem] p-10">
                    <div class="flex items-center justify-between mb-8 px-2">
                        <h3 class="text-sm font-black text-gray-500 uppercase tracking-[0.2em]">Network Node Status</h3>
                        <span class="text-[10px] font-mono text-emerald-500">SYSTEM_HEALTH: 100%</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <div class="flex items-center gap-4">
                            <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
                            <div>
                                <p class="text-xs font-bold">Cloud Inference</p>
                                <p class="text-[10px] text-emerald-400 uppercase font-black">Stable</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 border-l border-white/5 pl-10">
                            <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
                            <div>
                                <p class="text-xs font-bold">GPU Cluster</p>
                                <p class="text-[10px] text-emerald-400 uppercase font-black">Active</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 border-l border-white/5 pl-10">
                            <div class="w-3 h-3 bg-indigo-500 rounded-full shadow-[0_0_10px_rgba(99,102,241,0.5)]"></div>
                            <div>
                                <p class="text-xs font-bold">Encrypted Storage</p>
                                <p class="text-[10px] text-indigo-400 uppercase font-black">Synced</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection