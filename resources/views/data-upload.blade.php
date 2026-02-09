{{-- data-upload.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex flex-col">
    <nav class="border-b border-white/10 bg-gray-950/90 backdrop-blur-xl sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-4">
                    <a href="/" class="text-2xl font-bold font-mono text-emerald-400 tracking-tighter">SME.AI</a>
                    <span class="h-4 w-px bg-gray-800"></span>
                    <span class="text-gray-400 text-sm font-medium uppercase tracking-widest">Knowledge Base</span>
                </div>
                <div class="flex items-center space-x-6">
                    @if(request()->has('user_id'))
                        <span class="text-[10px] bg-red-500/10 text-red-400 px-2 py-1 rounded border border-red-500/20 font-black uppercase">Admin: Inspecting User Data</span>
                    @endif
                    <a href="/dashboard" class="text-gray-400 hover:text-emerald-400 transition-colors text-sm">Dashboard</a>
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
                <a href="/data-upload" class="flex items-center px-4 py-3 text-sm font-medium bg-emerald-500/10 text-emerald-400 rounded-xl border border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]">
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
                    <h2 class="text-3xl font-bold tracking-tight text-white">Data Asset Manager</h2>
                    <p class="mt-2 text-gray-500">Review, preprocess and validate datasets for model injection.</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    <div class="xl:col-span-2 space-y-8">
                
                        @if(!auth()->user()->isAdmin() || !request()->has('user_id'))
                        <div class="bg-gray-900/40 border border-white/5 rounded-[2.5rem] p-10 shadow-2xl">
                            <div id="upload-area" class="border-2 border-dashed border-gray-800 hover:border-emerald-500/50 bg-black/20 transition-all rounded-[2rem] p-16 text-center cursor-pointer group">
                                <div class="w-20 h-20 bg-emerald-500/10 rounded-3xl flex items-center justify-center mx-auto mb-6">
                                    <svg class="h-10 w-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 48 48"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Ingest Raw Intelligence</h3>
                                <p class="text-gray-500 mb-6 text-sm">Upload files to initiate the tokenization review.</p>
                                <div class="mb-8 p-4 bg-emerald-500/5 border border-emerald-500/10 rounded-2xl text-left">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-xs font-black text-emerald-400 uppercase tracking-widest">Processing Intent</h4>
                                            <p class="text-[10px] text-gray-500 mt-1">Select how the engine should ingest this data.</p>
                                        </div>
                                        <div class="flex bg-black/40 p-1 rounded-xl border border-white/5">
                                            <label class="flex items-center gap-2 px-3 py-1.5 rounded-lg cursor-pointer transition-all has-[:checked]:bg-emerald-500 has-[:checked]:text-gray-950 text-gray-500">
                                                <input type="radio" name="usage_type" value="fine-tune" class="hidden" checked>
                                                <span class="text-[10px] font-black uppercase">Fine-Tuning</span>
                                            </label>
                                            <label class="flex items-center gap-2 px-3 py-1.5 rounded-lg cursor-pointer transition-all has-[:checked]:bg-indigo-500 has-[:checked]:text-white text-gray-500">
                                                <input type="radio" name="usage_type" id="rag-trigger" value="rag" class="hidden">
                                                <span class="text-[10px] font-black uppercase">RAG Index</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                         
                                    <div id="rag-hint" class="hidden mt-3 pt-3 border-t border-white/5">
                                        <p class="text-[9px] text-indigo-400 italic">
                                            * RAG mode will auto-detect QA pairs in CSV/Excel or perform recursive chunking on text files for FAISS indexing.
                                        </p>
                                    </div>
                                </div>
                                <input type="file" id="file-input" multiple class="hidden" onchange="handleFileSelect(event)">
                                <button type="button" class="bg-emerald-500 text-gray-950 px-10 py-3 rounded-2xl text-sm font-black transition-all active:scale-95" onclick="document.getElementById('file-input').click()">SELECT ASSETS</button>
                            </div>
                        </div>
                        @endif

                        {{-- Repository Content --}}
                        <div class="space-y-12"> 
                            
     
                            <div class="space-y-4">
                                <div class="flex items-center justify-between px-2">
                                    <h3 class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full shadow-[0_0_8px_rgba(99,102,241,0.5)]"></span>
                                        RAG Knowledge Base (Vector Assets)
                                    </h3>
                                </div>

                                @forelse($files->where('usage_type', 'rag') as $file)
                                <div class="group bg-gray-900/40 border border-white/5 hover:border-indigo-500/30 rounded-3xl p-5 transition-all flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center relative">
                                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            @if($file->preprocessed_path)
                                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-indigo-500 rounded-full border-2 border-gray-900 shadow-lg"></div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-white">{{ $file->file_name }}</p>
                                            <div class="flex flex-wrap items-center gap-2 mt-1">
                                                <p class="text-[10px] font-mono text-gray-500 uppercase">{{ $file->formatted_size }} • {{ $file->created_at->diffForHumans() }}</p>
                                                <span class="px-2 py-0.5 bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 rounded text-[9px] font-black uppercase tracking-tighter">Vector Source</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="px-2.5 py-0.5 border border-indigo-500/20 bg-indigo-500/10 text-indigo-400 rounded-full text-[10px] font-black uppercase tracking-tighter">
                                            {{ $file->status === 'completed' ? 'INDEX READY' : $file->status }}
                                        </span>
                                        <div class="flex items-center bg-white/5 rounded-xl p-1 border border-white/5">
                                            <a href="{{ route('datasets.download', $file->id) }}" class="p-2 text-gray-500 hover:text-white transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                            <button onclick="openPreprocessModal({{ $file->id }}, '{{ $file->status }}', '{{ addslashes($file->admin_note) }}', '{{ $file->file_name }}')" class="p-2 text-indigo-400 hover:bg-indigo-500/10 rounded-lg transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="py-10 text-center border border-dashed border-white/5 rounded-3xl bg-gray-900/10 text-gray-600 text-[10px] italic uppercase tracking-widest">No knowledge assets uploaded.</div>
                                @endforelse
                            </div>

                
                            <div class="space-y-4 pt-6 border-t border-white/5">
                                <div class="flex items-center justify-between px-2">
                                    <h3 class="text-xs font-black text-emerald-500 uppercase tracking-[0.2em] flex items-center gap-2">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                                        Fine-Tuning Datasets (Training Pool)
                                    </h3>
                                </div>

                                @forelse($files->where('usage_type', '!=', 'rag') as $file)
                                <div class="group bg-gray-900/40 border border-white/5 hover:border-emerald-500/30 rounded-3xl p-5 transition-all flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-white">{{ $file->file_name }}</p>
                                            <div class="flex flex-wrap items-center gap-2 mt-1">
                                                <p class="text-[10px] font-mono text-gray-500 uppercase">{{ $file->formatted_size }} • {{ $file->created_at->diffForHumans() }}</p>
                                                <span class="px-2 py-0.5 bg-gray-500/10 text-gray-400 border border-white/5 rounded text-[9px] font-black uppercase tracking-tighter">Raw Training Data</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        @php
                                            $statusMap = ['pending' => 'bg-orange-500/10 text-orange-400 border-orange-500/20', 'processing' => 'bg-blue-500/10 text-blue-400 border-blue-500/20', 'completed' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20'];
                                            $style = $statusMap[$file->status] ?? 'bg-gray-800 text-gray-400';
                                        @endphp
                                        <span class="px-2.5 py-0.5 border rounded-full text-[10px] font-black uppercase tracking-tighter {{ $style }}">
                                            {{ $file->status }}
                                        </span>
                                        <div class="flex items-center bg-white/5 rounded-xl p-1 border border-white/5">
                                            <a href="{{ route('datasets.download', $file->id) }}" class="p-2 text-gray-500 hover:text-white transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                            <button onclick="openPreprocessModal({{ $file->id }}, '{{ $file->status }}', '{{ addslashes($file->admin_note) }}', '{{ $file->file_name }}')" class="p-2 text-emerald-500 hover:bg-emerald-500/10 rounded-lg transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="py-10 text-center border border-dashed border-white/5 rounded-3xl bg-gray-900/10 text-gray-600 text-[10px] italic uppercase tracking-widest">No training assets located.</div>
                                @endforelse
                            </div>

                        </div>
                    </div>

                    {{-- Right Column: Side Info --}}
                    <div class="space-y-6">
                        <div class="bg-emerald-500/5 border border-emerald-500/10 rounded-[2rem] p-8">
                            <h3 class="text-sm font-black text-emerald-500 uppercase tracking-[0.2em] mb-6">Quality Control</h3>
                            <p class="text-[11px] text-gray-400 leading-relaxed mb-4">Admin will manually inspect raw documents to ensure compatibility with LLM tokenization standards.</p>
                            <div class="p-4 bg-black/40 rounded-2xl border border-white/5">
                                <p class="text-[10px] font-black text-gray-500 uppercase mb-2">Workflow</p>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-2 text-[10px] text-gray-300">
                                        <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span> User Uploads Raw Data
                                    </li>
                                    <li class="flex items-center gap-2 text-[10px] text-gray-300">
                                        <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span> Admin Preprocessing
                                    </li>
                                    <li class="flex items-center gap-2 text-[10px] text-gray-300">
                                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span> Optimized & Ready
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


@if(auth()->user()->isAdmin())
<div id="preprocessModal" class="fixed inset-0 z-50 hidden bg-gray-950/90 backdrop-blur-md flex items-center justify-center p-4">
    <div class="bg-gray-900 border border-white/10 w-full max-w-lg rounded-[2.5rem] overflow-hidden shadow-2xl">
        <form id="preprocessForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-10">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-white tracking-tight">Quality Assurance</h3>
                        <p class="text-sm text-gray-500 mt-1" id="modal_filename">File: loading...</p>
                    </div>
                    <button type="button" onclick="closePreprocessModal()" class="text-gray-500 hover:text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-widest mb-3">Review Status</label>
                        <select name="status" id="modal_status" class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-sm text-white outline-none focus:ring-2 focus:ring-emerald-500 transition-all">
                            <option value="pending">Pending Review</option>
                            <option value="processing">Currently Preprocessing</option>
                            <option value="completed">Completed (Ready for Train)</option>
                            <option value="rejected">Rejected (Invalid Format)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-widest mb-3">Feedback Note</label>
                        <textarea name="admin_note" id="modal_note" rows="3" class="w-full bg-black/40 border-gray-800 rounded-2xl p-4 text-sm text-gray-300 outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Inform user about cleanup actions..."></textarea>
                    </div>
                    <div class="p-6 bg-emerald-500/5 border border-emerald-500/10 rounded-3xl">
                        <label class="block text-[10px] font-black text-emerald-500 uppercase tracking-widest mb-3">Upload Optimized Asset (Optional)</label>
                        <input type="file" name="preprocessed_file" class="text-xs text-gray-500 w-full mt-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-emerald-500 file:text-gray-950 hover:file:bg-emerald-400">
                        <p class="text-[9px] text-gray-600 mt-3 italic">Uploading a new file will override the original during model fine-tuning.</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-800/30 p-8 flex justify-end gap-4 border-t border-white/5">
                <button type="button" onclick="closePreprocessModal()" class="px-6 py-2 text-xs font-bold text-gray-500 uppercase tracking-widest">Cancel</button>
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-gray-950 px-10 py-4 rounded-2xl text-xs font-black transition-all shadow-lg shadow-emerald-500/20">
                    COMMIT CHANGES
                </button>
            </div>
        </form>
    </div>
</div>
@endif

<script>
function openPreprocessModal(id, currentStatus, currentNote, filename) {
    const modal = document.getElementById('preprocessModal');
    const form = document.getElementById('preprocessForm');
    
    form.action = `/admin/datasets/${id}/update-status`;
    
    document.getElementById('modal_status').value = currentStatus;
    document.getElementById('modal_note').value = (currentNote === 'null' || !currentNote) ? '' : currentNote;
    document.getElementById('modal_filename').textContent = `Asset: ${filename}`;

    modal.classList.remove('hidden');
}

function closePreprocessModal() {
    document.getElementById('preprocessModal').classList.add('hidden');
}

let selectedFiles = [];
function handleFileSelect(e) { handleFiles(Array.from(e.target.files)); }
function handleFiles(files) {
    selectedFiles = [...selectedFiles, ...files];
    uploadFiles(); 
}
async function uploadFiles() {
    const usageType = document.querySelector('input[name="usage_type"]:checked').value;
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const promises = selectedFiles.map(file => {
        const formData = new FormData();
        formData.append('file', file);
        formData.append('usage_type', usageType); 
        
        return fetch('/datasets/upload', { 
            method: 'POST', 
            headers: { 'X-CSRF-TOKEN': csrfToken }, 
            body: formData 
        });
    });
    await Promise.all(promises);
    window.location.reload();
}

document.getElementById('rag-trigger')?.addEventListener('change', function() {
    document.getElementById('rag-hint').classList.toggle('hidden', !this.checked);
});

function formatFileSize(bytes) {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
}
</script>
@endsection