@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex flex-col">
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-4">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400 tracking-tighter">SME.AI</a>
                    <span class="h-4 w-px bg-gray-800"></span>
                    <span class="text-gray-400 text-sm font-medium">
                        {{ auth()->user()->isAdmin() ? 'Global Training Monitor' : 'My Training Studio' }}
                    </span>
                </div>
                <div class="flex items-center space-x-6">
                    <span class="text-xs text-gray-500 font-mono hidden md:block uppercase">Sess_ID: {{ substr(Auth::id(), 0, 8) }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
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
                <a href="/dashboard" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="/data-upload" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:bg-white/5 hover:text-emerald-400 rounded-xl transition-all">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    Data Upload
                </a>
                <a href="/training-jobs" class="flex items-center px-4 py-3 text-sm font-medium bg-emerald-500/10 text-emerald-400 rounded-xl border border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
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

        {{-- 3. Main Content Area --}}
        <main class="flex-1 overflow-y-auto bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-emerald-950/10 via-gray-950 to-gray-950">
            <div class="max-w-6xl mx-auto px-8 py-10">
                
                {{-- Header Section --}}
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-white">
                            {{ auth()->user()->isAdmin() ? 'Global Training Queue' : 'My Training Tasks' }}
                        </h2>
                        <p class="mt-2 text-gray-500">
                            {{ auth()->user()->isAdmin() ? 'Monitor and manage system-wide GPU compute resources.' : 'Real-time monitoring of your SLM fine-tuning tasks.' }}
                        </p>
                    </div>
                    @if(!auth()->user()->isAdmin())
                    <a href="{{ route('training-jobs.create') }}" class="inline-flex items-center px-6 py-3.5 bg-emerald-500 hover:bg-emerald-400 text-gray-950 font-black rounded-2xl transition-all transform hover:scale-105 active:scale-95 shadow-lg shadow-emerald-500/20">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        NEW TRAINING TASK
                    </a>
                    @endif
                </div>

                {{-- Stats Cards --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
                    @php
                        $stats = [
                            ['label' => 'Queued', 'val' => $jobs->where('status', 'queued')->count(), 'color' => 'text-orange-400', 'bg' => 'bg-orange-500/5'],
                            ['label' => 'Running', 'val' => $jobs->where('status', 'running')->count(), 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/5'],
                            ['label' => 'Completed', 'val' => $jobs->where('status', 'completed')->count(), 'color' => 'text-emerald-400', 'bg' => 'bg-emerald-500/5'],
                            ['label' => 'Total Tasks', 'val' => $jobs->count(), 'color' => 'text-white', 'bg' => 'bg-white/5'],
                        ];
                    @endphp
                    @foreach($stats as $stat)
                    <div class="{{ $stat['bg'] }} border border-white/5 rounded-2xl p-5">
                        <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">{{ $stat['label'] }}</p>
                        <p class="text-3xl font-mono font-bold {{ $stat['color'] }} mt-2">{{ $stat['val'] }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Training Jobs List --}}
                <div class="space-y-4">
                    @forelse($jobs as $job)
                    <div class="group bg-gray-900/40 border border-white/5 hover:border-emerald-500/30 rounded-3xl p-6 transition-all duration-300">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            
                            {{-- Identity --}}
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="text-lg font-bold text-white truncate">{{ $job->job_name }}</h3>
                                    @php
                                        $statusClass = [
                                            'queued' => 'bg-orange-500/10 text-orange-400 border-orange-500/20',
                                            'running' => 'bg-blue-500/10 text-blue-400 border-blue-500/20 animate-pulse',
                                            'completed' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                                            'deployed' => 'bg-purple-500/10 text-purple-400 border-purple-500/20',
                                            'failed' => 'bg-red-500/10 text-red-400 border-red-500/20',
                                        ][$job->status] ?? 'bg-gray-800 text-gray-400';
                                    @endphp
                                    <span class="px-2.5 py-0.5 rounded-full border text-[10px] font-black uppercase tracking-tighter {{ $statusClass }}">
                                        {{ $job->status }}
                                    </span>
                                </div>
                                <div class="flex flex-wrap items-center text-sm text-gray-500 gap-x-4">
                                    <span class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-emerald-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg> {{ $job->baseModel->name }}</span>
                                    @if(auth()->user()->isAdmin())
                                    <span class="text-emerald-400/80 font-medium bg-emerald-400/5 px-2 rounded">{{ $job->user->name }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Timing & Progress --}}
                            <div class="flex items-center gap-10">
                                <div class="text-right">
                                    <p class="text-[10px] text-gray-500 uppercase font-black tracking-widest mb-1">
                                        {{ $job->status === 'running' ? 'ETA / STATUS' : 'TOTAL DURATION' }}
                                    </p>
                                    <div class="font-mono text-sm">
                                        @if($job->status === 'running')
                                            <span class="text-blue-400 countdown-timer" 
                                                  data-job-id="{{ $job->id }}" 
                                                  data-remaining="{{ $job->remaining_seconds }}"
                                                  data-total-duration="{{ $job->total_seconds }}"
                                                  data-total-epochs="{{ $job->hyperparameters['epochs'] ?? 3 }}"
                                                  id="timer-{{ $job->id }}">Syncing...</span>
                                            <span class="text-gray-700 mx-1">/</span>
                                            <span class="text-emerald-400" id="epoch-display-{{ $job->id }}">EP {{ $job->current_epoch }}/{{ $job->hyperparameters['epochs'] ?? 3 }}</span>
                                        @elseif(in_array($job->status, ['completed', 'deployed']))
                                            <span class="text-emerald-400 font-bold">FINISHED</span>
                                            <span class="text-gray-700 mx-1">/</span>
                                            <span class="text-gray-300">{{ $job->scheduled_duration }}</span>
                                        @else
                                            <span class="text-gray-500 italic uppercase">{{ $job->scheduled_duration ?? 'Scheduled' }}</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Progress Bar --}}
                                @if(in_array($job->status, ['running', 'completed', 'deployed']))
                                <div class="w-32">
                                    <div class="flex justify-between text-[10px] mb-1.5 font-mono">
                                        <span class="{{ in_array($job->status, ['completed', 'deployed']) ? 'text-emerald-400' : 'text-blue-400' }}">SYNC</span>
                                        <span class="text-white" id="progress-text-{{ $job->id }}">{{ in_array($job->status, ['completed', 'deployed']) ? '100%' : $job->progress.'%' }}</span>
                                    </div>
                                    <div class="w-full bg-gray-800 rounded-full h-1">
                                        <div id="progress-bar-{{ $job->id }}" 
                                             class="{{ in_array($job->status, ['completed', 'deployed']) ? 'bg-emerald-500' : 'bg-blue-500' }} h-1 rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(59,130,246,0.3)]" 
                                             style="width: {{ in_array($job->status, ['completed', 'deployed']) ? '100%' : $job->progress.'%' }}"></div>
                                    </div>
                                </div>
                                @endif

                                {{-- Actions --}}
                                <div class="flex items-center gap-3 min-w-[120px] justify-end">
                                    @if(auth()->user()->isAdmin())
                                        @if($job->status === 'queued')
                                            <button onclick="openStartModal({{ $job->id }})" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-xl text-xs font-black shadow-lg shadow-blue-600/20 transition-all">START</button>
                                        @elseif($job->status === 'running')
                                            <button onclick="openTerminateModal({{ $job->id }})" class="border border-red-500/50 text-red-500 hover:bg-red-500/10 px-4 py-2 rounded-xl text-xs font-bold transition-all">STOP</button>
                                        @elseif($job->status === 'completed')
                                            <a href="{{ route('admin.jobs.deploy-lab', $job->id) }}" class="bg-emerald-500 hover:bg-emerald-400 text-gray-950 px-5 py-2 rounded-xl text-xs font-black shadow-lg shadow-emerald-500/20">DEPLOY</a>
                                        @endif
                                        
                                        <button onclick="openAuditModal({{ json_encode($job->hyperparameters) }}, '{{ $job->job_name }}')" class="p-2.5 bg-white/5 text-blue-400 rounded-xl hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Error Feedback --}}
                        @if($job->status === 'failed' && $job->error_message)
                        <div class="mt-5 p-4 bg-red-500/5 border border-red-500/10 rounded-2xl flex items-start gap-3 text-xs">
                            <svg class="w-4 h-4 text-red-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            <span class="text-red-300/80 leading-relaxed"><strong class="text-red-400">System Error:</strong> {{ $job->error_message }}</span>
                        </div>
                        @endif
                    </div>
                    @empty
                        <div class="py-32 text-center text-gray-600 bg-gray-900/10 rounded-3xl border border-dashed border-white/5 italic">No training cycles found in the queue.</div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</div>

@if(auth()->user()->isAdmin())
    <div id="startModal" class="fixed inset-0 z-50 hidden bg-gray-950/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="bg-gray-900 border border-white/10 w-full max-w-sm rounded-[2.5rem] p-10 shadow-2xl">
            <h3 class="text-xl font-bold mb-8 text-blue-400 tracking-tight">Init Compute Engine</h3>
            <form id="startForm" action="" method="POST" class="space-y-6">
                @csrf @method('PATCH')
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Target Epochs</label>
                    <input type="number" name="epochs" value="3" min="1" max="100" class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-white outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Est. Duration</label>
                    <div class="flex items-center gap-4">
                        <div class="relative flex-1">
                            <input type="number" name="hours" value="1" class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-white outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="absolute right-4 top-4 text-[10px] text-gray-600 font-bold">HRS</span>
                        </div>
                        <div class="relative flex-1">
                            <input type="number" name="minutes" value="30" class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-white outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="absolute right-4 top-4 text-[10px] text-gray-600 font-bold">MIN</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 pt-6">
                    <button type="button" onclick="closeModals()" class="flex-1 text-xs font-black text-gray-500">ABORT</button>
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 py-4 rounded-2xl text-xs font-black shadow-lg shadow-blue-600/20 transition-all">ALLOCATE GPU</button>
                </div>
            </form>
        </div>
    </div>
    <div id="terminateModal" class="fixed inset-0 z-50 hidden bg-gray-950/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="bg-gray-900 border border-white/10 w-full max-w-sm rounded-[2.5rem] p-10 shadow-2xl">
            <h3 class="text-xl font-bold mb-8 text-red-500 tracking-tight">Halt Training</h3>
            <form id="terminateForm" action="" method="POST" class="space-y-6">
                @csrf @method('PATCH')
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Termination Reason</label>
                    <textarea name="reason" rows="3" required class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-white outline-none focus:ring-2 focus:ring-red-500"></textarea>
                </div>
                <div class="flex gap-4 pt-6">
                    <button type="button" onclick="closeModals()" class="flex-1 text-xs font-black text-gray-500">BACK</button>
                    <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 py-4 rounded-2xl text-xs font-black">HALT PROCESS</button>
                </div>
            </form>
        </div>
    </div>
@endif

<script>
    function openStartModal(id) {
        const form = document.getElementById('startForm');
        form.action = `/admin/training-jobs/${id}/start`;
        document.getElementById('startModal').classList.remove('hidden');
    }
    
    function openTerminateModal(id) {
        const form = document.getElementById('terminateForm');
        form.action = `/admin/training-jobs/${id}/terminate`;
        document.getElementById('terminateModal').classList.remove('hidden');
    }

    function closeModals() {
        document.querySelectorAll('[id$="Modal"]').forEach(m => m.classList.add('hidden'));
    }

    function updateLiveStatus() {
        document.querySelectorAll('.countdown-timer').forEach(timer => {
            const jobId = timer.getAttribute('data-job-id');
            let remaining = parseInt(timer.getAttribute('data-remaining'));
            const total = parseInt(timer.getAttribute('data-total-duration')) || 600;
            const totalEpochs = parseInt(timer.getAttribute('data-total-epochs')) || 3;

            const progressBar = document.getElementById(`progress-bar-${jobId}`);
            const progressText = document.getElementById(`progress-text-${jobId}`);
            const epochDisplay = document.getElementById(`epoch-display-${jobId}`);

            if (remaining > 0) {
                remaining--;
                timer.setAttribute('data-remaining', remaining);
                const h = Math.floor(remaining / 3600);
                const m = Math.floor((remaining % 3600) / 60);
                const s = remaining % 60;
                timer.innerText = `${h}h ${m}m ${s}s`;
                const elapsed = total - remaining;
                if (progressBar) {
                    const percent = Math.min(Math.floor((elapsed / total) * 100), 99);
                    progressBar.style.width = percent + '%';
                    progressText.innerText = percent + '%';
                }
                if (epochDisplay) {
                    const ep = Math.min(Math.floor(elapsed / (total / totalEpochs)) + 1, totalEpochs);
                    epochDisplay.innerText = `EP ${ep}/${totalEpochs}`;
                }
            } else {
                timer.innerText = "Finalizing...";
                if (!timer.dataset.synced && timer.classList.contains('text-blue-400')) {
                    timer.dataset.synced = "true";
                    fetch(`/admin/training-jobs/${jobId}/complete`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    }).then(res => { if (res.ok) setTimeout(() => window.location.reload(), 2000); });
                }
            }
        });
    }

    function openAuditModal(params, jobName) {
        alert(`Audit Job: ${jobName}\n\nParameters:\n${JSON.stringify(params, null, 4)}`);
    }

    setInterval(updateLiveStatus, 1000);
    document.addEventListener('DOMContentLoaded', updateLiveStatus);
</script>
@endsection