@extends('layouts.admin')
@section('title', 'Admin Profile')
@section('main')
    <div class="flex items-center justify-center w-full h-screen md:px-5 py-5 -mt-16">
        <div class="px-3 md:px-5 pt-3 pb-5 md:shadow-2xl w-fit rounded-2xl">
            <div class="hidden md:flex justify-start w-full mt-5 mb-5 text-center pt-20 md:pt-0">
                <a href={{ route('admin.index') }}
                    class="flex items-center px-6 py-1 space-x-3 font-normal text-center text-white transition ease-in-out rounded shadow-md bg-red hover:bg-opacity-70 hover:shadow-lg h-fit w-fit font-acme">
                    <i class="fas fa-arrow-left"></i>
                    <span>
                        Back
                    </span>
                </a>
            </div>
            <div class="md:flex items-center">
                @if ($admin->picture == null)
                    <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="h-auto mx-auto w-72 rounded-xl"
                        alt="">
                @else
                    <div class="bg-center bg-cover shadow-xl md:w-72 md:h-72 w-60 h-60 rounded-xl mx-auto"
                        style="background-image: url('http://127.0.0.1:8000/{{ $admin->picture }}')">
                    </div>
                @endif
                <table class="md:mx-5 mt-5 text-left text-white font-kalam">
                    <tr class="text-left text-sm">
                        <th class="py-2 font-kalam">Name</th>
                        <td class="w-3">:</td>
                        <td> {{ $admin->name }}</td>
                    </tr>
                    <tr class="text-sm">
                        <th class="py-2">Email</th>
                        <td>:</td>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr class="text-sm">
                        <th class="py-2">Status</th>
                        <td>:</td>
                        <td>
                            @if ($admin->is_active == 0)
                                Inactive
                            @else
                                Active
                            @endif
                        </td>
                    </tr>
                    <tr class="text-sm">
                        <th class="py-2 w-48">Created By</th>
                        <td>:</td>
                        <td>
                            @if ($admin->created_by == null)
                                -
                            @else
                                {{ $admin->created_by }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-sm">
                        <th class="py-2">Updated By</th>
                        <td>:</td>
                        <td>
                            @if ($admin->updated_by == null)
                                -
                            @else
                                {{ $admin->updated_by }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-sm">
                        <th class="py-2">Created At</th>
                        <td>:</td>
                        <td>{{ $admin->created_at }}</td>
                    </tr>
                    <tr class="text-sm">
                        <th class="py-2">Updated At</th>
                        <td>:</td>
                        <td>{{ $admin->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
