{{-- resources/views/model-testing.blade.php --}}
@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="min-h-screen bg-gray-950">
    {{-- Navigation --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Model Testing</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/dashboard" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">← Back to Dashboard</a>
                    <a href="/" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-[calc(100vh-4rem)]">
        {{-- Sidebar --}}
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-900/50 border-r border-gray-800">
                <div class="flex flex-col flex-grow overflow-y-auto">
                    {{-- Platform Navigation --}}
                    <div class="pt-5 pb-4">
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
                            <a href="/model-hub" class="text-gray-300 hover:bg-gray-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <svg class="mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Model Hub
                            </a>
                            <a href="/model-testing" class="bg-emerald-900/20 border-r-2 border-emerald-400 text-emerald-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
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

                    {{-- Model Selector --}}
                    <div class="px-3 py-4 border-t border-gray-800">
                        <h3 class="text-sm font-medium text-gray-400 mb-3">Active Models</h3>
                        <div class="space-y-2">
                            <button onclick="switchModel('manufacturing-qc')" class="w-full text-left p-3 bg-emerald-900/20 border border-emerald-500/30 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-white font-medium text-sm">Manufacturing QC</p>
                                        <p class="text-emerald-400 text-xs">Qwen-4B</p>
                                    </div>
                                    <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                                </div>
                            </button>
                            
                            <button onclick="switchModel('supplier-assistant')" class="w-full text-left p-3 bg-gray-800/40 border border-gray-700 rounded-lg hover:bg-gray-700/60 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-white font-medium text-sm">Supplier Assistant</p>
                                        <p class="text-gray-400 text-xs">SmolLM-1.7B</p>
                                    </div>
                                    <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                </div>
                            </button>
                            
                            <button onclick="switchModel('hr-policy')" class="w-full text-left p-3 bg-gray-800/40 border border-gray-700 rounded-lg hover:bg-gray-700/60 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-white font-medium text-sm">HR Policy Bot</p>
                                        <p class="text-gray-400 text-xs">Llama-3B</p>
                                    </div>
                                    <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                                </div>
                            </button>
                        </div>
                    </div>

                    {{-- Quick Test Prompts --}}
                    <div class="px-3 py-4 border-t border-gray-800 flex-1">
                        <h3 class="text-sm font-medium text-gray-400 mb-3">Quick Test Prompts</h3>
                        <div class="space-y-2">
                            <button onclick="useQuickPrompt('quality')" class="w-full text-left p-2 text-xs text-gray-300 bg-gray-800/40 hover:bg-gray-700/60 rounded transition-colors">
                                "What's our quality control process for bearings?"
                            </button>
                            <button onclick="useQuickPrompt('supplier')" class="w-full text-left p-2 text-xs text-gray-300 bg-gray-800/40 hover:bg-gray-700/60 rounded transition-colors">
                                "Who is our main supplier for steel components?"
                            </button>
                            <button onclick="useQuickPrompt('hr')" class="w-full text-left p-2 text-xs text-gray-300 bg-gray-800/40 hover:bg-gray-700/60 rounded transition-colors">
                                "What's the vacation policy for new employees?"
                            </button>
                            <button onclick="useQuickPrompt('pricing')" class="w-full text-left p-2 text-xs text-gray-300 bg-gray-800/40 hover:bg-gray-700/60 rounded transition-colors">
                                "Show me pricing for hydraulic pumps"
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Chat Interface --}}
        <div class="flex-1 flex flex-col">
            {{-- Chat Header --}}
            <div class="bg-gray-800/40 border-b border-gray-700 p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-white" id="current-model-name">Manufacturing QC Assistant</h2>
                            <p class="text-sm text-gray-400">
                                <span id="current-model-type">Qwen-4B</span> • 
                                <span class="inline-flex items-center">
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full mr-1"></span>
                                    Online
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button onclick="clearChat()" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        <button onclick="exportChat()" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Chat Messages --}}
            <div class="flex-1 overflow-y-auto p-6 space-y-6" id="chat-messages">
                {{-- Welcome Message --}}
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-bold">AI</span>
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-800/60 border border-gray-700 rounded-2xl rounded-tl-sm p-4 max-w-2xl">
                            <p class="text-gray-200">
                                Hello! I'm your Manufacturing QC Assistant, trained on your quality control procedures and standards. 
                                I can help you with process questions, standards verification, and troubleshooting guidance.
                            </p>
                            <p class="text-gray-400 text-sm mt-2">
                                Try asking me about bearing quality control, material specifications, or testing procedures.
                            </p>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Just now</p>
                    </div>
                </div>

                {{-- Example conversation --}}
                <div class="flex items-start gap-3 justify-end">
                    <div class="flex-1 flex justify-end">
                        <div class="bg-emerald-500/20 border border-emerald-400/30 rounded-2xl rounded-tr-sm p-4 max-w-2xl">
                            <p class="text-gray-200">
                                What's our quality control process for the new bearing production line?
                            </p>
                        </div>
                    </div>
                    <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-bold">You</span>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-bold">AI</span>
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-800/60 border border-gray-700 rounded-2xl rounded-tl-sm p-4 max-w-2xl">
                            <p class="text-gray-200 mb-3">
                                <strong>Based on your QC-Bear-2024 procedure:</strong>
                            </p>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-400 mt-1">•</span>
                                    <span class="text-gray-200"><strong>Incoming Inspection:</strong> Material certification + dimensional check (±0.001mm tolerance)</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-400 mt-1">•</span>
                                    <span class="text-gray-200"><strong>In-Process:</strong> Every 50 units - surface finish verification & noise testing</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-emerald-400 mt-1">•</span>
                                    <span class="text-gray-200"><strong>Final Inspection:</strong> 100% vibration analysis using Brüel & Kjær equipment</span>
                                </div>
                            </div>
                            <p class="text-emerald-300 text-sm mt-3 italic">
                                Note: Process updated when you switched to SKF Malaysia suppliers in March 2024
                            </p>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">2 minutes ago</p>
                    </div>
                </div>
            </div>

            {{-- Chat Input --}}
            <div class="border-t border-gray-700 p-4">
                <div class="flex items-end gap-3">
                    <div class="flex-1">
                        <textarea 
                            id="chat-input" 
                            rows="1" 
                            class="w-full bg-gray-800 border border-gray-600 rounded-xl text-white px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                            placeholder="Ask about quality control procedures, specifications, or standards..."
                            onkeydown="handleKeyDown(event)"
                            oninput="autoResize(this)"></textarea>
                    </div>
                    <button onclick="sendMessage()" id="send-button" class="bg-emerald-500 hover:bg-emerald-600 disabled:bg-gray-600 disabled:cursor-not-allowed text-white p-3 rounded-xl transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center justify-between mt-2 text-xs text-gray-400">
                    <span>Press Enter to send, Shift+Enter for new line</span>
                    <span id="char-count">0/2000</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let currentModel = 'manufacturing-qc';
let messageId = 0;

// Model switching
function switchModel(modelKey) {
    currentModel = modelKey;
    
    // Remove active state from all model buttons
    document.querySelectorAll('[onclick^="switchModel"]').forEach(btn => {
        btn.className = 'w-full text-left p-3 bg-gray-800/40 border border-gray-700 rounded-lg hover:bg-gray-700/60 transition-colors';
    });
    
    // Add active state to selected model
    event.target.closest('button').className = 'w-full text-left p-3 bg-emerald-900/20 border border-emerald-500/30 rounded-lg';
    
    const models = {
        'manufacturing-qc': {
            name: 'Manufacturing QC Assistant',
            type: 'Qwen-4B',
            welcome: 'Hello! I\'m your Manufacturing QC Assistant. I can help with quality control procedures, standards verification, and troubleshooting guidance.'
        },
        'supplier-assistant': {
            name: 'Supplier Assistant',
            type: 'SmolLM-1.7B',
            welcome: 'Hi! I\'m your Supplier Assistant. I can help you find supplier information, contact details, and procurement data.'
        },
        'hr-policy': {
            name: 'HR Policy Bot',
            type: 'Llama-3B',
            welcome: 'Hello! I\'m your HR Policy Assistant. I can answer questions about employee policies, procedures, and company guidelines.'
        }
    };
    
    const model = models[modelKey];
    document.getElementById('current-model-name').textContent = model.name;
    document.getElementById('current-model-type').textContent = model.type;
    
    // Clear chat and show new welcome message
    clearChat();
    addWelcomeMessage(model.welcome);
}

function addWelcomeMessage(message) {
    const chatMessages = document.getElementById('chat-messages');
    const welcomeHtml = `
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-white text-sm font-bold">AI</span>
            </div>
            <div class="flex-1">
                <div class="bg-gray-800/60 border border-gray-700 rounded-2xl rounded-tl-sm p-4 max-w-2xl">
                    <p class="text-gray-200">${message}</p>
                </div>
                <p class="text-xs text-gray-500 mt-2">Just now</p>
            </div>
        </div>
    `;
    chatMessages.innerHTML = welcomeHtml;
}

// Quick prompts
function useQuickPrompt(type) {
    const prompts = {
        'quality': "What's our quality control process for bearings?",
        'supplier': "Who is our main supplier for steel components?", 
        'hr': "What's the vacation policy for new employees?",
        'pricing': "Show me pricing for hydraulic pumps"
    };
    
    document.getElementById('chat-input').value = prompts[type];
    document.getElementById('chat-input').focus();
}

// Chat functionality
function sendMessage() {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    
    if (!message) return;
    
    // Disable input during request
    input.disabled = true;
    document.getElementById('send-button').disabled = true;
    
    // Add user message
    addMessage(message, 'user');
    
    // Clear input
    input.value = '';
    autoResize(input);
    updateCharCount();
    
    // Show typing indicator
    showTypingIndicator();
    
    // Send request to backend API
    fetch('/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify({
            message: message,
            model_type: currentModel
        })
    })
    .then(response => response.json())
    .then(data => {
        hideTypingIndicator();
        
        if (data.error) {
            addMessage('Sorry, I encountered an error: ' + data.error, 'ai');
        } else {
            addMessage(data.response, 'ai');
            
            // Show response metadata if available
            if (data.metadata) {
                console.log('Response metadata:', data.metadata);
            }
        }
    })
    .catch(error => {
        hideTypingIndicator();
        console.error('Error:', error);
        addMessage('Sorry, I encountered a connection error. Please try again.', 'ai');
    })
    .finally(() => {
        // Re-enable input
        input.disabled = false;
        document.getElementById('send-button').disabled = false;
        input.focus();
    });
}

function addMessage(message, sender) {
    const chatMessages = document.getElementById('chat-messages');
    const messageId = Date.now();
    
    let processedMessage = message;
    if (sender === 'ai') {
        processedMessage = marked.parse(message);
    } else {
        processedMessage = message.replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    const messageHtml = sender === 'user' ? `
        <div class="flex items-start gap-3 justify-end" id="msg-${messageId}">
            <div class="flex-1 flex justify-end">
                <div class="bg-emerald-500/20 border border-emerald-400/30 rounded-2xl rounded-tr-sm p-4 max-w-2xl">
                    <p class="text-gray-200">${processedMessage}</p>
                </div>
            </div>
            <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-white text-sm font-bold">You</span>
            </div>
        </div>
    ` : `
        <div class="flex items-start gap-3" id="msg-${messageId}">
            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-white text-sm font-bold">AI</span>
            </div>
            <div class="flex-1">
                <div class="bg-gray-800/60 border border-gray-700 rounded-2xl rounded-tl-sm p-4 max-w-2xl" style="
                    color: #f3f4f6;
                    line-height: 1.6;
                ">
                    <div style="
                        color: #f3f4f6;
                    ">${processedMessage}</div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Just now</p>
            </div>
        </div>
    `;
    
    chatMessages.insertAdjacentHTML('beforeend', messageHtml);
    
    const lastMessage = chatMessages.lastElementChild;
    if (sender === 'ai' && lastMessage) {
        const messageContent = lastMessage.querySelector('div[style*="color: #f3f4f6"]');
        if (messageContent) {
            const h1s = messageContent.querySelectorAll('h1');
            h1s.forEach(h => {
                h.style.color = '#10b981';
                h.style.fontSize = '1.5rem';
                h.style.fontWeight = '600';
                h.style.marginTop = '1.5rem';
                h.style.marginBottom = '0.75rem';
            });
            
            const h2s = messageContent.querySelectorAll('h2');
            h2s.forEach(h => {
                h.style.color = '#10b981';
                h.style.fontSize = '1.25rem';
                h.style.fontWeight = '600';
                h.style.marginTop = '1.5rem';
                h.style.marginBottom = '0.75rem';
            });
            
            const h3s = messageContent.querySelectorAll('h3');
            h3s.forEach(h => {
                h.style.color = '#10b981';
                h.style.fontSize = '1.125rem';
                h.style.fontWeight = '600';
                h.style.marginTop = '1.5rem';
                h.style.marginBottom = '0.75rem';
            });
            
            const uls = messageContent.querySelectorAll('ul');
            uls.forEach(ul => {
                ul.style.margin = '1rem 0';
                ul.style.paddingLeft = '1.5rem';
                const lis = ul.querySelectorAll('li');
                lis.forEach(li => {
                    li.style.margin = '0.5rem 0';
                    li.style.color = '#f3f4f6';
                });
            });
            
            const ols = messageContent.querySelectorAll('ol');
            ols.forEach(ol => {
                ol.style.margin = '1rem 0';
                ol.style.paddingLeft = '1.5rem';
                const lis = ol.querySelectorAll('li');
                lis.forEach(li => {
                    li.style.margin = '0.5rem 0';
                    li.style.color = '#f3f4f6';
                });
            });
            
            const strongs = messageContent.querySelectorAll('strong');
            strongs.forEach(strong => {
                strong.style.color = '#ffffff';
                strong.style.fontWeight = '600';
            });
            
            const ems = messageContent.querySelectorAll('em');
            ems.forEach(em => {
                em.style.color = '#d1d5db';
                em.style.fontStyle = 'italic';
            });
            
            const codes = messageContent.querySelectorAll('code');
            codes.forEach(code => {
                code.style.backgroundColor = '#4b5563';
                code.style.color = '#10b981';
                code.style.padding = '0.125rem 0.375rem';
                code.style.borderRadius = '0.25rem';
                code.style.fontSize = '0.875rem';
                code.style.border = '1px solid #6b7280';
            });
            
            const pres = messageContent.querySelectorAll('pre');
            pres.forEach(pre => {
                pre.style.backgroundColor = '#374151';
                pre.style.border = '1px solid #6b7280';
                pre.style.borderRadius = '0.5rem';
                pre.style.padding = '1rem';
                pre.style.margin = '1rem 0';
                pre.style.overflowX = 'auto';
                const preCode = pre.querySelector('code');
                if (preCode) {
                    preCode.style.background = 'none';
                    preCode.style.color = '#f3f4f6';
                    preCode.style.padding = '0';
                    preCode.style.border = 'none';
                }
            });
            
            const ps = messageContent.querySelectorAll('p');
            ps.forEach(p => {
                p.style.margin = '0.75rem 0';
                p.style.lineHeight = '1.6';
                p.style.color = '#f3f4f6';
            });
            
            const hrs = messageContent.querySelectorAll('hr');
            hrs.forEach(hr => {
                hr.style.border = 'none';
                hr.style.height = '1px';
                hr.style.backgroundColor = '#6b7280';
                hr.style.margin = '2rem 0';
            });
            
            // 表格样式
            const tables = messageContent.querySelectorAll('table');
            tables.forEach(table => {
                table.style.width = '100%';
                table.style.borderCollapse = 'collapse';
                table.style.margin = '1rem 0';
                table.style.backgroundColor = '#374151';
                table.style.border = '1px solid #9ca3af';
                table.style.borderRadius = '0.5rem';
            });
            
            const ths = messageContent.querySelectorAll('th');
            ths.forEach(th => {
                th.style.backgroundColor = '#4b5563';
                th.style.color = '#10b981';
                th.style.padding = '0.75rem';
                th.style.border = '1px solid #9ca3af';
                th.style.fontWeight = '600';
                th.style.textAlign = 'left';
            });
            
            const tds = messageContent.querySelectorAll('td');
            tds.forEach(td => {
                td.style.backgroundColor = '#374151';
                td.style.color = '#f3f4f6';
                td.style.padding = '0.75rem';
                td.style.border = '1px solid #9ca3af';
            });
            
            const trs = messageContent.querySelectorAll('tr');
            trs.forEach((tr, index) => {
                if (index % 2 === 1) { // 奇数行
                    tr.style.backgroundColor = '#4b5563';
                }
            });
            
            const blockquotes = messageContent.querySelectorAll('blockquote');
            blockquotes.forEach(bq => {
                bq.style.borderLeft = '4px solid #10b981';
                bq.style.backgroundColor = '#374151';
                bq.style.padding = '1rem';
                bq.style.margin = '1rem 0';
                bq.style.fontStyle = 'italic';
                bq.style.color = '#d1d5db';
                bq.style.borderRadius = '0.25rem';
            });
            
            const links = messageContent.querySelectorAll('a');
            links.forEach(link => {
                link.style.color = '#3b82f6';
                link.style.textDecoration = 'underline';
            });
        }
    }
    
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function addAIResponse(userMessage) {
    // Simulate different responses based on current model and message content
    let response = generateResponse(userMessage);
    addMessage(response, 'ai');
}

function generateResponse(userMessage) {
    const responses = {
        'manufacturing-qc': {
            'quality': 'Based on your QC procedures, our quality control process includes incoming inspection with material certification, in-process testing every 50 units, and final 100% vibration analysis using Brüel & Kjær equipment.',
            'bearing': 'For bearing production, we follow the QC-Bear-2024 procedure with ±0.001mm dimensional tolerance, surface finish verification, and noise testing protocols.',
            'default': 'I can help with quality control procedures, material specifications, and testing standards. What specific aspect would you like to know about?'
        },
        'supplier-assistant': {
            'supplier': 'Our main steel component supplier is SKF Malaysia Sdn Bhd. Contact: Ahmad Zaki (+60 3-7805-3209). Lead time: 14 days, Payment terms: NET30.',
            'contact': 'I have access to our complete supplier database. Which specific supplier or component are you looking for?',
            'default': 'I can help you find supplier information, contact details, and procurement data from our supplier database.'
        },
        'hr-policy': {
            'vacation': 'New employees are entitled to 12 days annual leave in their first year, increasing to 18 days after 2 years of service. Medical leave is separate at 14 days annually.',
            'policy': 'I can help with employee policies including leave entitlements, working hours, benefits, and company procedures. What specific policy information do you need?',
            'default': 'I can answer questions about employee policies, procedures, and company guidelines from our HR handbook.'
        }
    };
    
    const modelResponses = responses[currentModel];
    const message = userMessage.toLowerCase();
    
    if (message.includes('quality') || message.includes('control')) {
        return modelResponses['quality'] || modelResponses['default'];
    } else if (message.includes('bearing')) {
        return modelResponses['bearing'] || modelResponses['default'];
    } else if (message.includes('supplier')) {
        return modelResponses['supplier'] || modelResponses['default'];
    } else if (message.includes('vacation') || message.includes('leave')) {
        return modelResponses['vacation'] || modelResponses['default'];
    } else if (message.includes('contact')) {
        return modelResponses['contact'] || modelResponses['default'];
    } else if (message.includes('policy')) {
        return modelResponses['policy'] || modelResponses['default'];
    }
    
    return modelResponses['default'];
}

function showTypingIndicator() {
    const chatMessages = document.getElementById('chat-messages');
    const typingHtml = `
        <div class="flex items-start gap-3" id="typing-indicator">
            <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-white text-sm font-bold">AI</span>
            </div>
            <div class="flex-1">
                <div class="bg-gray-800/60 border border-gray-700 rounded-2xl rounded-tl-sm p-4 max-w-2xl">
                    <div class="flex items-center gap-2">
                        <div class="flex gap-1">
                            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse delay-75"></div>
                            <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse delay-150"></div>
                        </div>
                        <span class="text-gray-400 text-sm italic">AI is thinking...</span>
                    </div>
                </div>
            </div>
        </div>
    `;
    chatMessages.insertAdjacentHTML('beforeend', typingHtml);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function hideTypingIndicator() {
    const indicator = document.getElementById('typing-indicator');
    if (indicator) {
        indicator.remove();
    }
}

// Input handling
function handleKeyDown(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendMessage();
    }
}

function autoResize(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
    updateCharCount();
}

function updateCharCount() {
    const input = document.getElementById('chat-input');
    const count = input.value.length;
    document.getElementById('char-count').textContent = `${count}/2000`;
    
    if (count > 2000) {
        document.getElementById('char-count').classList.add('text-red-400');
        document.getElementById('send-button').disabled = true;
    } else {
        document.getElementById('char-count').classList.remove('text-red-400');
        document.getElementById('send-button').disabled = false;
    }
}

// Utility functions
function clearChat() {
    document.getElementById('chat-messages').innerHTML = '';
}

function exportChat() {
    alert('Chat export functionality would save the conversation as a text or PDF file.');
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('chat-input').addEventListener('input', function() {
        updateCharCount();
    });
});
</script>
@endsection