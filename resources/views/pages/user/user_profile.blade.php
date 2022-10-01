@extends('layouts.admin')
@section('title', 'UserProfile')
@section('main')
    <div class="w-full h-screen -mt-16 flex justify-center items-center px-5 py-5">
        <div class="bg-dark-a w-fit px-5 pb-5 pt-3 rounded-2xl">
            <div class="w-full flex justify-start text-center mt-5">
                <a href={{ route('admin.index') }}
                    class="flex space-x-3 px-6 py-1 bg-blue hover:bg-opacity-70 rounded shadow-md hover:shadow-lg transition ease-in-out mb-3 h-fit text-center w-fit text-white font-normal font-acme">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="flex items-center">
                @if ($user->picture == null)
                    <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="w-40 h-auto rounded-full mx-auto"
                        alt="">
                @else
                    <div class="w-72 h-72 bg-center bg-cover rounded-xl shadow-xl"
                        style="background-image: url('http://127.0.0.1:8000/{{ $user->picture }}')">
                    </div>
                @endif

                <table class="text-left mt-5 mx-5 text-white font-kalam tracking-wide">
                    <tr class="text-left">
                        <th class="w-32 font-kalam">Name</th>
                        <td class="w-3">:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    {{-- <tr>
                        <th class="">Status</th>
                        <td>:</td>
                        <td>
                            @if ($user->is_active == 0)
                                Inactive
                            @else
                                Active
                            @endif
                        </td>
                    </tr> --}}
                    <tr>
                        <th>Created At</th>
                        <td>:</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>:</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
