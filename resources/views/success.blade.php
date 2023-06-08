@extends('layout')

@section('title', 'Upload successful')

@section('content')
<div class="grid min-h-screen place-items-center">
    <div class="space-y-4 max-w-md mx-auto bg-white rounded-lg p-8 shadow-xl">
        <h1 class="text-xl font-bold text-green-600">Success!!!</h1>
        <p class="text-gray-700">
            When your Excel document is prepared for download, it will show up under Dashboard > <a class="link link-success" href="{{ url('dashboard/excels') }}">Excels</a>.
        </p>
    </div>
</div>
@endsection
