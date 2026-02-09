@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Edit User Access</h1>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-white text-sm">Cancel</a>
        </div>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-gray-900 border border-gray-800 rounded-3xl p-8 space-y-6 shadow-2xl">
            @csrf @method('PUT')

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2">Display Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full bg-gray-800 border-gray-700 rounded-xl p-3 focus:ring-2 focus:ring-red-500 outline-none">
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2">Platform Role</label>
                <select name="role" class="w-full bg-gray-800 border-gray-700 rounded-xl p-3 focus:ring-2 focus:ring-red-500 outline-none">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Standard User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-500 text-white font-black py-4 rounded-xl shadow-lg shadow-red-600/20 transition-all active:scale-95">
                UPDATE PERMISSIONS
            </button>
        </form>
    </div>
</div>
@endsection