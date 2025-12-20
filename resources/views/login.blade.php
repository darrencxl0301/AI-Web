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
                <form class="space-y-6" method="POST" action="#" id="loginForm">
                    @csrf
                    
                    {{-- Email Field --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required
                                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors pl-12"
                                   placeholder="your.email@company.com">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Password Field --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   required
                                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors pl-12 pr-12"
                                   placeholder="Enter your password">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword()">
                                <svg id="eye-icon" class="w-5 h-5 text-gray-400 hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember Me & Forgot Password --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="remember" 
                                   name="remember"
                                   class="w-4 h-4 text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500 focus:ring-2">
                            <label for="remember" class="ml-2 text-sm text-gray-300">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="text-sm text-emerald-400 hover:text-emerald-300 transition-colors">
                            Forgot password?
                        </a>
                    </div>

                    {{-- Login Button --}}
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/25 transform hover:scale-[1.02]">
                        <span id="login-text">Sign In</span>
                        <svg id="login-spinner" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </form>

                {{-- Divider --}}
                <div class="mt-8 mb-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-800/40 text-gray-400">New to SME.AI?</span>
                        </div>
                    </div>
                </div>

                {{-- Sign Up Link --}}
                <div class="text-center">
                    <p class="text-gray-400 text-sm">
                        Don't have an account? 
                        <a href="/contact" class="text-emerald-400 hover:text-emerald-300 font-semibold transition-colors">
                            Request Access
                        </a>
                    </p>
                </div>
            </div>
        </div>

        {{-- Demo Access Notice --}}
        <div class="mt-6 bg-indigo-900/20 border border-indigo-500/30 rounded-lg p-4 text-center">
            <div class="flex items-center justify-center mb-2">
                <svg class="w-5 h-5 text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-indigo-400">Demo Access</span>
            </div>
            <p class="text-xs text-gray-400">
                For demo purposes, use: <strong class="text-white">demo@sme.ai</strong> / <strong class="text-white">demo123</strong>
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
                © 2024 SME.AI • TAR UMT Research Project
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
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
        `;
    } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
        `;
    }
}

// Form submission
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const loginText = document.getElementById('login-text');
    const loginSpinner = document.getElementById('login-spinner');
    const submitButton = e.target.querySelector('button[type="submit"]');
    
    // Show loading state
    loginText.textContent = 'Signing In...';
    loginSpinner.classList.remove('hidden');
    submitButton.disabled = true;
    
    // Simulate login process
    setTimeout(() => {
        // Demo login check
        if (email === 'demo@sme.ai' && password === 'demo123') {
            // Success - redirect to dashboard
            window.location.href = '/dashboard';
        } else {
            // Error handling
            alert('Invalid credentials. For demo, use: demo@sme.ai / demo123');
            
            // Reset button state
            loginText.textContent = 'Sign In';
            loginSpinner.classList.add('hidden');
            submitButton.disabled = false;
        }
    }, 2000);
});

// Auto-fill demo credentials when clicking on the demo notice
document.querySelector('.bg-indigo-900\\/20').addEventListener('click', function() {
    document.getElementById('email').value = 'demo@sme.ai';
    document.getElementById('password').value = 'demo123';
});
</script>
@endsection