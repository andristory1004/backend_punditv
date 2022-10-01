@extends('layouts.admin')
@section('title', 'Add Admin')
@section('main')
    <form action={{ route('admin.store') }} method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="flex justify-start space-x-4 px-5">
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
            <div class="flex justify-center">
                <div class="mb-3 bg-dark-blue px-5 py-5 rounded-lg w-1/2 ">
                    <label for="name" class="form-label inline-block mb-2 text-white font-acme">Name</label>
                    <input type="name"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                        id="name" name="name" placeholder="Enter name" />
                    @error('name')
                        <div class="text-red ">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-3">Email</label>
                    <input type="email"
                        class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                        id="email" name="email" placeholder="Enter email" />
                    @error('email')
                        <div class="text-red ">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="exampleText0"
                        class="form-label inline-block mb-2 text-white font-acme mt-3">Password</label>
                    <input type="password"
                        class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                        id="password" name="password" placeholder="Enter password" />
                    @error('password')
                        <div class="text-red ">
                            {{ $message }}
                        </div>
                    @enderror

                    <div>
                        <label for="form-check" class="form-label inline-block mb-2 text-white font-acme mt-3">
                            Status
                        </label>
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="is_active" id="is_active_1" value="1" checked>
                            <label class="form-check-label inline-block text-white font-acme" for="is_active_1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="is_active" id="is_active_2" value="0">
                            <label class="form-check-label inline-block text-white font-acme" for="is_active_2">
                                InActive
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mb-3 bg-dark-blue px-5 py-5 rounded-lg w-1/2 ">
                    <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-3">Picture</label>
                    <img src="" class="preview w-1/2 mb-3 mx-auto rounded-xl shadow-2xl" alt="">
                    <input type="file"
                        class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                        id="picture" name="picture" onchange="previewImage()" />
                    @error('picture')
                        <div class="text-red ">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>
    </form>
    <script>
        function previewImage() {
            // const image = document.querySelector('#image');
            // const imgPreview = document.querySelector('.img-preview');
            const image = document.querySelector('#picture');
            const preview = document.querySelector('.preview');

            preview.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
