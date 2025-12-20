{{-- resources/views/solution.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Navigation --}}
    <nav class="fixed top-0 w-full border-b border-white/10 bg-gray-950/80 backdrop-blur-xl z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-300 hover:text-emerald-400 transition-colors">Home</a>
                    <a href="/solution" class="text-emerald-400">Solution</a>
                    <a href="/about" class="text-gray-300 hover:text-emerald-400 transition-colors">About</a>
                    <a href="/contact" class="text-gray-300 hover:text-emerald-400 transition-colors">Contact</a>
                    <a href="/login" 
                       class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-md transition-colors">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <div class="relative overflow-hidden pt-20">
        {{-- Background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-emerald-950/20"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_30%,rgba(16,185,129,0.1)_0%,transparent_50%)]"></div>
        
        <div class="relative z-10 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h1 class="text-5xl lg:text-6xl font-bold bg-gradient-to-r from-emerald-400 via-emerald-300 to-indigo-400 bg-clip-text text-transparent mb-6">
                        Our Solution
                    </h1>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Building your first AI employee: Fast, secure, and running on your own laptop
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Problem vs Solution Section --}}
    <div class="py-20 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-6">
                    The SME AI Gap
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Traditional AI solutions don't understand SME challenges. We built something different.
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                {{-- Traditional Problems --}}
                <div class="bg-red-900/20 border border-red-500/30 rounded-2xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-red-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <span class="text-2xl">❌</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Traditional AI Problems</h3>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-red-400 text-sm">💸</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Expensive & Risky</h4>
                                <p class="text-gray-400 text-sm">Cloud AI costs spiral out of control. Per-token charges create unpredictable bills that can bankrupt SMEs.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-red-400 text-sm">📊</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Data Scattered Everywhere</h4>
                                <p class="text-gray-400 text-sm">Excel files, WeChat logs, emails, PDFs - your valuable business knowledge is trapped in silos.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-red-400 text-sm">⚠️</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Fear of Abandoned Projects</h4>
                                <p class="text-gray-400 text-sm">Systems that stop working after months with no one to maintain them. No internal AI engineers to fix problems.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-red-400 text-sm">🏢</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Generic Solutions</h4>
                                <p class="text-gray-400 text-sm">Big Tech AI doesn't understand your specific industry, processes, or business terminology.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Our Solution --}}
                <div class="bg-emerald-900/20 border border-emerald-500/30 rounded-2xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-emerald-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <span class="text-2xl">✅</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Our SME-First Solution</h3>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-emerald-400 text-sm">💰</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Predictable Costs</h4>
                                <p class="text-gray-400 text-sm">One-time setup cost, then unlimited usage. 90% cost reduction vs cloud AI solutions.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-emerald-400 text-sm">🏠</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Your Data = Your Knowledge</h4>
                                <p class="text-gray-400 text-sm">We transform scattered documents into structured Digital Knowledge Base that becomes your permanent asset.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-emerald-400 text-sm">🎓</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">Academic Support</h4>
                                <p class="text-gray-400 text-sm">TAR UMT research team provides ongoing support. Future-proof design that adapts to new AI models.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-emerald-400 text-sm">🎯</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white mb-2">SME-Specific Training</h4>
                                <p class="text-gray-400 text-sm">AI learns your industry terminology, workflow patterns, and business processes. Not generic responses.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Core Technology Section --}}
    <div class="py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-400 to-indigo-400 bg-clip-text text-transparent mb-6">
                    "The Brain + The Library"
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Our core technology combines deep learning with intelligent data retrieval
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                {{-- LoRA - The Brain --}}
                <div class="bg-pink-900/20 border border-pink-500/30 rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <span class="text-3xl">🧠</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">LoRA = The Brain</h3>
                    <p class="text-gray-400 mb-6">
                        Learns your writing style, reasoning patterns, and business terminology
                    </p>
                    <div class="text-left space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-pink-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Adapts to your company's communication style</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-pink-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Understands industry-specific terminology</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-pink-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Communicates like your senior staff</span>
                        </div>
                    </div>
                </div>
                
                {{-- RAG - The Library --}}
                <div class="bg-indigo-900/20 border border-indigo-500/30 rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <span class="text-3xl">📚</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">RAG = The Library</h3>
                    <p class="text-gray-400 mb-6">
                        Reads and organizes your business documents and data sources
                    </p>
                    <div class="text-left space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-indigo-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Processes SOPs, contracts, Excel sheets</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-indigo-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Answers based on real company data</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-indigo-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Maintains data accuracy and relevance</span>
                        </div>
                    </div>
                </div>
                
                {{-- Feedback Loop --}}
                <div class="bg-emerald-900/20 border border-emerald-500/30 rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <span class="text-3xl">🔄</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Feedback Loop</h3>
                    <p class="text-gray-400 mb-6">
                        Continuous learning from your corrections and interactions
                    </p>
                    <div class="text-left space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Every correction becomes knowledge</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Improves accuracy over time</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                            <span class="text-sm text-gray-300">Adapts to business changes</span>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Core Philosophy --}}
            <div class="bg-gradient-to-r from-gray-800/60 to-gray-700/60 border border-gray-600 rounded-2xl p-8 text-center">
                <blockquote class="text-2xl text-white font-semibold italic mb-4">
                    "The Brain learns how your company speaks.<br>
                    The Library ensures every answer is grounded in your data."
                </blockquote>
                <p class="text-emerald-400 text-lg font-semibold">
                    Result: An AI employee that truly understands your business
                </p>
            </div>
        </div>
    </div>

    {{-- Hardware & Future-Proof Section --}}
    <div class="py-20 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Hardware + Future-Proof Design
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    The killer combination: Runs on your laptop, built to last forever
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Traditional AI (Problems) --}}
                <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-red-400 mb-4 text-center">Traditional AI</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-3 text-gray-400">
                            <span class="text-red-400">❌</span>
                            <span>Requires GPU servers</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400">
                            <span class="text-red-400">❌</span>
                            <span>50,000+ RMB hardware</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400">
                            <span class="text-red-400">❌</span>
                            <span>Needs IT staff</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400">
                            <span class="text-red-400">❌</span>
                            <span>Data leaves company</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400">
                            <span class="text-red-400">❌</span>
                            <span>New models = rebuild everything</span>
                        </div>
                    </div>
                </div>
                
                {{-- Our Solution (Benefits) --}}
                <div class="bg-emerald-900/20 border border-emerald-500/30 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-emerald-400 mb-4 text-center">Our Solution</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-3 text-gray-300">
                            <span class="text-emerald-400">✅</span>
                            <span>Runs on RTX 2000 Ada (8GB)</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-300">
                            <span class="text-emerald-400">✅</span>
                            <span>4B model compressed to ~5GB</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-300">
                            <span class="text-emerald-400">✅</span>
                            <span>Fully offline operation</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-300">
                            <span class="text-emerald-400">✅</span>
                            <span>Data stays in your company</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-300">
                            <span class="text-emerald-400">✅</span>
                            <span>Future-proof architecture</span>
                        </div>
                    </div>
                </div>
                
                {{-- Future-Proof Guarantee --}}
                <div class="bg-purple-900/20 border border-purple-500/30 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-purple-400 mb-4 text-center">Future-Proof Guarantee</h3>
                    <div class="space-y-4 text-sm">
                        <div class="bg-gray-700/30 rounded-lg p-3">
                            <div class="text-purple-400 font-semibold mb-1">Permanent Knowledge Base</div>
                            <div class="text-gray-300">Your data asset lasts forever</div>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-3">
                            <div class="text-purple-400 font-semibold mb-1">Replaceable Models</div>
                            <div class="text-gray-300">Swap Qwen/DeepSeek/Llama anytime</div>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-3">
                            <div class="text-purple-400 font-semibold mb-1">No Vendor Lock-in</div>
                            <div class="text-gray-300">Your knowledge stays with you</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Data Transformation Section --}}
    <div class="py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-400 to-indigo-400 bg-clip-text text-transparent mb-6">
                    Your Data Is a Gold Mine
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    We transform messy business documents into valuable digital assets
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                {{-- Input Data Types --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                    <div class="w-16 h-16 bg-orange-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <span class="text-2xl">📁</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4 text-center">We Work With</h3>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li>• Excel sheets & CSV files</li>
                        <li>• WeChat & email records</li>
                        <li>• SOPs, manuals, contracts</li>
                        <li>• Screenshots, mixed documents</li>
                        <li>• Invoices, logs, reports</li>
                        <li>• Public datasets</li>
                    </ul>
                </div>
                
                {{-- Transformation Process --}}
                <div class="bg-gray-800/40 border border-emerald-500/30 rounded-xl p-6 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-indigo-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <span class="text-3xl">⚙️</span>
                        </div>
                        <h3 class="text-2xl font-bold text-emerald-400 mb-2">Transform Into</h3>
                        <p class="text-gray-400 text-sm">Clean, structured, searchable knowledge</p>
                    </div>
                </div>
                
                {{-- Output Digital Assets --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                    <div class="w-16 h-16 bg-purple-500 rounded-xl mx-auto mb-4 flex items-center justify-center">
                        <span class="text-2xl">💎</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4 text-center">Digital Assets</h3>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li>• Digital Knowledge Base</li>
                        <li>• Enterprise Knowledge Capital</li>
                        <li>• Searchable Business Intelligence</li>
                        <li>• Long-term Digital Assets</li>
                        <li>• Future-proof Data Structure</li>
                        <li>• Permanent Company Memory</li>
                    </ul>
                </div>
            </div>
            
            {{-- Two Paths --}}
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-emerald-900/20 border border-emerald-500/30 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-emerald-400 mb-4">Path A: Structured Data Exists</h3>
                    <div class="space-y-3">
                        <div class="bg-emerald-500/10 rounded-lg p-3">
                            <div class="text-emerald-300 font-semibold">✅ Faster Results</div>
                        </div>
                        <div class="bg-emerald-500/10 rounded-lg p-3">
                            <div class="text-emerald-300 font-semibold">✅ Direct Refinement</div>
                        </div>
                        <div class="bg-emerald-500/10 rounded-lg p-3">
                            <div class="text-emerald-300 font-semibold">✅ Immediate Impact</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-indigo-900/20 border border-indigo-500/30 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-indigo-400 mb-4">Path B: Data is Scattered (Most SMEs)</h3>
                    <div class="space-y-3">
                        <div class="bg-indigo-500/10 rounded-lg p-3">
                            <div class="text-indigo-300 font-semibold">🔧 Clean & Structure Everything</div>
                        </div>
                        <div class="bg-indigo-500/10 rounded-lg p-3">
                            <div class="text-indigo-300 font-semibold">🏗️ Build Knowledge Base from Zero</div>
                        </div>
                        <div class="bg-indigo-500/10 rounded-lg p-3">
                            <div class="text-indigo-300 font-semibold">💎 Create Long-term Knowledge Capital</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="py-16 bg-gradient-to-r from-emerald-900/20 to-indigo-900/20">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-6">
                Ready to See Your AI Employee in Action?
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Experience how our solution transforms your scattered business documents into intelligent, responsive AI assistance.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact"
                   class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-8 py-3 rounded-md text-lg font-semibold transition-all hover:shadow-lg hover:shadow-emerald-500/25">
                    Request Demo
                </a>
                <a href="mailto:research@tarumt.edu.my"
                   class="border border-gray-600 text-gray-300 hover:border-emerald-400 hover:text-emerald-400 px-8 py-3 rounded-md text-lg font-semibold transition-colors">
                    Speak with Research Team
                </a>
            </div>
        </div>
    </div>
</div>
@endsection