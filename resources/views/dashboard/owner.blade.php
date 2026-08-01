@extends('layouts.app')

@section('title', 'Dashboard Owner')

@section('content')
<div>
    <h1 class="font-bold text-base">Dashboard Owner</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
</div>
@endsection
