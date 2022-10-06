@extends('layouts.admin')
@section('title', 'Edit Campaign Price')
@section('main')
    <div class="px-10 py-10 text-white">
        <form action={{ route('campaign-price.update', $data->id) }} method="post">
            @method('PUT')
            @csrf

            <div class="flex items-center py-2 font-kalam">
                <p class="w-72">Type</p>
                <p class="pr-5">:</p>
                <p
                    class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme">
                    {{ $data->priceType->type }}
                </p>
            </div>

            <div class="flex items-center py-2 font-kalam">
                <p class="w-72">Price</p>
                <p class="pr-5">:</p>

                <input type="number" name="price"
                    class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                    value="{{ old('price', $data->price) }}">
            </div>

            <div class="flex items-center py-2 font-kalam">
                <p class="w-72">Discount</p>
                <p class="pr-5">:</p>

                <input type="number" name="sale"
                    class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme"
                    value="{{ old('sale', $data->sale) }}">
            </div>

            <div class="flex py-2 font-kalam">
                <p class="w-56">status</p>
                <p class="pr-5">:</p>

                @if ($data->is_active == 1)
                    <div class="space-y-3">
                        <div class="form-check">
                            <input
                                class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                                type="radio" name="is_active" id="is_active_1" value="1" checked>
                            <label class="inline-block text-white form-check-label font-acme" for="is_active_1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input
                                class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                                type="radio" name="is_active" id="is_active_2" value="0">
                            <label class="inline-block text-white form-check-label font-acme" for="is_active_2">
                                InActive
                            </label>
                        </div>
                    </div>
                @else
                    <div class="space-y-3">
                        <div class="form-check">
                            <input
                                class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                                type="radio" name="is_active" id="is_active_1" value="1">
                            <label class="inline-block text-white form-check-label font-acme" for="is_active_1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input
                                class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                                type="radio" name="is_active" id="is_active_2" value="0" checked>
                            <label class="inline-block text-white form-check-label font-acme" for="is_active_2">
                                InActive
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            {{-- footer --}}
            <div class="flex items-center justify-end mt-16 space-x-3">
                <a href={{ route('price.index') }}
                    class="flex items-center px-6 py-1 space-x-3 font-normal text-center text-white transition ease-in-out rounded shadow-md bg-red hover:bg-opacity-70 hover:shadow-lg h-fit w-fit font-acme">
                    <span>
                        Back
                    </span>
                </a>
                <button type="submit">
                    <div
                        class="flex items-center px-6 py-1 space-x-3 font-normal text-center text-white transition ease-in-out rounded shadow-md bg-blue hover:bg-opacity-70 hover:shadow-lg h-fit w-fit font-acme">
                        <span>
                            Save
                        </span>
                    </div>
                </button>
            </div>

        </form>
    </div>
@endsection
