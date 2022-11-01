@extends('layouts.admin')
@section('title', 'Add Banner')
@section('main')
    <form action={{ route('banner.store') }} method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="hidden md:flex justify-start space-x-4 px-5">
                <a href={{ route('banner.index') }}
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

            <div class="mb-3 bg-dark-blue px-5 md:py-5 rounded-lg w-full ">
                <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-3">Banner
                    Picture</label>
                <img src="" class="preview w-1/2 mb-3 mx-auto rounded-xl shadow-2xl" alt="">
                <input type="file"
                    class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                    id="banner" name="banner" onchange="previewImage()" />
                @error('banner')
                    <div class="text-red ">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="flex md:hidden justify-end space-x-4 px-5 pb-20">
            <<a href={{ route('admin.index') }}
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

        </div>
    </form>
    <script>
        function previewImage() {
            // const image = document.querySelector('#image');
            // const imgPreview = document.querySelector('.img-preview');
            const image = document.querySelector('#banner');
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
