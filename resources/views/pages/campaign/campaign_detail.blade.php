@extends('layouts.admin')
@section('title', 'Campaign Detail')
@section('main')
    <div class="w-full px-10 py-10 ">
        <div class="px-5 py-5 shadow-2xl">
            <a href={{ route('campaign.index') }}
                class="px-6 py-2.5 bg-red text-white text-xs rounded shadow-md hover:bg-opacity-70 hover:shadow-lg transition duration-150 ease-in-out mt-5 font-acme w-28 text-center">
                Back
            </a>
            <div class="flex items-center mt-10 space-x-10 text-white">
                @if ($dataCampaign->user->picture == null)
                    <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="w-40 h-auto mx-auto rounded-full"
                        alt="">
                @else
                    <div class="bg-center bg-cover shadow-xl w-72 h-72 rounded-xl"
                        style="background-image: url('http://127.0.0.1:8000/{{ $dataCampaign->user->picture }}')">
                    </div>
                @endif
                <div>
                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Name</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->user->name }}</p>
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Campaign Type</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->campaignType->type }}</p>
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Campaign Category</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->campaignCategory->category }}</p>
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Link</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->link }}</p>
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        @if ($dataCampaign->watch_time == null)
                            <p class="w-72">Number Of Subscribe</p>
                            <p class="pr-5">:</p>
                            <p class="w-full">{{ $dataCampaign->number_of_subscribe }}</p>
                        @else
                            <p class="w-72">Watch Time</p>
                            <p class="pr-5">:</p>
                            <p class="w-full">{{ $dataCampaign->watch_time }}</p>
                        @endif
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Price</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->price }}</p>
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Price</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->price }}</p>
                    </div>

                    <div class="flex items-center py-2 font-kalam">
                        <p class="w-72">Total</p>
                        <p class="pr-5">:</p>
                        <p class="w-full">{{ $dataCampaign->total }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
