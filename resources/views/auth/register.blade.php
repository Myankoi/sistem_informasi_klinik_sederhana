@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-xs">
    <h1 class="font-bold text-base mb-3">Register Pasien</h1>

    @if($errors->any())
        <div class="text-red-600 mb-3">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST" class="space-y-3">
        @csrf
        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="border p-1 w-full">
        </div>

        <div>
            <label class="block mb-1">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required class="border p-1 w-full">
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="border p-1 w-full">
        </div>

        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password" required class="border p-1 w-full">
        </div>

        <div>
            <label class="block mb-1">No HP</label>
            <input type="text" name="nohp" value="{{ old('nohp') }}" required class="border p-1 w-full">
        </div>

        <div>
            <label class="block mb-1">Jenis Kelamin</label>
            <select name="jk" required class="border p-1 w-full">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <button type="submit" class="bg-black text-white px-3 py-1">Daftar</button>
    </form>

    <p class="mt-3">
        Sudah punya akun? <a href="{{ route('login') }}" class="underline">Login</a>
    </p>
</div>
@endsection
