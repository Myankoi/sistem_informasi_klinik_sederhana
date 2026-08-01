@extends('layouts.app')

@section('title', 'Dashboard Pasien')

@section('content')
<div>
    <h1 class="font-bold text-base">Dashboard Pasien</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
</div>
@endsection
