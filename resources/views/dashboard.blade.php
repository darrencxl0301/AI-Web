{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Platform</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex items-center text-gray-300 text-sm">
                        <div class="w-2 h-2 bg-emerald-400 rounded-full mr-2"></div>
                        Demo User
                    </div>
                    <div class="relative">
                        <button class="text-gray-400 hover:text-emerald-400 transition-colors" onclick="toggleUserMenu()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </button>
                        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-lg py-2">
                            <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 transition-colors">Profile</a>
                            <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 transition-colors">Settings</a>
                            <hr class="border-gray-700 my-2">
                            <a href="/" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 transition-colors">Logout</a>
                        </div>
                    </div>
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
                            <a href="/dashboard" class="bg-emerald-900/20 border-r-2 border-emerald-400 text-emerald-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
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
                            <a href="/training-jobs" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
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
                            <h1 class="text-2xl font-bold text-white">Dashboard</h1>
                            <p class="mt-1 text-gray-400">Welcome back! Here's what's happening with your AI models.</p>
                        </div>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-400">Datasets</p>
                                        <p class="text-2xl font-semibold text-white">3</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-400">Active Models</p>
                                        <p class="text-2xl font-semibold text-white">2</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-400">Training Jobs</p>
                                        <p class="text-2xl font-semibold text-white">5</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-400">API Calls</p>
                                        <p class="text-2xl font-semibold text-white">1,247</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            {{-- Recent Activity --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <h3 class="text-lg font-medium text-white">Recent Activity</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-emerald-400 rounded-full mr-3"></div>
                                            <div class="flex-1">
                                                <p class="text-sm text-white">Manufacturing QC model training completed</p>
                                                <p class="text-xs text-gray-400">2 hours ago</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-indigo-400 rounded-full mr-3"></div>
                                            <div class="flex-1">
                                                <p class="text-sm text-white">New dataset uploaded: supplier_data.xlsx</p>
                                                <p class="text-xs text-gray-400">5 hours ago</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-purple-400 rounded-full mr-3"></div>
                                            <div class="flex-1">
                                                <p class="text-sm text-white">API key generated for production</p>
                                                <p class="text-xs text-gray-400">1 day ago</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-orange-400 rounded-full mr-3"></div>
                                            <div class="flex-1">
                                                <p class="text-sm text-white">Model testing session: 45 queries processed</p>
                                                <p class="text-xs text-gray-400">2 days ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Quick Actions --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <h3 class="text-lg font-medium text-white">Quick Actions</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <a href="/data-upload" class="flex items-center p-4 bg-emerald-900/20 border border-emerald-500/30 rounded-lg hover:bg-emerald-900/30 transition-colors group">
                                            <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-white font-medium group-hover:text-emerald-300">Upload New Data</p>
                                                <p class="text-gray-400 text-sm">Add documents to train your AI</p>
                                            </div>
                                        </a>
                                        
                                        <a href="/model-testing" class="flex items-center p-4 bg-indigo-900/20 border border-indigo-500/30 rounded-lg hover:bg-indigo-900/30 transition-colors group">
                                            <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-white font-medium group-hover:text-indigo-300">Test Your Models</p>
                                                <p class="text-gray-400 text-sm">Chat with your trained AI</p>
                                            </div>
                                        </a>
                                        
                                        <a href="/training-jobs" class="flex items-center p-4 bg-purple-900/20 border border-purple-500/30 rounded-lg hover:bg-purple-900/30 transition-colors group">
                                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-white font-medium group-hover:text-purple-300">Start Training</p>
                                                <p class="text-gray-400 text-sm">Create new training jobs</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- System Status --}}
                        <div class="mt-8 bg-gray-800/40 border border-gray-700 rounded-xl">
                            <div class="p-6 border-b border-gray-700">
                                <h3 class="text-lg font-medium text-white">System Status</h3>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-emerald-500/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                                            <div class="w-8 h-8 bg-emerald-500 rounded-full"></div>
                                        </div>
                                        <h4 class="text-white font-medium">AI Services</h4>
                                        <p class="text-emerald-400 text-sm">Online</p>
                                    </div>
                                    
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-indigo-500/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                                            <div class="w-8 h-8 bg-indigo-500 rounded-full"></div>
                                        </div>
                                        <h4 class="text-white font-medium">GPU Resources</h4>
                                        <p class="text-indigo-400 text-sm">Available</p>
                                    </div>
                                    
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-purple-500/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                                            <div class="w-8 h-8 bg-purple-500 rounded-full"></div>
                                        </div>
                                        <h4 class="text-white font-medium">Storage</h4>
                                        <p class="text-purple-400 text-sm">2.3GB / 50GB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
function toggleUserMenu() {
    const menu = document.getElementById('userMenu');
    menu.classList.toggle('hidden');
}

// Close user menu when clicking outside
document.addEventListener('click', function(e) {
    const menu = document.getElementById('userMenu');
    const button = e.target.closest('button');
    
    if (!menu.contains(e.target) && !button) {
        menu.classList.add('hidden');
    }
});
</script>
@endsection