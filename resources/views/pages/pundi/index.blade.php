@extends('layouts/admin')
@section('title', 'Price')
@section('main')

    {{-- Campaign Price List --}}
    <div class="px-5 py-3 pb-12 bg-dark mx-5 my-5 overflow-auto rounded-t-3xl bg-dark-a">
        <div class="flex justify-between items-cente">
            {{-- <a href={{ route('add/campaign/price') }} --}}
            <a href=""
                class="flex space-x-3 px-6 py-2 bg-blue text-white rounded-full shadow-md hover:bg-opacity-70 hover:shadow-lg items-center transition duration-150 ease-in-out mt-5 font-acme text-center pointer-events-none">
                <i class="fas fa-plus"></i>
                <span class="font-acme">
                    Add Price
                </span>
            </a>
            <p class="text-white justify-items-center font-acme text-xl">Campaign Price List</p>
            <p></p>
        </div>
        <table class="w-screen text-white px-2 mt-5">
            <thead>
                <?php $no = 1; ?>
                <tr>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4 rounded-tl-3xl">No</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Type</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Price</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Discount</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">is_active</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Created By</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Updated By</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Created At</th>
                    <th class="w-auto border-b border-r px-2 bg-dark-blue py-4">Updated At</th>
                    <th class="w-auto border-b px-2 bg-dark-blue py-4 rounded-tr-3xl">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaignPrice as $item)
                    <tr class="text-center bg-white">
                        <td class="border-b border-r text-black border-black">
                            {{ $no++ }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $item->priceType->type }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            @rupiah($item->price)
                        </td>
                        <td class="border-b border-r text-black border-black">
                            @rupiah($item->sale)
                        </td>
                        <td class="border-b border-r text-black border-black">
                            @if ($item->is_active == 1)
                                Active
                            @else
                                Inactive
                            @endif
                            {{-- {{ $item->is_active }} --}}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $item->createdBy->name ?? $item->created_by }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $item->updatedBy->name ?? $item->updated_by }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $item->created_at }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $item->updated_at }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            <a href={{ route('campaign-price', $item->id) }}>
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Earn Price List --}}
    {{-- <div class="px-5 py-3 pb-12 bg-dark mx-5 my-5 overflow-auto rounded-t-3xl bg-dark-a">
        <div class="flex justify-between items-center">
            
            <a href=""
                class="flex space-x-3 px-6 py-2 bg-blue text-white rounded-full shadow-md hover:bg-opacity-70 hover:shadow-lg items-center transition duration-150 ease-in-out mt-5 font-acme text-center pointer-events-none ">
                <i class="fas fa-plus"></i>
                <span class="font-acme">
                    Add Price
                </span>
            </a>
            <p class="text-white justify-items-center font-acme text-xl">Earn Price List</p>
            <p></p>
        </div>
        <table class="w-screen text-white px-2 mt-5">
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
                        <td class="border-b border-r text-black border-black">
                            {{ $no++ }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $earnPrice->priceType->type }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            @rupiah($earnPrice->price)
                        </td>
                        <td class="border-b border-r text-black border-black">
                            @rupiah($earnPrice->sale)
                        </td>
                        <td class="border-b border-r text-black border-black">
                            @if ($earnPrice->is_active == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td class="border-b border-r px-2 text-black border-black">
                            {{ $earnPrice->createdBy->name ?? $item->created_by }}
                        </td>
                        <td class="border-b border-r px-2 text-black border-black">
                            {{ $earnPrice->updatedBy->name ?? $item->updated_by }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $earnPrice->created_at }}
                        </td>
                        <td class="border-b border-r text-black border-black">
                            {{ $earnPrice->updated_at }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r border-black hover:bg-green-300 group text-black">
                            <a href="">
                                <div class="w-full h-full">
                                    <i class="fas fa-edit group-hover:scale-125"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@endsection
