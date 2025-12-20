{{-- resources/views/contact.blade.php --}}
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
                    <a href="/solution" class="text-gray-300 hover:text-emerald-400 transition-colors">Solution</a>
                    <a href="/about" class="text-gray-300 hover:text-emerald-400 transition-colors">About</a>
                    <a href="/contact" class="text-emerald-400">Contact</a>
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
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-emerald-950/20"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_30%,rgba(16,185,129,0.1)_0%,transparent_50%)]"></div>
        
        <div class="relative z-10 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h1 class="text-5xl lg:text-6xl font-bold bg-gradient-to-r from-emerald-400 via-emerald-300 to-indigo-400 bg-clip-text text-transparent mb-6">
                        Get Started Today
                    </h1>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Ready to transform your business documents into intelligent AI assistance? 
                        Let's start with a free Proof of Concept.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Contact Section --}}
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                {{-- Contact Form --}}
                <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-white mb-4">Request Free PoC</h2>
                        <p class="text-gray-400">
                            Fill out this form and we'll contact you within 24 hours to discuss your 
                            specific business needs and set up a personalized demonstration.
                        </p>
                    </div>
                    
                    <form class="space-y-6" method="POST" action="#" id="contactForm">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-300 mb-2">
                                    First Name *
                                </label>
                                <input type="text" 
                                       id="firstName" 
                                       name="firstName" 
                                       required
                                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                       placeholder="Your first name">
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-300 mb-2">
                                    Last Name *
                                </label>
                                <input type="text" 
                                       id="lastName" 
                                       name="lastName" 
                                       required
                                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                       placeholder="Your last name">
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                Email Address *
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required
                                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                   placeholder="your.email@company.com">
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-300 mb-2">
                                    Company Name *
                                </label>
                                <input type="text" 
                                       id="company" 
                                       name="company" 
                                       required
                                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                       placeholder="Your company">
                            </div>
                            <div>
                                <label for="industry" class="block text-sm font-medium text-gray-300 mb-2">
                                    Industry
                                </label>
                                <select id="industry" 
                                        name="industry"
                                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                    <option value="">Select industry</option>
                                    <option value="manufacturing">Manufacturing</option>
                                    <option value="trading">Trading & E-commerce</option>
                                    <option value="construction">Construction & Engineering</option>
                                    <option value="hospitality">Hospitality & Services</option>
                                    <option value="hr-admin">HR & Administration</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
                                    Phone Number
                                </label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone"
                                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                       placeholder="+60 12-345-6789">
                            </div>
                            <div>
                                <label for="employees" class="block text-sm font-medium text-gray-300 mb-2">
                                    Company Size
                                </label>
                                <select id="employees" 
                                        name="employees"
                                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                    <option value="">Select size</option>
                                    <option value="1-10">1-10 employees</option>
                                    <option value="11-50">11-50 employees</option>
                                    <option value="51-200">51-200 employees</option>
                                    <option value="200+">200+ employees</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="useCase" class="block text-sm font-medium text-gray-300 mb-2">
                                Your Use Case *
                            </label>
                            <textarea id="useCase" 
                                      name="useCase" 
                                      rows="4"
                                      required
                                      class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors resize-none"
                                      placeholder="Describe your business challenge and how you think AI could help. For example: 'We have thousands of Excel files with product data and need quick answers about inventory and pricing...'"></textarea>
                        </div>
                        
                        <div>
                            <label for="dataTypes" class="block text-sm font-medium text-gray-300 mb-2">
                                Types of Data You Have
                            </label>
                            <div class="grid grid-cols-2 gap-3 mt-3">
                                <label class="flex items-center">
                                    <input type="checkbox" name="dataTypes[]" value="excel" class="form-checkbox text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500">
                                    <span class="ml-2 text-gray-300 text-sm">Excel files</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="dataTypes[]" value="documents" class="form-checkbox text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500">
                                    <span class="ml-2 text-gray-300 text-sm">Documents/PDFs</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="dataTypes[]" value="emails" class="form-checkbox text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500">
                                    <span class="ml-2 text-gray-300 text-sm">Emails</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="dataTypes[]" value="wechat" class="form-checkbox text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500">
                                    <span class="ml-2 text-gray-300 text-sm">WeChat logs</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="dataTypes[]" value="sops" class="form-checkbox text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500">
                                    <span class="ml-2 text-gray-300 text-sm">SOPs/Manuals</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="dataTypes[]" value="other" class="form-checkbox text-emerald-500 bg-gray-700 border-gray-600 rounded focus:ring-emerald-500">
                                    <span class="ml-2 text-gray-300 text-sm">Other</span>
                                </label>
                            </div>
                        </div>
                        
                        <div>
                            <label for="timeline" class="block text-sm font-medium text-gray-300 mb-2">
                                When do you want to start?
                            </label>
                            <select id="timeline" 
                                    name="timeline"
                                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                <option value="">Select timeline</option>
                                <option value="asap">As soon as possible</option>
                                <option value="1-month">Within 1 month</option>
                                <option value="3-months">Within 3 months</option>
                                <option value="exploring">Just exploring options</option>
                            </select>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all hover:shadow-lg hover:shadow-emerald-500/25 transform hover:scale-105">
                            Request Free PoC Demo
                        </button>
                        
                        <p class="text-xs text-gray-500 text-center">
                            By submitting this form, you agree to be contacted by our research team. 
                            We respect your privacy and will never share your information.
                        </p>
                    </form>
                </div>
                
                {{-- Contact Information --}}
                <div class="space-y-8">
                    {{-- Direct Contact --}}
                    <div class="bg-gray-800/40 border border-gray-700 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-white mb-6">Contact Information</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xl">📧</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Email</h4>
                                    <a href="mailto:limtm@tarc.edu.my" 
                                       class="text-emerald-400 hover:text-emerald-300 transition-colors">
                                        limtm@tarc.edu.my
                                    </a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xl">🎓</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Research Team</h4>
                                    <p class="text-gray-400 text-sm">
                                        Prof. Lim Tong Ming<br>
                                        Centre for Business Incubation & Entrepreneurial Ventures<br>
                                        TAR UMT
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xl">📍</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-white mb-1">Location</h4>
                                    <p class="text-gray-400 text-sm">
                                        Setapak, Kuala Lumpur<br>
                                        <span class="text-emerald-400">Malaysia</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- What to Expect --}}
                    <div class="bg-emerald-900/20 border border-emerald-500/30 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-white mb-6">What to Expect</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-xs font-bold">1</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Initial Consultation</h4>
                                    <p class="text-gray-400 text-sm">We'll discuss your business needs and data structure (30 minutes)</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-xs font-bold">2</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Custom Demo Preparation</h4>
                                    <p class="text-gray-400 text-sm">We'll prepare a demo using your industry scenario and sample data</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-xs font-bold">3</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Live Demonstration</h4>
                                    <p class="text-gray-400 text-sm">See the AI employee running offline on an 8GB laptop with your use case</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-white text-xs font-bold">4</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Implementation Plan</h4>
                                    <p class="text-gray-400 text-sm">If you're satisfied, we'll create a detailed roadmap for your pilot project</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Why Free PoC --}}
                    <div class="bg-indigo-900/20 border border-indigo-500/30 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-white mb-6">Why Free PoC?</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="text-indigo-400 text-lg">✓</span>
                                <span class="text-gray-300 text-sm">We're confident in our solution's effectiveness</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-indigo-400 text-lg">✓</span>
                                <span class="text-gray-300 text-sm">Academic research benefits from real-world validation</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-indigo-400 text-lg">✓</span>
                                <span class="text-gray-300 text-sm">We want to build long-term partnerships with SMEs</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-indigo-400 text-lg">✓</span>
                                <span class="text-gray-300 text-sm">Your success validates our research and helps other SMEs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    <div class="py-20 bg-gray-900/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-400">Quick answers to common questions about our solution</p>
            </div>
            
            <div class="space-y-6">
                <div class="bg-gray-800/40 border border-gray-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-3">How long does the PoC take?</h3>
                    <p class="text-gray-400">Typically 2-3 days for demo preparation, then a 1-hour live demonstration. If you proceed, the pilot implementation takes 1-2 weeks.</p>
                </div>
                
                <div class="bg-gray-800/40 border border-gray-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-3">Do you need access to our sensitive data?</h3>
                    <p class="text-gray-400">No. For the demo, we use anonymized sample data similar to your industry. Your actual data never leaves your premises during the pilot.</p>
                </div>
                
                <div class="bg-gray-800/40 border border-gray-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-3">What hardware do we need?</h3>
                    <p class="text-gray-400">Any laptop with 8GB RAM and a modern GPU (RTX 2000 Ada or equivalent). We can also help you choose cost-effective hardware upgrades.</p>
                </div>
                
                <div class="bg-gray-800/40 border border-gray-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-3">Is there ongoing support?</h3>
                    <p class="text-gray-400">Yes. As an academic research project, we provide continuous support and updates. Your success helps validate our research.</p>
                </div>
                
                <div class="bg-gray-800/40 border border-gray-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-3">What if we're not technical?</h3>
                    <p class="text-gray-400">Perfect! Our solution is designed for non-technical SME owners. We handle all the technical setup and provide simple training for your staff.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simple form validation and submission logic
    // In a real application, this would submit to a backend service
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    
    // Show loading state
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert('Thank you! We\'ll contact you within 24 hours to schedule your free PoC demo.');
        
        // Reset form
        e.target.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 2000);
});
</script>
@endsection