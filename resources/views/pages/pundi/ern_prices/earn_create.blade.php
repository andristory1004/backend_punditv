@extends('layouts.admin')

@section('title', 'Add Earn Price')
@section('main')
    <form action={{ route('earn-price.store') }} method="post">
        @csrf
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96 bg-dark-blue px-5 py-5 rounded-lg mt-16">
                <label for="price" class="form-label inline-block mb-2 text-white font-acme">Price</label>
                <input type="number"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                    id="price" name="price" placeholder="Enter Price" value={{ old('price') }} />
                @error('price')
                    <div class="text-red ">
                        {{ $message }}
                    </div>
                @enderror

                <label for="price" class="form-label inline-block mb-2 text-white font-acme">Price Lv 1</label>
                <input type="number"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                    id="price_lv_1" name="price_lv_1" placeholder="Enter Price" value={{ old('price_lv_1') }} />
                @error('price_lv_1')
                    <div class="text-red ">
                        {{ $message }}
                    </div>
                @enderror

                <label for="price_lv_2" class="form-label inline-block mb-2 text-white font-acme mt-5">Price Level 2</label>
                <input type="number"
                    class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                    id="price_lv_2" name="price_lv_2" placeholder="Enter Price" value={{ old('price_lv_2') }} />
                @error('price_lv_2')
                    <div class="text-red ">
                        {{ $message }}
                    </div>
                @enderror


                <div class="flex">
                    <div>
                        <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-5">
                            Status
                        </label>
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="is_active" id="is_active_1" value="1" checked>
                            <label class="form-check-label inline-block text-white font-acme" for="is_active_1">
                                Enable
                            </label>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="is_active" id="is_active_2" value="0">
                            <label class="form-check-label inline-block text-white font-acme" for="is_active_2">
                                Disable
                            </label>
                        </div>
                    </div>


                    <div class="ml-16">
                        <label for="exampleText0" class="form-label inline-block mb-2 text-white font-acme mt-5">Type
                            Price</label>
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="price_type_id" id="price_type_id_1" value="1" checked>
                            <label class="form-check-label inline-block text-white font-acme" for="price_type_id_1">
                                View
                            </label>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="price_type_id" id="price_type_id_2" value="2">
                            <label class="form-check-label inline-block text-white font-acme" for="price_type_id_2">
                                Subscribe
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href={{ route('pundi.index') }}
                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out mt-5 font-acme w-28 text-center">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mt-5 font-acme w-28 text-center">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
