@extends('layouts.app')

@section('title', 'Dashboard Dokter')

@section('content')
<div>
    <h1 class="font-bold text-base">Dashboard Dokter</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
</div>
@endsection
