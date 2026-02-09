@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white">
    {{-- Admin Nav --}}
    <nav class="border-b border-red-900/30 bg-gray-900/90 backdrop-blur-xl sticky top-0 z-40 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="text-2xl font-black font-mono text-red-500 tracking-tighter">ADMIN ENGINE</span>
                <span class="px-2 py-0.5 bg-red-500/10 text-red-500 border border-red-500/20 rounded text-[10px] font-black uppercase">Core v1.0</span>
            </div>
            <a href="/dashboard" class="text-gray-400 hover:text-white text-sm">← Back to User View</a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-8">
        <h1 class="text-4xl font-bold mb-10 tracking-tight">Platform Overview</h1>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
          
            <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl">
                <p class="text-gray-500 text-xs font-black uppercase tracking-widest">Total Users</p>
                <p class="text-3xl font-mono mt-2 text-white">{{ $stats['total_users'] }}</p>
            </div>

         
            <a href="/training-jobs" class="bg-gray-900 border border-gray-800 p-6 rounded-2xl hover:border-emerald-500/50 transition-all group">
                <p class="text-gray-500 text-xs font-black uppercase tracking-widest">Total Jobs</p>
                <p class="text-3xl font-mono mt-2 text-emerald-400">{{ $stats['total_jobs'] }}</p>
                <p class="text-[10px] text-emerald-500/50 mt-2 group-hover:text-emerald-400 transition-colors">Monitor Task Queue →</p>
            </a>

         
            <a href="/data-upload" class="bg-gray-900 border border-orange-900/30 p-6 rounded-2xl hover:border-orange-400 transition-all group">
                <p class="text-orange-500 text-xs font-black uppercase tracking-widest">Pending Review</p>
                <p class="text-3xl font-mono mt-2 text-orange-400">{{ $stats['pending_datasets'] ?? 0 }}</p>
                <p class="text-[10px] text-orange-500/50 mt-2 group-hover:text-orange-400 transition-colors">Data Preprocessing Required →</p>
            </a>

     
            <div class="bg-gray-900 border border-red-900/30 p-6 rounded-2xl">
                <p class="text-red-500 text-xs font-black uppercase tracking-widest">System Failures</p>
                <p class="text-3xl font-mono mt-2 text-red-500">{{ $stats['failed_jobs'] }}</p>
            </div>
        </div>

        {{-- User Management Table --}}
        <div class="bg-gray-900 border border-gray-800 rounded-3xl overflow-hidden shadow-2xl">
            <div class="p-8 border-b border-gray-800 flex justify-between items-center bg-white/5">
                <div>
                    <h3 class="font-bold text-xl">User Directory</h3>
                    <p class="text-xs text-gray-500 mt-1">Manage user access and inspect private data assets.</p>
                </div>
            </div>
            <table class="w-full text-left">
                <thead class="bg-black/20 text-gray-500 text-[10px] uppercase font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">User Details</th>
                        <th class="px-8 py-4">Role</th>
                        <th class="px-8 py-4 text-right">Management & Assets</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($recentUsers as $user)
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-red-500/10 flex items-center justify-center text-red-500 font-bold border border-red-500/20">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-white group-hover:text-red-400 transition-colors">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500 font-mono">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-sm">
                            <span class="{{ $user->role === 'admin' ? 'text-red-400 bg-red-400/10 border-red-400/20' : 'text-emerald-400 bg-emerald-400/10 border-emerald-400/20' }} px-3 py-1 rounded-full text-[10px] font-black uppercase border tracking-tighter">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end gap-6">
                         
                                <a href="/data-upload?user_id={{ $user->id }}" class="flex items-center gap-1.5 text-xs font-black text-orange-400 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path></svg>
                                    VIEW ASSETS
                                </a>
                                
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="flex items-center gap-1.5 text-xs font-black text-gray-500 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    EDIT ACCESS
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection