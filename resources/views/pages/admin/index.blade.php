@extends('layouts/admin')

@section('title', 'Admin Data')

@section('main')
    <div class="w-full px-5 py-5">
        <div class="bg-dark-a px-5 py-5 rounded-2xl">
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
            <div class="flex mt-5 text-white font-medium font-acme space-x-5 text-xs items-center mb-5">
                <a href={{ route('admin.create') }}
                    class="flex space-x-3 px-6 py-2 bg-blue hover:bg-opacity-70 rounded shadow-md hover:shadow-lg transition ease-in-out h-fit text-center text-white font-normal ">
                    <i class="fas fa-plus"></i>
                    <span class="font-acme">
                        Add Admin
                    </span>
                </a>
                <div class=" xl:w-96">
                    <div class="input-group relative flex flex-wrap items-stretch w-full">
                        <input type="search"
                            class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-l transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <div
                            class=" bg-blue text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-opacity-70 hover:shadow-lg transition duration-150 ease-in-out flex items-center"">
                            <button type="button" id="button-addon2" class="px-6 py-2.5">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
                                    class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="text-center">
                <?php
                $no = 1;
                ?>
                <thead class="border border-white">
                    <tr>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Num
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Name
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Email
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Status
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Created By
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Updated By
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r">
                            Created At
                        </th>
                        <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r-2">
                            Updated At
                        </th>
                        <th scope="col" colspan="3" class="px-2 py-2 text-sm font-medium text-white">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="border border-white text-white">
                    @foreach ($data as $admin)
                        <tr class=" hover:bg-slate-300 hover:text-black">
                            <td class="px-2 py-2 text-sm border-b border-r border-white">
                                {{ $no++ }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white text-left">
                                {{ $admin['name'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white">
                                {{ $admin['email'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white">
                                @if ($admin['is_active'] == 0)
                                    Inactive
                                @else
                                    Active
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white text-left">
                                @if ($admin->created_by == null)
                                    -
                                @else
                                    {{ $admin->created_by }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white text-left">
                                @if ($admin->updated_by == null)
                                    -
                                @else
                                    {{ $admin->updated_by }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white">
                                {{ $admin['created_at'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white">
                                {{ $admin['updated_at'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white hover:bg-green-300 group">
                                <a href={{ route('admin.show', $admin['id']) }}>
                                    <div class="w-full h-full">
                                        <i class="fas fa-eye group-hover:scale-125"></i>
                                    </div>
                                </a>
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white hover:bg-yellow-300 group">
                                <a href={{ route('admin.edit', $admin['id']) }}>
                                    <div class="w-full h-full">
                                        <i class="fas fa-edit group-hover:scale-125"></i>
                                    </div>
                                </a>
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r border-white hover:bg-red-500 group">
                                <form action={{ route('admin.destroy', $admin['id']) }} method="POST">
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
    </div>
@endsection
