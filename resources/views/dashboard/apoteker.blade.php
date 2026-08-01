@extends('layouts.app')

@section('title', 'Dashboard Apoteker')

@section('content')
<div>
    <h1 class="font-bold text-base">Dashboard Apoteker</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
</div>
@endsection
