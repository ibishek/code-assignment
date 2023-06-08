@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <x-card>
        <h1 class="font-bold text-xl">Upload Json</h1>
        <form action="{{ url('dashboard/excels') }}" class="space-y-2" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-control w-full">
                <label class="label" for="json-file">
                    <span class="label-text">Json file</span>
                </label>
                <input type="file" name="json" id="json-file" class="file-input file-input-sm w-full" accept=".json" />
                @error('json')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label" for="json-file">
                    <span class="label-text">Give it a name</span>
                </label>
                <input type="text" name="file_name" placeholder="All users" class="input input-sm input-bordered w-full" />
                @error('file_name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-sm block btn-neutral">Upload</button>
        </form>
    </x-card>
@endsection
