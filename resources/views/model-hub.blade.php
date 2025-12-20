{{-- resources/views/model-hub.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Model Hub</span>
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
                            <a href="/training-jobs" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                Training Jobs
                            </a>
                            <a href="/model-hub" class="bg-emerald-900/20 border-r-2 border-emerald-400 text-emerald-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
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
                                    <h1 class="text-2xl font-bold text-white">Model Hub</h1>
                                    <p class="mt-1 text-gray-400">Manage and deploy your AI models across multiple architectures</p>
                                </div>
                                <div class="flex gap-3">
                                    <button class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                        Deploy New Model
                                    </button>
                                    <select class="bg-gray-700 border border-gray-600 rounded-lg text-white px-3 py-2 text-sm">
                                        <option value="all">All Architectures</option>
                                        <option value="deepseek">DeepSeek</option>
                                        <option value="llama">Llama</option>
                                        <option value="qwen">Qwen</option>
                                        <option value="smollm">SmolLM</option>
                                        <option value="pythia">Pythia</option>
                                        <option value="mobilellm">MobileLLM</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Statistics Overview --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white text-lg">🚀</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Model Families</p>
                                        <p class="text-2xl font-semibold text-white">6+</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white text-lg">🌐</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">Open Source</p>
                                        <p class="text-2xl font-semibold text-white">100%</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white text-lg">🔧</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-400">API Ready</p>
                                        <p class="text-2xl font-semibold text-white">✓</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Model Architecture Families --}}
                        <div class="space-y-8">
                            {{-- DeepSeek Models --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-white font-bold text-lg">DS</span>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">DeepSeek</h3>
                                                <p class="text-sm text-gray-400">Advanced reasoning models with strong mathematical capabilities</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">API Ready</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Available Sizes</h4>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1 bg-blue-900/30 text-blue-400 rounded-full text-xs">1.5B</span>
                                                <span class="px-3 py-1 bg-blue-900/30 text-blue-400 rounded-full text-xs">8B</span>
                                                <span class="px-3 py-1 bg-blue-900/30 text-blue-400 rounded-full text-xs">Custom Sizes</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Key Features</h4>
                                            <ul class="text-sm text-gray-400 space-y-1">
                                                <li>• Strong reasoning capabilities</li>
                                                <li>• Mathematical problem solving</li>
                                                <li>• Code generation & analysis</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Llama Models --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-white font-bold text-lg">🦙</span>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">Llama</h3>
                                                <p class="text-sm text-gray-400">Meta's flagship language models, industry standard</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">API Ready</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Available Sizes</h4>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1 bg-purple-900/30 text-purple-400 rounded-full text-xs">1B</span>
                                                <span class="px-3 py-1 bg-purple-900/30 text-purple-400 rounded-full text-xs">3B</span>
                                                <span class="px-3 py-1 bg-purple-900/30 text-purple-400 rounded-full text-xs">8B</span>
                                                <span class="px-3 py-1 bg-purple-900/30 text-purple-400 rounded-full text-xs">All Versions</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Key Features</h4>
                                            <ul class="text-sm text-gray-400 space-y-1">
                                                <li>• Excellent instruction following</li>
                                                <li>• Multilingual support</li>
                                                <li>• Proven performance across tasks</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Qwen Models --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-white font-bold text-lg">Q</span>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">Qwen</h3>
                                                <p class="text-sm text-gray-400">Alibaba's multilingual models, excellent for Asian languages</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">API Ready</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Available Sizes</h4>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">0.5B</span>
                                                <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">1.5B</span>
                                                <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">4B</span>
                                                <span class="px-3 py-1 bg-orange-900/30 text-orange-400 rounded-full text-xs">14B+</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Key Features</h4>
                                            <ul class="text-sm text-gray-400 space-y-1">
                                                <li>• Strong Chinese language support</li>
                                                <li>• Multilingual capabilities</li>
                                                <li>• Efficient inference</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- SmolLM Models --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-white font-bold text-lg">S</span>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">SmolLM</h3>
                                                <p class="text-sm text-gray-400">Efficient small language models for resource-constrained environments</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">API Ready</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Available Sizes</h4>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">1.7B</span>
                                                <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">Optimized Variants</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Key Features</h4>
                                            <ul class="text-sm text-gray-400 space-y-1">
                                                <li>• Ultra-low memory usage</li>
                                                <li>• Fast inference speed</li>
                                                <li>• Perfect for edge deployment</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Pythia Models --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-white font-bold text-lg">P</span>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">Pythia</h3>
                                                <p class="text-sm text-gray-400">Research-oriented models with transparent training</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">API Ready</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Available Sizes</h4>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1 bg-red-900/30 text-red-400 rounded-full text-xs">70M</span>
                                                <span class="px-3 py-1 bg-red-900/30 text-red-400 rounded-full text-xs">1B</span>
                                                <span class="px-3 py-1 bg-red-900/30 text-red-400 rounded-full text-xs">2.8B</span>
                                                <span class="px-3 py-1 bg-red-900/30 text-red-400 rounded-full text-xs">More Sizes</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Key Features</h4>
                                            <ul class="text-sm text-gray-400 space-y-1">
                                                <li>• Transparent training process</li>
                                                <li>• Research-friendly architecture</li>
                                                <li>• Multiple size options</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MobileLLM --}}
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg flex items-center justify-center mr-4">
                                                <span class="text-white font-bold text-lg">📱</span>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">MobileLLM</h3>
                                                <p class="text-sm text-gray-400">Optimized for mobile and edge devices</p>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">API Ready</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Specialization</h4>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1 bg-teal-900/30 text-teal-400 rounded-full text-xs">Mobile Optimized</span>
                                                <span class="px-3 py-1 bg-teal-900/30 text-teal-400 rounded-full text-xs">Edge Computing</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-medium mb-2">Key Features</h4>
                                            <ul class="text-sm text-gray-400 space-y-1">
                                                <li>• Extremely efficient inference</li>
                                                <li>• Minimal power consumption</li>
                                                <li>• On-device deployment</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- API Integration Info --}}
                        <div class="mt-8 bg-indigo-900/20 border border-indigo-500/30 rounded-xl p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-white mb-2">API Fine-tuning Support</h3>
                                    <p class="text-gray-300 mb-4">
                                        All models support API-based fine-tuning with LoRA (Low-Rank Adaptation) for efficient customization. 
                                        Train on your business data while maintaining model performance and minimizing computational requirements.
                                    </p>
                                    <div class="flex gap-3">
                                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">LoRA Compatible</span>
                                        <span class="px-3 py-1 bg-indigo-900/30 text-indigo-400 rounded-full text-xs">API Accessible</span>
                                        <span class="px-3 py-1 bg-purple-900/30 text-purple-400 rounded-full text-xs">Version Control</span>
                                    </div>
                                </div>
                                <a href="/api-integration" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    API Docs
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection