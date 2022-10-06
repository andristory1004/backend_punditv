@extends('layouts.admin')
@section('title', 'Admin Profile')
@section('main')
    <div class="flex items-center justify-center w-full h-screen px-5 py-5 -mt-16">
        <div class="px-5 pt-3 pb-5 shadow-2xl w-fit rounded-2xl">
            <div class="flex justify-start w-full mt-5 mb-5 text-center">
                <a href={{ route('admin.index') }}
                    class="flex items-center px-6 py-1 space-x-3 font-normal text-center text-white transition ease-in-out rounded shadow-md bg-red hover:bg-opacity-70 hover:shadow-lg h-fit w-fit font-acme">
                    <i class="fas fa-arrow-left"></i>
                    <span>
                        Back
                    </span>
                </a>
            </div>
            <div class="flex items-center">
                @if ($admin->picture == null)
                    <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" class="h-auto mx-auto w-72 rounded-xl"
                        alt="">
                @else
                    <div class="bg-center bg-cover shadow-xl w-72 h-72 rounded-xl"
                        style="background-image: url('http://127.0.0.1:8000/{{ $admin->picture }}')">
                    </div>
                @endif

                <table class="mx-5 mt-5 tracking-wide text-left text-white font-kalam">
                    <tr class="text-left">
                        <th class="w-32 py-2 font-kalam">Name</th>
                        <td class="w-3">:</td>
                        <td> {{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <th class="py-2">Email</th>
                        <td>:</td>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
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
                    <tr>
                        <th class="py-2">Created By</th>
                        <td>:</td>
                        <td>
                            @if ($admin->created_by == null)
                                -
                            @else
                                {{ $admin->created_by }}
                            @endif
                        </td>
                    </tr>
                    <tr>
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
                    <tr>
                        <th class="py-2">Created At</th>
                        <td>:</td>
                        <td>{{ $admin->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="py-2">Updated At</th>
                        <td>:</td>
                        <td>{{ $admin->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
