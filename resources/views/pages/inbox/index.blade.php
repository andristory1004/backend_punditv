@extends('layouts.admin')
@section('title', 'Inbox')
@section('main')
    <div class="w-full h-screen flex space-x-3 px-5 pb-5 -mt-16 pt-20">
        <div class="h-full w-60 bg-dark-a text-white">
            <div class="w-full h-10% bg-white">

            </div>
        </div>
        <div class="w-full h-full bg-dark-a text-white flex-row">
            <div class="h-10% w-full bg-white flex items-center space-x-3 px-5">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-full w-10" alt="Avatar" />
                <p class="font-acme text-black">M Thorik Sulaeman</p>
            </div>
            <div class="w-full h-4/5 bg-dark-a">

            </div>
            <div class="h-10% w-full bg-black px-5 py-2 flex items-center space-x-3">
                <img src="/icons/emoji.png" class="w-7 h-7" alt="">
                <img src="/icons/icon_file.png" class="w-7 h-7" alt="">
                <div class="w-full h-full bg-white rounded-full  flex items-center focus:border border-blue">
                    <input type="text" class="h-full w-full rounded-full text-black font-acme px-5">
                    <img src="/icons/icon_send.png" class="w-7 h-7 relative -ml-8" alt="">
                </div>
                <img src="/icons/icon_voice.png" class="w-7 h-7" alt="">
            </div>
        </div>
    </div>
@endsection
