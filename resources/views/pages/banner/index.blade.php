@extends('layouts.admin')

@section('title', 'Banner')
@section('main')
    <div class="w-full px-10 py-10">
        @if (session()->has('success'))
            <div class="flex items-center space-x-3 mb-3 text-base text-green-600 alert alert-dismissible fade show justify-start w-fit"
                role="alert">
                {{ session('success') }}
                <button type="button"
                    class="box-content w-4 h-4 p-1 ml-auto border-none rounded-none text-green-600 btn-close  hover:text-emerald-900 hover:opacity-75"
                    data-bs-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        <a href={{ route('banner.create') }}
            class="flex space-x-3 px-6 py-2 bg-blue hover:bg-opacity-70 rounded shadow-md hover:shadow-lg transition ease-in-out h-fit text-center text-white font-normal justify-center">
            <i class="fas fa-plus"></i>
            <span class="font-acme">
                Add Banner
            </span>
        </a>

        <table class="w-full text-white mt-10 border">
            <thead>
                <tr>
                    <th class="w-auto border-b border-r py-2">Num</th>
                    <th class="w-3/5 border-b border-r">Image</th>
                    <th>
                        </ <th class="w-1/4 border-b border-r" colspan="3">Action</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($data as $item)
                    <tr class="hover:bg-gray-300 hover:text-black">
                        <td class="border-b border-r text-center ">{{ $no++ }}</td>
                        <td class="border-b border-r px-3">{{ $item->banner }}</td>
                        {{-- <td> --}}
                        {{-- <img src="http://127.0.0.1:8000/{{ $item->banner }}" alt=""> --}}
                        {{-- <div class="bg-center bg-cover shadow-xl w-3/5 rounded-xl mx-auto"
                            style="background-image: url('http://127.0.0.1:8000/{{ $item->banner }}')">
                        </div> --}}
                        {{-- </td> --}}
                        <td
                            class="px-2 py-2 text-sm border-b border-r border-white hover:bg-green-300 group text-center hover:text-black">
                            <a href={{ route('banner.show', $item['id']) }}>
                                <div class="w-full h-full">
                                    <i class="fas fa-eye group-hover:scale-125"></i>
                                </div>
                            </a>
                        </td>
                        <td
                            class="px-2 py-2 text-sm border-b border-r border-white hover:bg-yellow-300 group text-center hover:text-black">
                            <a href={{ route('banner.edit', $item['id']) }}>
                                <div class="w-full h-full">
                                    <i class="fas fa-edit group-hover:scale-125"></i>
                                </div>
                            </a>
                        </td>
                        <td
                            class="px-2 py-2 text-sm border-b border-r border-white hover:bg-red-500 group text-center hover:text-black">
                            <form action={{ route('banner.destroy', $item['id']) }} method="POST">
                                @method('Delete')
                                @csrf
                                <button type="submit">
                                    <div class="w-full h-full">
                                        <i class="fas fa-trash group-hover:scale-125"></i>
                                    </div>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
