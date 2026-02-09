{{-- resources/views/login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 flex items-center justify-center">
    {{-- Background Elements --}}
    <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-emerald-950/20"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 w-full max-w-md px-4">
        {{-- Back to Home --}}
        <div class="mb-8">
            <a href="/" class="inline-flex items-center text-gray-400 hover:text-emerald-400 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Home
            </a>
        </div>

        {{-- Login Card --}}
        <div class="bg-gray-800/40 backdrop-blur-sm border border-gray-700 rounded-2xl shadow-2xl overflow-hidden">
            {{-- Header --}}
            <div class="px-8 pt-8 pb-6 text-center">
                <div class="mb-4">
                    <span class="text-3xl font-bold font-mono text-emerald-400">SME.AI</span>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-gray-400">Sign in to access your AI platform</p>
            </div>

            {{-- Login Form --}}
            <div class="px-8 pb-8">
                <form method="POST" action="{{ route('login.perform') }}" class="space-y-6">
                    @csrf
    
                    {{-- Email Input --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-700 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-gray-800 text-white"
                                value="demo@sme.ai">
                        </div>
                    </div>
    
                    {{-- Password Input --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <div class="mt-1 relative">
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="appearance-none block w-full px-3 py-2 border border-gray-700 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-gray-800 text-white pr-10"
                                value="demo123">
                            
                            {{-- Toggle Password Button --}}
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-400 hover:text-white focus:outline-none">
                                <svg id="eye-icon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="rounded-md bg-red-900/30 p-3 border border-red-900/50">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-400">Login failed</h3>
                                    <div class="mt-1 text-sm text-red-300/80">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
    
                    {{-- Submit Button --}}
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Demo Access Notice --}}
        <div id="demo-fill" class="mt-6 bg-indigo-900/20 border border-indigo-500/30 rounded-lg p-4 text-center cursor-pointer hover:bg-indigo-900/30 transition-colors">
            <div class="flex items-center justify-center mb-2">
                <svg class="w-5 h-5 text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-indigo-400">Demo Access</span>
            </div>
            <p class="text-xs text-gray-400">
                Click here to auto-fill: <strong class="text-white">demo@sme.ai</strong> / <strong class="text-white">demo123</strong>
            </p>
        </div>

        {{-- Footer Links --}}
        <div class="mt-8 text-center text-xs text-gray-500">
            <p>
                By signing in, you agree to our 
                <a href="#" class="text-emerald-400 hover:text-emerald-300">Terms of Service</a> and 
                <a href="#" class="text-emerald-400 hover:text-emerald-300">Privacy Policy</a>
            </p>
            <p class="mt-2">
                © 2026 SME.AI • TAR UMT Research Project
            </p>
        </div>
    </div>
</div>

<script>
// Password visibility toggle
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        // Show "Hide" icon
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
        `;
    } else {
        passwordInput.type = 'password';
        // Show "Show" icon
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
        `;
    }
}

// Auto-fill demo credentials
document.getElementById('demo-fill').addEventListener('click', function() {
    document.getElementById('email').value = 'demo@sme.ai';
    document.getElementById('password').value = 'demo123';
});
</script>
@endsection