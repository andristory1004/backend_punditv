@extends('layouts/admin')
@section('title', 'Price')
@section('main')
    {{-- Campaign Price List --}}
    <div class="px-5 py-3 pb-12 mx-5 my-5 overflow-auto bg-dark rounded-t-3xl bg-dark-a">
        @if (session()->has('success'))
            <div class="flex items-center justify-start mb-3 space-x-3 text-base text-green-600 alert alert-dismissible fade show w-fit"
                role="alert">
                {{ session('success') }}
                <button type="button"
                    class="box-content w-4 h-4 p-1 ml-auto text-green-600 border-none rounded-none btn-close hover:text-emerald-900 hover:opacity-75"
                    data-bs-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="flex justify-between items-cente">
            {{-- <a href={{ route('add/campaign/price') }} --}}
            <a href=""
                class="flex items-center px-6 py-2 mt-5 space-x-3 text-center text-white transition duration-150 ease-in-out rounded-full shadow-md pointer-events-none bg-blue hover:bg-opacity-70 hover:shadow-lg font-acme">
                <i class="fas fa-plus"></i>
                <span class="font-acme">
                    Add Price
                </span>
            </a>
            <p class="text-xl text-white justify-items-center font-acme">Campaign Price List</p>
            <p></p>
        </div>
        <table class="w-screen px-2 mt-5 text-white">
            <thead>
                <?php $no = 1; ?>
                <tr>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue rounded-tl-3xl">No</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Type</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Price</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Discount</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">is_active</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Created By</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Updated By</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Created At</th>
                    <th class="w-auto px-2 py-4 border-b border-r bg-dark-blue">Updated At</th>
                    <th class="w-auto px-2 py-4 border-b bg-dark-blue rounded-tr-3xl">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaignPrice as $item)
                    <tr class="text-center bg-white">
                        <td class="text-black border-b border-r border-black">
                            {{ $no++ }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            {{ $item->priceType->type }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @rupiah($item->price)
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @rupiah($item->sale)
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @if ($item->is_active == 1)
                                Active
                            @else
                                Inactive
                            @endif
                            {{-- {{ $item->is_active }} --}}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @if ($item->created_by == null)
                                -
                            @else
                                {{ $item->created_by }}
                            @endif
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @if ($item->updated_by == null)
                                -
                            @else
                                {{ $item->user }}
                            @endif
                        </td>
                        <td class="text-black border-b border-r border-black">
                            {{ $item->created_at }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            {{ $item->updated_at }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            <a href={{ route('campaign-price.edit', $item->id) }}>
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Earn Price List --}}
    <div class="px-5 py-3 pb-12 mx-5 my-5 overflow-auto bg-dark rounded-t-3xl bg-dark-a">
        <div class="flex items-center justify-between">

            <a href=""
                class="flex items-center px-6 py-2 mt-5 space-x-3 text-center text-white transition duration-150 ease-in-out rounded-full shadow-md pointer-events-none bg-blue hover:bg-opacity-70 hover:shadow-lg font-acme ">
                <i class="fas fa-plus"></i>
                <span class="font-acme">
                    Add Price
                </span>
            </a>
            <p class="text-xl text-white justify-items-center font-acme">Earn Price List</p>
            <p></p>
        </div>
        <table class="w-screen px-2 mt-5 text-white">
            <thead>
                <?php $no = 1; ?>
                <tr>
                    <th scope="col"
                        class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue rounded-tl-3xl">
                        No</th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Type</th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Price</th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Discount
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">is_active
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Created By
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Updated By
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Created At
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r bg-dark-blue">Updated At
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white bg-dark-blue rounded-tr-3xl">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($earnPrice as $earnPrice)
                    <tr class="text-center bg-white hover:bg-slate-300">
                        <td class="text-black border-b border-r border-black">
                            {{ $no++ }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            {{ $earnPrice->priceType->type }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @rupiah($earnPrice->price)
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @rupiah($earnPrice->sale)
                        </td>
                        <td class="text-black border-b border-r border-black">
                            @if ($earnPrice->is_active == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td class="px-2 text-black border-b border-r border-black">
                            {{ $earnPrice->createdBy->name ?? $item->created_by }}
                        </td>
                        <td class="px-2 text-black border-b border-r border-black">
                            {{ $earnPrice->updatedBy->name ?? $item->updated_by }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            {{ $earnPrice->created_at }}
                        </td>
                        <td class="text-black border-b border-r border-black">
                            {{ $earnPrice->updated_at }}
                        </td>
                        <td class="px-2 py-2 text-sm text-black border-b border-r border-black hover:bg-green-300 group">
                            <a href={{ route('earn-price.edit', $earnPrice->id) }}>
                                <div class="w-full h-full">
                                    <i class="fas fa-edit group-hover:scale-125"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
