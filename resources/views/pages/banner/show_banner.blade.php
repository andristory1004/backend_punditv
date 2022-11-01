@extends('layouts.admin')
@section('title', 'Show Banner')
@section('main')
    <div class="w-full">
        <div class="hidden md:flex justify-start space-x-4 px-5">
            <a href={{ route('banner.index') }}
                class="px-6 py-2.5 bg-red text-white text-xs rounded shadow-md hover:bg-opacity-70 hover:shadow-lg transition duration-150 ease-in-out mt-5 font-acme w-28 text-center">
                Back
            </a>
        </div>
        <div class="mb-3 bg-dark-blue px-5 md:py-5 rounded-lg w-full">
            <img src="http://127.0.0.1:8000/{{ $data->banner }}" alt="" class="w-3/4 mx-auto">
        </div>
    </div>

@endsection
