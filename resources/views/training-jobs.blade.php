{{-- resources/views/training-jobs.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Training Jobs</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/dashboard" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">← Back to Dashboard</a>
                    <a href="/" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        {{-- Sidebar --}}
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-900/50 border-r border-gray-800">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                    <div class="flex-grow">
                        <nav class="px-3 space-y-1">
                            <a href="/dashboard" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v1H8V5z"></path>
                                </svg>
                                Dashboard
                            </a>
                            <a href="/data-upload" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                Data Upload
                            </a>
                            <a href="/training-jobs" class="bg-emerald-900/20 border-r-2 border-emerald-400 text-emerald-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                Training Jobs
                            </a>
                            <a href="/model-hub" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Model Hub
                            </a>
                            <a href="/model-testing" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Model Testing
                            </a>
                            <a href="/api-integration" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                                API & Integration
                            </a>
                            <a href="/settings" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="flex-1 overflow-hidden">
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{-- Page Header --}}
                        <div class="mb-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl font-bold text-white">Training Jobs</h1>
                                    <p class="mt-1 text-gray-400">Create and manage your AI model training tasks</p>
                                </div>
                                <button onclick="showCreateJobModal()" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    New Training Job
                                </button>
                            </div>
                        </div>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Completed</p>
                                        <p class="text-2xl font-semibold text-white">8</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Running</p>
                                        <p class="text-2xl font-semibold text-white">2</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Queued</p>
                                        <p class="text-2xl font-semibold text-white">3</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Total Jobs</p>
                                        <p class="text-2xl font-semibold text-white">13</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Filter and Sort --}}
                        <div class="mb-6 flex flex-col sm:flex-row gap-4">
                            <select class="bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2 text-sm">
                                <option value="all">All Status</option>
                                <option value="running">Running</option>
                                <option value="completed">Completed</option>
                                <option value="queued">Queued</option>
                                <option value="failed">Failed</option>
                            </select>
                            <select class="bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2 text-sm">
                                <option value="all">All Models</option>
                                <option value="deepseek">DeepSeek</option>
                                <option value="llama">Llama</option>
                                <option value="qwen">Qwen</option>
                                <option value="smollm">SmolLM</option>
                            </select>
                            <div class="flex-1"></div>
                            <div class="relative">
                                <input type="text" placeholder="Search jobs..." class="bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2 text-sm pl-10 w-64">
                                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        {{-- Training Jobs List --}}
                        <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                            <div class="p-6 border-b border-gray-700">
                                <h3 class="text-lg font-medium text-white">Recent Training Jobs</h3>
                            </div>
                            <div class="divide-y divide-gray-700">
                                @forelse($jobs as $job)
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 
                                                @if($job->status === 'completed') bg-emerald-500
                                                @elseif($job->status === 'running') bg-blue-500
                                                @elseif($job->status === 'failed') bg-red-500
                                                @else bg-orange-500
                                                @endif
                                                rounded-lg flex items-center justify-center">
                                                @if($job->status === 'completed')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                @elseif($job->status === 'running')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                    </svg>
                                                @elseif($job->status === 'failed')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                                    </svg>
                                                @else
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-white">{{ $job->name }}</h4>
                                                <p class="text-sm text-gray-400">Training {{ $job->model_type }} on {{ $job->dataset_name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="px-3 py-1 
                                                @if($job->status === 'completed') bg-emerald-900/30 text-emerald-400
                                                @elseif($job->status === 'running') bg-blue-900/30 text-blue-400 animate-pulse
                                                @elseif($job->status === 'failed') bg-red-900/30 text-red-400
                                                @else bg-orange-900/30 text-orange-400
                                                @endif
                                                rounded-full text-xs font-medium">
                                                {{ ucfirst($job->status) }}
                                            </span>
                                            
                                            @if($job->status === 'completed')
                                                <button onclick="deployModel('{{ $job->name }}')" class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                                    Deploy
                                                </button>
                                            @elseif($job->status === 'failed')
                                                <button onclick="retryJob({{ $job->id }})" class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                                    Retry
                                                </button>
                                            @endif
                                            
                                            <button class="text-gray-400 hover:text-white transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid md:grid-cols-4 gap-4 mb-4">
                                        <div>
                                            <p class="text-xs text-gray-400 mb-1">Model</p>
                                            <p class="text-sm text-white font-medium">{{ $job->model_type }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-400 mb-1">Dataset</p>
                                            <p class="text-sm text-white font-medium">{{ $job->dataset_name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-400 mb-1">
                                                @if($job->status === 'running') Started
                                                @elseif($job->status === 'completed') Duration
                                                @elseif($job->status === 'failed') Failed at
                                                @else Queue Position
                                                @endif
                                            </p>
                                            <p class="text-sm text-white font-medium">
                                                @if($job->status === 'running') 
                                                    {{ $job->started_at ? $job->started_at->diffForHumans() : 'Just started' }}
                                                @elseif($job->status === 'completed') 
                                                    {{ $job->duration ?? 'N/A' }}
                                                @elseif($job->status === 'failed') 
                                                    {{ $job->completed_at ? $job->completed_at->diffForHumans() : 'Recently' }}
                                                @else 
                                                    #{{ $loop->index + 1 }}
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-400 mb-1">
                                                @if($job->status === 'completed') Final Loss
                                                @elseif($job->status === 'running') ETA
                                                @else Status
                                                @endif
                                            </p>
                                            <p class="text-sm font-medium
                                                @if($job->status === 'completed') text-emerald-400
                                                @else text-white
                                                @endif">
                                                @if($job->status === 'completed') 
                                                    {{ $job->loss ?? 'N/A' }}
                                                @elseif($job->status === 'running') 
                                                    ~45 minutes
                                                @else 
                                                    {{ ucfirst($job->status) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    
                                    @if($job->status === 'running' && $job->progress > 0)
                                        <div class="mb-3">
                                            <div class="flex justify-between text-sm mb-1">
                                                <span class="text-gray-400">Progress</span>
                                                <span class="text-white">{{ $job->progress }}%</span>
                                            </div>
                                            <div class="w-full bg-gray-700 rounded-full h-2">
                                                <div class="bg-blue-500 h-2 rounded-full transition-all duration-300" style="width: {{ $job->progress }}%"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="grid md:grid-cols-3 gap-4 text-sm">
                                            <div>
                                                <span class="text-gray-400">Loss:</span>
                                                <span class="text-white ml-1">{{ $job->loss ?? 'N/A' }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-400">Learning Rate:</span>
                                                <span class="text-white ml-1">{{ $job->metrics['learning_rate'] ?? '3e-4' }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-400">Epoch:</span>
                                                <span class="text-white ml-1">{{ $job->metrics['current_epoch'] ?? '1' }}/{{ $job->epochs }}</span>
                                            </div>
                                        </div>
                                    @elseif($job->status === 'completed')
                                        <div class="grid md:grid-cols-3 gap-4 text-sm">
                                            <div>
                                                <span class="text-gray-400">Accuracy:</span>
                                                <span class="text-emerald-400 ml-1">{{ $job->accuracy }}%</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-400">Model Size:</span>
                                                <span class="text-white ml-1">~{{ rand(8, 15) / 10 }}GB</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-400">Completed:</span>
                                                <span class="text-white ml-1">{{ $job->completed_at ? $job->completed_at->diffForHumans() : 'Recently' }}</span>
                                            </div>
                                        </div>
                                    @elseif($job->status === 'failed')
                                        <p class="text-xs text-red-400 bg-red-900/20 p-2 rounded mt-2">
                                            {{ $job->error_message }}
                                        </p>
                                    @endif
                                </div>
                                @empty
                                <div class="p-8 text-center">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-white mb-2">No Training Jobs Yet</h3>
                                    <p class="text-gray-400 mb-4">Create your first training job to get started with AI model training.</p>
                                    <button onclick="showCreateJobModal()" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                        Create Training Job
                                    </button>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

{{-- Create Job Modal --}}
<div id="createJobModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" onclick="hideCreateJobModal()"></div>
        
        <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="w-full">
                        <h3 class="text-lg leading-6 font-medium text-white mb-4">Create New Training Job</h3>
                        
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Job Name</label>
                                <input type="text" class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2" placeholder="e.g., Inventory Assistant">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Base Model</label>
                                <select class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2">
                                    <option>Select model...</option>
                                    <option>Qwen-4B</option>
                                    <option>Llama-3B</option>
                                    <option>DeepSeek-1.5B</option>
                                    <option>SmolLM-1.7B</option>
                                    <option>Pythia-1B</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Dataset</label>
                                <select class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2">
                                    <option>Select dataset...</option>
                                    <option>Quality Control Procedures</option>
                                    <option>Supplier Database</option>
                                    <option>Employee Handbook</option>
                                    <option>Customer Service Logs</option>
                                </select>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Epochs</label>
                                    <input type="number" value="3" min="1" max="10" class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Batch Size</label>
                                    <select class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2">
                                        <option>4</option>
                                        <option selected>8</option>
                                        <option>16</option>
                                        <option>32</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button onclick="startTraining()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-600 text-base font-medium text-white hover:bg-emerald-700 sm:ml-3 sm:w-auto sm:text-sm">
                    Start Training
                </button>
                <button onclick="hideCreateJobModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-gray-300 hover:bg-gray-700 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function showCreateJobModal() {
    document.getElementById('createJobModal').classList.remove('hidden');
}

function hideCreateJobModal() {
    document.getElementById('createJobModal').classList.add('hidden');
}

function startTraining() {
    alert('Training job created successfully! It will start once GPU resources are available.');
    hideCreateJobModal();
}

function deployModel(modelName) {
    alert(`Deploying ${modelName} to production environment...`);
}

function retryJob(jobName) {
    alert(`Retrying ${jobName} training job with optimized settings...`);
}

function filterByStatus(status) {
    // 简单的前端过滤
    const jobs = document.querySelectorAll('[data-job-status]');
    jobs.forEach(job => {
        if (status === 'all' || job.getAttribute('data-job-status') === status) {
            job.style.display = 'block';
        } else {
            job.style.display = 'none';
        }
    });
}

function filterByModel(model) {
    const jobs = document.querySelectorAll('[data-job-model]');
    jobs.forEach(job => {
        if (model === 'all' || job.getAttribute('data-job-model') === model) {
            job.style.display = 'block';
        } else {
            job.style.display = 'none';
        }
    });
}
</script>
@endsection