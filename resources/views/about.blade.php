{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Hero Section --}}
    <div class="relative overflow-hidden">
        {{-- Background gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-emerald-950/20"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_40%,rgba(16,185,129,0.1)_0%,transparent_60%)]"></div>
        
        <div class="relative z-10 pt-20 pb-16">
            {{-- Navigation (same as home) --}}
            <nav class="fixed top-0 w-full border-b border-white/10 bg-gray-950/80 backdrop-blur-xl z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                        </div>
                        <div class="hidden md:flex items-center space-x-8">
                            <a href="{{ route('home') }}" class="text-gray-300 hover:text-emerald-400 transition-colors">Home</a>
                            <a href="{{ route('solution') }}" class="text-gray-300 hover:text-emerald-400 transition-colors">Solution</a>
                            <a href="{{ route('about') }}" class="text-emerald-400">About</a>
                            <a href="{{ route('contact') }}" class="text-gray-300 hover:text-emerald-400 transition-colors">Contact</a>
                            <a href="{{ route('login') }}" 
                               class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-md transition-colors">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
                {{-- Page Header --}}
                <div class="text-center mb-16">
                    <h1 class="text-5xl lg:text-6xl font-bold bg-gradient-to-r from-emerald-400 via-emerald-300 to-indigo-400 bg-clip-text text-transparent mb-6">
                        About SME AI
                    </h1>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Transforming messy SME documents into long-term digital assets through academic excellence and practical innovation.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Mission Section --}}
    <div class="py-20 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-white mb-6">
                        Our Vision: AI as a Real Employee
                    </h2>
                    <p class="text-lg text-gray-300 mb-6">
                        Not a chatbot. Not another tool. But an AI employee that understands your business, 
                        learns from your data, and becomes better every month.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold">🧠</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">The Brain (LoRA)</h3>
                                <p class="text-gray-400">Learns your writing style, reasoning, and terminology to communicate like your senior staff.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold">📚</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">The Library (RAG)</h3>
                                <p class="text-gray-400">Reads your SOPs, Excel sheets, contracts, and price lists to answer based on real company data.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white font-bold">🔄</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-2">Feedback Loop</h3>
                                <p class="text-gray-400">Every correction becomes internal knowledge, making the AI smarter with each interaction.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-400 to-indigo-400 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <span class="text-3xl">🎯</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Our Core Belief</h3>
                        <blockquote class="text-lg text-gray-300 italic leading-relaxed">
                            "The Brain learns how your company speaks.<br>
                            The Library ensures every answer is grounded in your data."
                        </blockquote>
                        <p class="text-emerald-400 font-semibold mt-6">
                            Your data. Your model. Your AI employee.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Academic Foundation --}}
    <div class="py-20 bg-gradient-to-b from-gray-900/50 to-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-400 to-indigo-400 bg-clip-text text-transparent mb-6">
                    Academic Excellence
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Rigorous research foundation meets practical business application
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                {{-- University Card --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8 text-center">
                    <div class="h-20 mx-auto mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/TARUMT_logo.png') }}" 
                             alt="TAR UMT Logo" 
                             class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">TAR UMT</h3>
                    <p class="text-lg font-semibold text-emerald-400 mb-3">
                        Tunku Abdul Rahman University of Management and Technology
                    </p>
                    <p class="text-gray-400">
                        Leading institution in Malaysia known for innovation in business technology and entrepreneurial development.
                    </p>
                </div>
                
                {{-- Research Center Card --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8 text-center">
                    <div class="h-20 mx-auto mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/CBIEV_logo.png') }}" 
                             alt="CBIEV Logo" 
                             class="max-h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">CBIEV</h3>
                    <p class="text-lg font-semibold text-emerald-400 mb-3">
                        Centre for Business Incubation & Entrepreneurial Ventures
                    </p>
                    <p class="text-gray-400">
                        Bridging academic research with real-world business applications, fostering innovation and entrepreneurship.
                    </p>
                </div>
            </div>
            
            {{-- Leadership --}}
            <div class="bg-gradient-to-r from-gray-800/60 to-gray-700/60 border border-gray-600 rounded-2xl p-8">
                <div class="grid md:grid-cols-3 gap-8 items-center">
                    <div class="md:col-span-1 text-center">
                        <div class="w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden border-4 border-emerald-500/30">
                            <img src="{{ asset('images/prof.png') }}" 
                                 alt="Prof. Lim Tong Ming" 
                                 class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Prof. Lim Tong Ming</h3>
                        <p class="text-emerald-400 font-semibold">Research Supervisor</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <h4 class="text-xl font-semibold text-white mb-4">Research Leadership</h4>
                        <p class="text-gray-300 mb-4">
                            Under Prof. Lim Tong Ming's supervision, our research team focuses on developing 
                            practical AI solutions that address real-world SME challenges. Our work combines 
                            cutting-edge machine learning techniques with deep understanding of business processes.
                        </p>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-700/50 rounded-lg p-3">
                                <div class="font-semibold text-emerald-400 mb-1">Research Focus</div>
                                <div class="text-gray-300">SME AI Optimization</div>
                            </div>
                            <div class="bg-gray-700/50 rounded-lg p-3">
                                <div class="font-semibold text-emerald-400 mb-1">Approach</div>
                                <div class="text-gray-300">Academic + Practical</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Technical Advantages --}}
    <div class="py-20 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Why Our Approach Works
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    The killer combination of academic rigor and practical business understanding
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Problem Understanding --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-red-500 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">⚠️</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">SME Pain Points</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>• Data scattered everywhere</li>
                        <li>• No internal AI engineers</li>
                        <li>• Fear of abandoned projects</li>
                        <li>• AI sounds expensive & risky</li>
                    </ul>
                </div>
                
                {{-- Our Solution --}}
                <div class="bg-gray-800/40 border border-emerald-500/30 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-emerald-500 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">✅</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Our Solution</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>• Clean and structure everything</li>
                        <li>• Runs on 8GB laptop</li>
                        <li>• Future-proof design</li>
                        <li>• Affordable & predictable</li>
                    </ul>
                </div>
                
                {{-- Unique Advantage --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">🎓</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Academic Edge</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>• Rigorous research methodology</li>
                        <li>• Long-term sustainability</li>
                        <li>• Continuous improvement</li>
                        <li>• No vendor lock-in</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Use Cases --}}
    <div class="py-20 bg-gradient-to-b from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-400 to-indigo-400 bg-clip-text text-transparent mb-6">
                    High-Value Use Cases
                </h2>
                <p class="text-xl text-gray-300">
                    Proven applications across multiple SME sectors
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $useCases = [
                        [
                            'icon' => '🏭',
                            'title' => 'Manufacturing',
                            'description' => 'Inventory lookup, parts management, production documents, quality control processes'
                        ],
                        [
                            'icon' => '📦',
                            'title' => 'Trading & E-commerce',
                            'description' => 'SKU answers, logistics coordination, product data management, supplier information'
                        ],
                        [
                            'icon' => '🏗️',
                            'title' => 'Construction & Engineering',
                            'description' => 'Contracts management, project delays tracking, safety documents, compliance'
                        ],
                        [
                            'icon' => '🏨',
                            'title' => 'Hospitality & Services',
                            'description' => 'Reservations system, staff onboarding, SOP search, customer service protocols'
                        ],
                        [
                            'icon' => '👥',
                            'title' => 'HR & Admin',
                            'description' => 'Policies management, onboarding procedures, payroll FAQs, employee handbook'
                        ],
                        [
                            'icon' => '📊',
                            'title' => 'SQL for Humans',
                            'description' => 'Natural language database queries: "How much stock left?" → Automatic SQL → Results'
                        ]
                    ];
                @endphp
                
                @foreach($useCases as $case)
                    <div class="bg-gray-800/40 border border-gray-700 hover:border-emerald-500/30 rounded-lg p-6 transition-colors">
                        <div class="text-4xl mb-4">{{ $case['icon'] }}</div>
                        <h3 class="text-xl font-semibold text-white mb-3">{{ $case['title'] }}</h3>
                        <p class="text-gray-400 text-sm">{{ $case['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="py-16 bg-gradient-to-r from-emerald-900/20 to-indigo-900/20">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-6">
                Ready to Transform Your Business Documents?
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Let our academic research team show you how to convert messy SME documents into valuable digital assets.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}"
                   class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-8 py-3 rounded-md text-lg font-semibold transition-all hover:shadow-lg hover:shadow-emerald-500/25">
                    Start Your Pilot
                </a>
                <a href="mailto:research@tarumt.edu.my"
                   class="border border-gray-600 text-gray-300 hover:border-emerald-400 hover:text-emerald-400 px-8 py-3 rounded-md text-lg font-semibold transition-colors">
                    Contact Research Team
                </a>
            </div>
        </div>
    </div>
</div>
@endsection