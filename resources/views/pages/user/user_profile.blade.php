@extends('layouts.admin')
@section('title', 'User Profile')
@section('main')
    <div class="flex items-center justify-center w-full h-screen px-5 py-5 -mt-16">
        <div class="px-5 pt-3 pb-5 shadow-lg w-fit rounded-2xl ">
            <div class="flex justify-start w-full mt-5 mb-5 text-center">
                <a href={{ route('user.index') }}
                    class="flex items-center px-6 py-1 space-x-3 font-normal text-center text-white transition ease-in-out rounded shadow-md bg-red hover:bg-opacity-70 hover:shadow-lg h-fit w-fit font-acme">
                    <i class="fas fa-arrow-left"></i>
                    <span>
                        Back
                    </span>
                </a>
            </div>
            <div class="flex items-center">
                @if ($user->picture == null)
                    <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="w-40 h-auto mx-auto rounded-full"
                        alt="">
                @else
                    <div class="bg-center bg-cover shadow-xl w-72 h-72 rounded-xl"
                        style="background-image: url('http://127.0.0.1:8000/{{ $user->picture }}')">
                    </div>
                @endif

                <table class="mx-5 mt-5 tracking-wide text-left text-white font-kalam">
                    <tr class="text-left">
                        <th class="w-32 py-2 font-kalam">Name</th>
                        <td class="w-3">:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="py-2">Email</th>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="py-2">Referral Code</th>
                        <td>:</td>
                        <td>{{ $user->referral->referral_code }}</td>
                    </tr>
                    <tr>
                        <th class="py-2">Referrer</th>
                        <td>:</td>
                        @if ($user->referral->referrer == null)
                            <td>-</td>
                        @else
                            <td>{{ $user->referral->referrer }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th class="py-2">Referrenced 1</th>
                        <td>:</td>
                        @if ($user->referral->referrenced_1 == null)
                            <td>-</td>
                        @else
                            <td>{{ $user->referral->referrenced_1 }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th class="py-2">Referrenced 2</th>
                        <td>:</td>
                        @if ($user->referral->referrenced_1 == null)
                            <td>-</td>
                        @else
                            <td>{{ $user->referral->referrenced_2 }}</td>
                        @endif

                    </tr>
                    <tr>
                        <th class="py-2">Created At</th>
                        <td>:</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="py-2">Updated At</th>
                        <td>:</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
