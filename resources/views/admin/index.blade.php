@extends('admin.template.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Page</h1>
    <p>Selamat datang <span style="font-weight: bold">{{ Auth()->user()->name}}</span> di MasterSiswa.id</p>
@endsection
