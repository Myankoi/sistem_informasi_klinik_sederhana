@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-xs">
    <h1 class="font-bold text-base mb-3">Login SIKS</h1>

    @if($errors->any())
        <div class="text-red-600 mb-3">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST" class="space-y-3">
        @csrf
        <div>
            <label class="block mb-1">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required class="border p-1 w-full">
        </div>

        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password" required class="border p-1 w-full">
        </div>

        <button type="submit" class="bg-black text-white px-3 py-1">Login</button>
    </form>

    <p class="mt-3">
        Belum punya akun? <a href="{{ route('register') }}" class="underline">Daftar</a>
    </p>
</div>
@endsection
