@extends('layouts.admin')
@section('title', 'Edit Admin')
@section('main')
    <form action={{ route('admin.update', $admin->id) }} method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="w-full">
            <div class="hidden md:flex justify-start space-x-4 px-5">
                <a href={{ route('admin.index') }}
                    class="px-6 py-2.5 bg-red text-white text-xs rounded shadow-md hover:bg-opacity-70 hover:shadow-lg transition duration-150 ease-in-out mt-5 font-acme w-28 text-center">
                    Cancel
                </a>
                <button type="submit">
                    <p
                        class="px-6 py-2.5 bg-blue text-white text-xs rounded shadow-md hover:bg-opacity-70 hover:shadow-lg transition duration-150 ease-in-out mt-5 font-acme w-28 text-center">
                        Save
                    </p>
                </button>
            </div>
            <div class="md:flex justify-center">
                <div class="md:hidden mb-3 bg-dark-blue px-5 py-5 rounded-lg ">
                    @if ($admin->picture == null)
                        <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="w-2/3 h-auto rounded-full mx-auto"
                            alt="">
                    @else
                        <div class="w-56 h-56 bg-center bg-cover rounded-xl shadow-xl mx-auto"
                            style="background-image: url('http://127.0.0.1:8000/{{ $admin->picture }}') ">
                        </div>
                    @endif
                </div>
                <div class="mb-3 bg-dark-blue px-5 py-5 rounded-lg md:w-1/2 ">
                    <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-3">Name</label>
                    <div
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme ">
                        {{ $admin->name }}
                    </div>

                    <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-3">Email</label>
                    <div
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme ">
                        {{ $admin->email }}
                    </div>
                    <div>
                        <label for="form-check" class="form-label inline-block mb-2 text-white font-acme mt-3">
                            Status
                        </label>
                        <div class="form-check">
                            @if ($admin->is_active == 0)
                                <input
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="radio" name="is_active" id="is_active_1" value="1">
                                <label class="form-check-label inline-block text-white font-acme" for="is_active_1">
                                    Active
                                </label>
                            @else
                                <input
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="radio" name="is_active" id="is_active_1" value="1" checked>
                                <label class="form-check-label inline-block text-white font-acme" for="is_active_1">
                                    Active
                                </label>
                            @endif
                        </div>
                        <div class="form-check">
                            @if ($admin->is_active == 1)
                                <input
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="radio" name="is_active" id="is_active_2" value="0">
                                <label class="form-check-label inline-block text-white font-acme" for="is_active_2">
                                    InActive
                                </label>
                            @else
                                <input
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="radio" name="is_active" id="is_active_2" value="0" checked>
                                <label class="form-check-label inline-block text-white font-acme" for="is_active_2">
                                    InActive
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="hidden md:block mb-3 bg-dark-blue px-5 py-5 rounded-lg w-1/2 ">
                    <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-3">Picture</label>
                    @if ($admin->picture == null)
                        <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg"
                            class="w-2/3 h-auto rounded-full mx-auto" alt="">
                    @else
                        <div class="w-72 h-72 bg-center bg-cover rounded-xl shadow-xl"
                            style="background-image: url('http://127.0.0.1:8000/{{ $admin->picture }}')">
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex md:hidden justify-end space-x-4 px-5 pb-20">
                <a href={{ route('admin.index') }}
                    class=" py-2.5 bg-red text-white text-xs rounded shadow-md hover:bg-opacity-70 ease-in-out font-acme w-28 text-center">
                    Cancel
                </a>
                <button type="submit">
                    <p
                        class=" py-2.5 bg-blue text-white text-xs rounded shadow-md hover:bg-opacity-70
                        hover:shadow-lg transition duration-150 ease-in-out font-acme w-28 text-center">
                        Save
                    </p>
                </button>
            </div>
        </div>
    </form>

@endsection
