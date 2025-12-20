{{-- resources/views/data-upload.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    {{-- Navigation (same as dashboard) --}}
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400">SME.AI</a>
                    <span class="ml-3 text-gray-400 text-sm hidden sm:block">Data Upload</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/dashboard" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">← Back to Dashboard</a>
                    <a href="/" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        {{-- Sidebar (same as dashboard) --}}
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
                            <a href="/data-upload" class="bg-emerald-900/20 border-r-2 border-emerald-400 text-emerald-400 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
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
                            <h1 class="text-2xl font-bold text-white">Data Upload</h1>
                            <p class="mt-1 text-gray-400">Upload your business documents to create your AI knowledge base</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            {{-- Upload Area --}}
                            <div class="lg:col-span-2">
                                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-8">
                                    <div class="text-center">
                                        <div id="upload-area" class="border-2 border-dashed border-gray-600 hover:border-emerald-400 transition-colors rounded-lg p-12 cursor-pointer" 
                                             onclick="document.getElementById('file-input').click()"
                                             ondrop="handleFileDrop(event)" 
                                             ondragover="handleDragOver(event)"
                                             ondragleave="handleDragLeave(event)">
                                            
                                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            
                                            <h3 class="text-lg font-medium text-white mb-2">Upload your business documents</h3>
                                            <p class="text-gray-400 mb-4">Drag and drop files here, or click to browse</p>
                                            
                                            <input type="file" id="file-input" multiple accept=".pdf,.docx,.xlsx,.csv,.txt,.png,.jpg,.jpeg" class="hidden" onchange="handleFileSelect(event)">
                                            
                                            <button type="button" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                                                Choose Files
                                            </button>
                                        </div>
                                        
                                        {{-- Supported Formats --}}
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-400 mb-3">Supported formats:</p>
                                            <div class="flex flex-wrap justify-center gap-2">
                                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">PDF</span>
                                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">DOCX</span>
                                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">XLSX</span>
                                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">CSV</span>
                                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">TXT</span>
                                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">Images</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Upload Queue --}}
                                <div id="upload-queue" class="mt-6 space-y-3 hidden">
                                    <h3 class="text-lg font-medium text-white">Upload Queue</h3>
                                    <div id="file-list"></div>
                                </div>
                            </div>

                            {{-- Upload Guidelines --}}
                            <div class="space-y-6">
                                <div class="bg-gray-800/40 border border-gray-700 rounded-xl p-6">
                                    <h3 class="text-lg font-medium text-white mb-4">Upload Guidelines</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-start gap-3">
                                            <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-white font-medium text-sm">Business Documents</h4>
                                                <p class="text-gray-400 text-xs">SOPs, manuals, contracts, policies</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start gap-3">
                                            <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-white font-medium text-sm">Structured Data</h4>
                                                <p class="text-gray-400 text-xs">Excel sheets, CSV files, databases</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start gap-3">
                                            <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-white font-medium text-sm">Communication Records</h4>
                                                <p class="text-gray-400 text-xs">Email logs, chat histories</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-indigo-900/20 border border-indigo-500/30 rounded-xl p-6">
                                    <h3 class="text-lg font-medium text-white mb-4">Data Categories</h3>
                                    <div class="space-y-3">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-indigo-500 bg-gray-700 border-gray-600 rounded" checked>
                                            <span class="ml-3 text-gray-300 text-sm">Quality Control</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-indigo-500 bg-gray-700 border-gray-600 rounded">
                                            <span class="ml-3 text-gray-300 text-sm">Inventory Management</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-indigo-500 bg-gray-700 border-gray-600 rounded">
                                            <span class="ml-3 text-gray-300 text-sm">Customer Service</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-indigo-500 bg-gray-700 border-gray-600 rounded">
                                            <span class="ml-3 text-gray-300 text-sm">HR Procedures</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-indigo-500 bg-gray-700 border-gray-600 rounded">
                                            <span class="ml-3 text-gray-300 text-sm">Financial Records</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Existing Files --}}
                        <div class="mt-12">
                            <div class="bg-gray-800/40 border border-gray-700 rounded-xl">
                                <div class="p-6 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium text-white">Your Uploaded Files</h3>
                                        <div class="text-sm text-gray-400">3 files • 2.4 MB</div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-700">
                                    {{-- File Item --}}
                                    <div class="p-6 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-white font-medium">quality_control_procedures.pdf</p>
                                                <p class="text-gray-400 text-sm">Uploaded 2 hours ago • 1.2 MB</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">Processed</span>
                                            <button class="text-gray-400 hover:text-red-400 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="p-6 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-white font-medium">supplier_contacts.xlsx</p>
                                                <p class="text-gray-400 text-sm">Uploaded 1 day ago • 856 KB</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-xs">Processed</span>
                                            <button class="text-gray-400 hover:text-red-400 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="p-6 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-white font-medium">employee_handbook.docx</p>
                                                <p class="text-gray-400 text-sm">Uploaded 3 days ago • 432 KB</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="px-3 py-1 bg-yellow-900/30 text-yellow-400 rounded-full text-xs">Processing</span>
                                            <button class="text-gray-400 hover:text-red-400 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
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
// File handling functions
let selectedFiles = [];

function handleDragOver(e) {
    e.preventDefault();
    e.stopPropagation();
    document.getElementById('upload-area').classList.add('border-emerald-400', 'bg-emerald-900/10');
}

function handleDragLeave(e) {
    e.preventDefault();
    e.stopPropagation();
    document.getElementById('upload-area').classList.remove('border-emerald-400', 'bg-emerald-900/10');
}

function handleFileDrop(e) {
    e.preventDefault();
    e.stopPropagation();
    document.getElementById('upload-area').classList.remove('border-emerald-400', 'bg-emerald-900/10');
    
    const files = Array.from(e.dataTransfer.files);
    handleFiles(files);
}

function handleFileSelect(e) {
    const files = Array.from(e.target.files);
    handleFiles(files);
}

function handleFiles(files) {
    selectedFiles = [...selectedFiles, ...files];
    displayFileList();
    showUploadQueue();
}

function displayFileList() {
    const fileList = document.getElementById('file-list');
    fileList.innerHTML = '';
    
    selectedFiles.forEach((file, index) => {
        const fileItem = document.createElement('div');
        fileItem.className = 'flex items-center justify-between p-4 bg-gray-800/60 border border-gray-700 rounded-lg';
        
        const fileIcon = getFileIcon(file.type);
        const fileSize = formatFileSize(file.size);
        
        fileItem.innerHTML = `
            <div class="flex items-center">
                <div class="w-10 h-10 ${fileIcon.color} rounded-lg flex items-center justify-center mr-4">
                    ${fileIcon.svg}
                </div>
                <div>
                    <p class="text-white font-medium">${file.name}</p>
                    <p class="text-gray-400 text-sm">${fileSize}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-blue-900/30 text-blue-400 rounded-full text-xs">Ready</span>
                <button onclick="removeFile(${index})" class="text-gray-400 hover:text-red-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;
        
        fileList.appendChild(fileItem);
    });
    
    if (selectedFiles.length > 0) {
        const uploadButton = document.createElement('button');
        uploadButton.className = 'w-full mt-4 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-6 py-3 rounded-lg font-medium transition-all';
        uploadButton.innerHTML = `Upload ${selectedFiles.length} file${selectedFiles.length > 1 ? 's' : ''}`;
        uploadButton.onclick = uploadFiles;
        
        fileList.appendChild(uploadButton);
    }
}

function showUploadQueue() {
    if (selectedFiles.length > 0) {
        document.getElementById('upload-queue').classList.remove('hidden');
    }
}

function removeFile(index) {
    selectedFiles.splice(index, 1);
    displayFileList();
    
    if (selectedFiles.length === 0) {
        document.getElementById('upload-queue').classList.add('hidden');
    }
}

function uploadFiles() {
    // Simulate file upload
    const fileList = document.getElementById('file-list');
    const uploadButton = fileList.querySelector('button');
    
    if (uploadButton) {
        uploadButton.innerHTML = 'Uploading...';
        uploadButton.disabled = true;
        
        // Simulate upload progress
        setTimeout(() => {
            alert(`Successfully uploaded ${selectedFiles.length} file${selectedFiles.length > 1 ? 's' : ''}!`);
            selectedFiles = [];
            document.getElementById('upload-queue').classList.add('hidden');
            document.getElementById('file-input').value = '';
        }, 2000);
    }
}

function getFileIcon(fileType) {
    const icons = {
        'application/pdf': {
            color: 'bg-red-500',
            svg: '<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>'
        },
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': {
            color: 'bg-emerald-500',
            svg: '<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z"></path></svg>'
        },
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document': {
            color: 'bg-blue-500',
            svg: '<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>'
        }
    };
    
    return icons[fileType] || {
        color: 'bg-gray-500',
        svg: '<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>'
    };
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
</script>
@endsection