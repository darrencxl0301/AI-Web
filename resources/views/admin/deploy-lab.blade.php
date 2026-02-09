@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 p-8 text-white">
    <div class="max-w-7xl mx-auto">
   
        <div class="flex items-center justify-between mb-10">
            <div>
                <h2 class="text-3xl font-bold flex items-center gap-3">
                    <span class="text-emerald-400">Deploy Lab:</span> {{ $job->job_name }}
                </h2>
                <p class="text-gray-500 mt-1">Configure and validate your model before publishing to SME users.</p>
            </div>
            <a href="{{ route('training-jobs.index') }}" class="text-gray-400 hover:text-white transition-colors">Back to Tasks</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-gray-900 border border-white/10 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-6">Configuration</h3>
                    
                    <div class="space-y-6">
                        {{-- API Key --}}
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2">Test API Key (Google Gemini)</label>
                            <input type="password" id="api_key" value="AIzaSyDrKp6kSd2mRNWmt7tqdMkZBB-UhT7aqZ8" 
                                   class="w-full bg-black/50 border-gray-700 rounded-xl p-3 font-mono text-sm text-emerald-400 outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>

                        {{-- System Prompt --}}
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2">System Instructions (Prompt Engineering)</label>
                            <textarea id="system_prompt" rows="6" 
                                      class="w-full bg-black/50 border-gray-700 rounded-xl p-4 text-sm font-mono leading-relaxed outline-none focus:ring-2 focus:ring-emerald-500"
                                      placeholder="Example: You are a professional HR assistant for Malaysia SME companies...">You are a professional Data Science assistant specialized in LLM fine-tuning.</textarea>
                        </div>

                  
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase mb-2">Test User Query</label>
                            <input type="text" id="user_query" value="Tell me your purpose in one sentence."
                                   class="w-full bg-black/50 border-gray-700 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <button onclick="runInferenceTest()" id="test_btn" 
                                class="w-full py-4 bg-blue-600 hover:bg-blue-500 rounded-2xl font-black transition-all flex items-center justify-center gap-2 group">
                            <span>RUN INFERENCE TEST</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-7 flex flex-col h-full">
                <div class="bg-black border border-white/5 rounded-3xl p-8 flex-1 flex flex-col shadow-inner min-h-[500px]">
                    <h3 class="text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-4">Inference Console</h3>
                    
                    <div id="console_window" class="flex-1 overflow-y-auto space-y-4 font-mono text-sm p-4 bg-gray-950/50 rounded-2xl border border-white/5 mb-6">
                        <p class="text-gray-600">-- Ready to initialize test --</p>
                    </div>

                    
                    <form action="{{ route('admin.jobs.publish', $job->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="admin_api_key" id="hidden_api_key">
                        <input type="hidden" name="system_prompt" id="hidden_prompt">
                        
                        <button type="submit" id="publish_btn" disabled 
                                class="w-full py-4 bg-emerald-500 disabled:bg-gray-800 disabled:text-gray-600 text-gray-950 rounded-2xl font-black transition-all shadow-lg shadow-emerald-500/20">
                            CONFIRM CONFIGURATION & PUBLISH
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function runInferenceTest() {
    const apiKey = document.getElementById('api_key').value;
    const prompt = document.getElementById('system_prompt').value;
    const userQuery = document.getElementById('user_query').value;
    const consoleWindow = document.getElementById('console_window');
    const btn = document.getElementById('test_btn');

    if(!apiKey) return alert("Please enter an API Key");


    btn.disabled = true;
    btn.innerText = "THINKING...";
    consoleWindow.innerHTML += `<p class="text-blue-400 mt-4">[SYSTEM]: Sending request to Gemini Engine...</p>`;
    
    try {
        const response = await fetch("{{ route('admin.jobs.test', $job->id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                admin_api_key: apiKey,
                system_prompt: prompt,
                user_query: userQuery
            })
        });

        const data = await response.json();

        if(data.success) {
            consoleWindow.innerHTML += `
                <p class="text-emerald-400 mt-2">[SUCCESS]: Received Response</p>
                <div class="bg-white/5 p-4 rounded-xl mt-2 text-gray-300 border-l-2 border-emerald-500">
                    ${data.output}
                </div>
            `;
    
            document.getElementById('publish_btn').disabled = false;
            document.getElementById('hidden_api_key').value = apiKey;
            document.getElementById('hidden_prompt').value = prompt;
        } else {
            consoleWindow.innerHTML += `<p class="text-red-400 mt-2">[ERROR]: ${data.message}</p>`;
        }
    } catch (e) {
        consoleWindow.innerHTML += `<p class="text-red-400 mt-2">[FATAL]: Connection failed.</p>`;
    } finally {
        btn.disabled = false;
        btn.innerText = "RUN INFERENCE TEST";
        consoleWindow.scrollTop = consoleWindow.scrollHeight;
    }
}
</script>
@endsection