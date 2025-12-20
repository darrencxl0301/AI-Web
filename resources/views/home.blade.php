{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Navigation --}}
    <nav class="fixed top-0 w-full border-b border-white/10 bg-gray-950/90 backdrop-blur-xl z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold font-mono text-emerald-400">SME.AI</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-emerald-400 font-medium">Home</a>
                    <a href="/solution" class="text-gray-300 hover:text-emerald-400 transition-colors">Solution</a>
                    <a href="/about" class="text-gray-300 hover:text-emerald-400 transition-colors">About</a>
                    <a href="/contact" class="text-gray-300 hover:text-emerald-400 transition-colors">Contact</a>
                    <a href="/login" 
                       class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-md transition-colors font-medium">
                        Login
                    </a>
                </div>
                {{-- Mobile menu button --}}
                <div class="md:hidden">
                    <button class="text-gray-300 hover:text-emerald-400" onclick="toggleMobileMenu()">
                        <span class="sr-only">Open menu</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-gray-950/95 backdrop-blur-xl border-t border-white/10">
            <div class="px-4 py-4 space-y-3">
                <a href="/" class="block text-emerald-400 font-medium">Home</a>
                <a href="/solution" class="block text-gray-300 hover:text-emerald-400 transition-colors">Solution</a>
                <a href="/about" class="block text-gray-300 hover:text-emerald-400 transition-colors">About</a>
                <a href="/contact" class="block text-gray-300 hover:text-emerald-400 transition-colors">Contact</a>
                <a href="/login" class="block bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-md transition-colors font-medium text-center">Login</a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative overflow-hidden pt-16">
        {{-- Background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-emerald-950/20"></div>
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10 min-h-screen flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    {{-- Left: Content --}}
                    <div class="space-y-8 text-center lg:text-left">
                        {{-- Badge --}}
                        <div class="inline-flex items-center px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full text-emerald-400 text-sm font-medium">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full mr-2"></span>
                            Academic Research • TAR UMT • Prof. Lim Tong Ming
                        </div>
                        
                        {{-- Main Headline --}}
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight">
                            <span class="bg-gradient-to-r from-emerald-400 via-emerald-300 to-indigo-400 bg-clip-text text-transparent">
                                Your First AI Employee
                            </span>
                            <br>
                            <span class="text-white">
                                Running on Your Laptop
                            </span>
                        </h1>
                        
                        {{-- Subtitle --}}
                        <p class="text-xl text-gray-300 leading-relaxed max-w-2xl">
                            Transform scattered SME documents into intelligent AI assistance. 
                            <span class="text-emerald-400 font-semibold">90% cheaper</span> than cloud AI, 
                            <span class="text-emerald-400 font-semibold">100% private</span>, 
                            running entirely on your hardware.
                        </p>
                        
                        {{-- Key Benefits --}}
                        <div class="flex flex-wrap gap-4 text-sm">
                            <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-2 rounded-lg">
                                <span class="text-emerald-400">✓</span>
                                <span class="text-gray-300">8GB laptop sufficient</span>
                            </div>
                            <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-2 rounded-lg">
                                <span class="text-emerald-400">✓</span>
                                <span class="text-gray-300">Fully offline</span>
                            </div>
                            <div class="flex items-center gap-2 bg-gray-800/50 px-3 py-2 rounded-lg">
                                <span class="text-emerald-400">✓</span>
                                <span class="text-gray-300">Your data stays private</span>
                            </div>
                        </div>
                        
                        {{-- CTA Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a href="/contact" 
                               class="group relative bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 hover:shadow-xl hover:shadow-emerald-500/25 transform hover:scale-105">
                                <span class="relative z-10">Start Free PoC</span>
                                <div class="absolute inset-0 rounded-lg bg-gradient-to-r from-emerald-600 to-emerald-700 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </a>
                            <a href="#demo" 
                               class="border-2 border-gray-600 hover:border-emerald-400 text-gray-300 hover:text-emerald-400 px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 hover:bg-emerald-400/5">
                                Watch Demo
                            </a>
                        </div>
                    </div>

                    {{-- Right: Interactive Demo --}}
                    <div class="relative">
                        <div class="bg-gray-800/40 border border-gray-700 rounded-2xl overflow-hidden shadow-2xl backdrop-blur-sm">
                            {{-- Terminal Header --}}
                            <div class="flex items-center justify-between p-4 bg-gray-900/60 border-b border-gray-700">
                                <div class="flex items-center gap-2">
                                    <div class="flex gap-1.5">
                                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                    </div>
                                    <span class="text-sm text-gray-400 font-mono ml-3">Manufacturing SME Assistant</span>
                                </div>
                                <div class="text-xs text-gray-500 font-mono">Offline • 8GB RAM • RTX 2000</div>
                            </div>
                            
                            {{-- Chat Interface --}}
                            <div class="p-6 h-80 overflow-y-auto" id="demo-chat">
                                <div class="space-y-4">
                                    {{-- User message --}}
                                    <div class="flex justify-end">
                                        <div class="bg-emerald-500/20 border border-emerald-400/30 rounded-2xl rounded-tr-sm px-4 py-3 max-w-sm">
                                            <p class="text-gray-200 text-sm">
                                                "What's our quality control process for the new bearing production line?"
                                            </p>
                                        </div>
                                    </div>
                                    
                                    {{-- AI response --}}
                                    <div class="flex justify-start" id="ai-response" style="opacity: 0;">
                                        <div class="bg-indigo-500/20 border border-indigo-400/30 rounded-2xl rounded-tl-sm px-4 py-3 max-w-md">
                                            <div class="text-gray-200 text-sm space-y-2">
                                                <p><strong>Based on your QC-Bear-2024 procedure:</strong></p>
                                                <div class="space-y-1 text-xs">
                                                    <div class="flex items-start gap-2">
                                                        <span class="text-indigo-400">•</span>
                                                        <span><strong>Incoming:</strong> Material cert + dimensional check (±0.001mm)</span>
                                                    </div>
                                                    <div class="flex items-start gap-2">
                                                        <span class="text-indigo-400">•</span>
                                                        <span><strong>In-process:</strong> Every 50 units - surface finish & noise testing</span>
                                                    </div>
                                                    <div class="flex items-start gap-2">
                                                        <span class="text-indigo-400">•</span>
                                                        <span><strong>Final:</strong> 100% vibration test using Brüel & Kjær analyzer</span>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-indigo-300 italic pt-2">
                                                    Note: Updated when you switched suppliers in March 2024
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Second user message --}}
                                    <div class="flex justify-end" id="user-followup" style="opacity: 0;">
                                        <div class="bg-emerald-500/20 border border-emerald-400/30 rounded-2xl rounded-tr-sm px-4 py-3 max-w-sm">
                                            <p class="text-gray-200 text-sm">
                                                "Who's our current bearing supplier?"
                                            </p>
                                        </div>
                                    </div>
                                    
                                    {{-- AI followup --}}
                                    <div class="flex justify-start" id="ai-followup" style="opacity: 0;">
                                        <div class="bg-indigo-500/20 border border-indigo-400/30 rounded-2xl rounded-tl-sm px-4 py-3 max-w-md">
                                            <div class="text-gray-200 text-sm">
                                                <p><strong>SKF Malaysia Sdn Bhd</strong></p>
                                                <p class="text-xs text-gray-400 mt-1">
                                                    Contact: Ahmad Zaki (+60 3-7805-3209)<br>
                                                    Lead time: 14 days | Payment terms: NET30
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Typing indicator --}}
                                    <div class="flex justify-start" id="typing-indicator">
                                        <div class="bg-gray-700/50 rounded-2xl rounded-tl-sm px-4 py-3">
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1">
                                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse delay-75"></div>
                                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse delay-150"></div>
                                                </div>
                                                <span class="text-xs text-gray-400 italic">AI processing your documents...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Floating stats --}}
                        <div class="absolute -bottom-6 -left-6 bg-emerald-500/90 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-lg">
                            ⚡ 2.1k× faster than cloud
                        </div>
                        <div class="absolute -top-6 -right-6 bg-indigo-500/90 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-lg">
                            🔒 100% private
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- Problem/Solution Section --}}
    <section class="py-20 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Why SME Owners Choose Us Over Big Tech AI
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Traditional cloud AI solutions cost too much and don't understand your business. We built something different.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                {{-- Problems --}}
                <div class="bg-red-900/10 border border-red-500/20 rounded-2xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-red-500/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <span class="text-2xl">😰</span>
                        </div>
                        <h3 class="text-2xl font-bold text-red-400 mb-2">What SME Owners Fear Most</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-red-400 text-sm">💸</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Unpredictable Cloud AI Costs</h4>
                                <p class="text-gray-400 text-sm">Per-token charges that spiral out of control</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-red-400 text-sm">📊</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Data Scattered Everywhere</h4>
                                <p class="text-gray-400 text-sm">Excel files, WeChat logs, emails - knowledge trapped in silos</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-red-400 text-sm">⚠️</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Fear of Abandoned Projects</h4>
                                <p class="text-gray-400 text-sm">Systems that stop working with no one to maintain them</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-red-400 text-sm">🤖</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Generic AI Responses</h4>
                                <p class="text-gray-400 text-sm">Doesn't understand your industry or business processes</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Solutions --}}
                <div class="bg-emerald-900/10 border border-emerald-500/20 rounded-2xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-emerald-500/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h3 class="text-2xl font-bold text-emerald-400 mb-2">Our SME-First Solution</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-emerald-400 text-sm">💰</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">90% Cost Reduction</h4>
                                <p class="text-gray-400 text-sm">One-time setup, unlimited usage on your hardware</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-emerald-400 text-sm">💎</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Transform Messy Data into Digital Assets</h4>
                                <p class="text-gray-400 text-sm">Your scattered documents become permanent knowledge capital</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-emerald-400 text-sm">🎓</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Academic Research Support</h4>
                                <p class="text-gray-400 text-sm">TAR UMT team provides ongoing updates and maintenance</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-emerald-400 text-sm">🧠</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white text-sm">Learns Your Business Language</h4>
                                <p class="text-gray-400 text-sm">Understands your industry terminology and processes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-20 bg-gradient-to-r from-gray-950 to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-emerald-400 to-emerald-300 bg-clip-text text-transparent mb-2">90%</div>
                    <div class="text-gray-400 text-sm lg:text-base">Cost Reduction vs Cloud AI</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-indigo-400 to-indigo-300 bg-clip-text text-transparent mb-2">2.1k×</div>
                    <div class="text-gray-400 text-sm lg:text-base">Faster Local Inference</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-purple-400 to-purple-300 bg-clip-text text-transparent mb-2">8GB</div>
                    <div class="text-gray-400 text-sm lg:text-base">Minimum RAM Required</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-pink-400 to-pink-300 bg-clip-text text-transparent mb-2">100%</div>
                    <div class="text-gray-400 text-sm lg:text-base">Data Privacy Guaranteed</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Social Proof --}}
    <section class="py-20 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Trusted by SMEs Across Malaysia
                </h2>
                <p class="text-xl text-gray-300">
                    From manufacturing to services, we've helped businesses transform their operations
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6 text-center">
                    <div class="text-4xl mb-4">🏭</div>
                    <h3 class="text-xl font-semibold text-white mb-2">Manufacturing</h3>
                    <p class="text-gray-400 text-sm">Quality control processes, inventory management, production documentation</p>
                </div>
                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6 text-center">
                    <div class="text-4xl mb-4">📦</div>
                    <h3 class="text-xl font-semibold text-white mb-2">Trading & E-commerce</h3>
                    <p class="text-gray-400 text-sm">SKU management, supplier data, logistics coordination</p>
                </div>
                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6 text-center">
                    <div class="text-4xl mb-4">🏗️</div>
                    <h3 class="text-xl font-semibold text-white mb-2">Construction</h3>
                    <p class="text-gray-400 text-sm">Contract management, project tracking, safety procedures</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-emerald-900/20 via-gray-900/20 to-indigo-900/20">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Ready to Build Your AI Employee?
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Start with a free Proof of Concept. See how your scattered business documents 
                can become intelligent, responsive AI assistance.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact"
                   class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 hover:shadow-xl hover:shadow-emerald-500/25 transform hover:scale-105">
                    Get Free PoC Demo
                </a>
                <a href="mailto:research@tarumt.edu.my"
                   class="border-2 border-gray-600 hover:border-emerald-400 text-gray-300 hover:text-emerald-400 px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 hover:bg-emerald-400/5">
                    Contact Research Team
                </a>
            </div>
        </div>
    </section>
</div>

<script>
// Mobile menu toggle
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

// Demo animation
document.addEventListener('DOMContentLoaded', function() {
    function runDemoAnimation() {
        // Reset all elements
        document.getElementById('ai-response').style.opacity = '0';
        document.getElementById('user-followup').style.opacity = '0';
        document.getElementById('ai-followup').style.opacity = '0';
        document.getElementById('typing-indicator').style.opacity = '1';
        
        // Animation sequence
        setTimeout(() => {
            document.getElementById('typing-indicator').style.opacity = '0';
            document.getElementById('ai-response').style.opacity = '1';
        }, 2000);
        
        setTimeout(() => {
            document.getElementById('user-followup').style.opacity = '1';
        }, 4000);
        
        setTimeout(() => {
            document.getElementById('typing-indicator').style.opacity = '1';
        }, 5000);
        
        setTimeout(() => {
            document.getElementById('typing-indicator').style.opacity = '0';
            document.getElementById('ai-followup').style.opacity = '1';
        }, 7000);
    }
    
    // Start animation
    setTimeout(runDemoAnimation, 1000);
    
    // Repeat every 15 seconds
    setInterval(runDemoAnimation, 15000);
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
    const menu = document.getElementById('mobile-menu');
    const menuButton = e.target.closest('button');
    
    if (!menu.contains(e.target) && !menuButton) {
        menu.classList.add('hidden');
    }
});
</script>
@endsection