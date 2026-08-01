@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div>
    <h1 class="font-bold text-base">Dashboard Admin</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
</div>
@endsection
