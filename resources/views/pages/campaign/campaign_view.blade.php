@extends('layouts.admin')

@section('title', 'Campaign View')
@section('main')
    <div class="w-full px-10 py-3 pb-12 rounded-t-3xl">
        <div class="flex items-center space-x-3 text-white font acme">
            <p class="text-base">Campaign Amount = </p>
            <p class="flex items-center space-x-3 text-xl font-acme">
                <span>{{ $jumlahCampaign }}</span>
                <span class="tracking-wide">Campaign</span>
            </p>
        </div>
        <div class="flex items-center mt-5 mb-5 space-x-5 text-xs font-medium text-white font-acme">

            {{-- Button --}}
            <a href={{ route('campaign.index') }}
                class="flex space-x-3 px-6 py-2.5 bg-blue hover:bg-opacity-70 uppercase rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-150 ease-in-out h-fit text-center w-fit items-center">
                <i class="fas fa-eye"></i>
                <span class="font-acme">
                    All Campaign
                </span>
            </a>
            <p class="flex space-x-3 px-6 py-2.5 bg-gray-300 uppercase rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-150 text-black ease-in-out h-fit text-center w-fit items-center disabled:bg-dark-a"
                disable>
                <i class="fas fa-eye"></i>
                <span class="font-acme">
                    Campaign View
                </span>
            </p>
            <a href={{ route('campaign.subscribe') }}
                class="flex space-x-3 px-6 py-2.5 bg-blue hover:bg-opacity-70 uppercase rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-150 ease-in-out h-fit text-center w-fit items-center">
                <i class="fas fa-eye"></i>
                <span class="font-acme">
                    Campaign Subscribe
                </span>
            </a>
            {{-- End Button --}}

            <div class=" xl:w-96">
                <div class="relative flex flex-wrap items-stretch w-full input-group">
                    <input type="search"
                        class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <div
                        class="flex items-center text-xs font-medium leading-tight text-white uppercase transition duration-150 ease-in-out rounded shadow-md bg-blue hover:bg-opacity-70 hover:shadow-lg"">
                        <button type="button" id="button-addon2" class="px-6 py-2.5">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="w-screen text-center bg-dark">
            <thead class="">
                <tr class="border bg-dark-a">
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r rounded-tl-3xl ">
                        Action
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white ">
                        Num
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white w-80">
                        Name
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Campaign Category
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Link
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Current View
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Current Subscribe
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Watch Time
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Number Of subscribe
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r border-white">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-white rounded-tr-3xl">
                        Total
                    </th>
                </tr>
            </thead class="border-b">
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($dataCampaign as $item)
                    <tr class="text-white border hover:bg-slate-300 hover:text-black">
                        <td class="text-sm border-b border-r hover:bg-green-500 group">
                            <a href={{route('campaign.show', $item->id)}}>
                                <div class="w-full h-full px-2 py-2">
                                    <i class="fas fa-eye group-hover:scale-125"></i>
                                </div>
                            </a>
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">{{ $no++ }}</td>
                        <td class="px-2 py-2 text-sm text-left border-b border-r">
                            {{ $item->user->name }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            {{ $item->campaignCategory->category }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            {{ $item->link }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            {{ $item->current_view }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            {{ $item->current_subscribe }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            @if ($item->watch_time == null)
                                -
                            @else
                                {{ $item->watch_time }}
                            @endif
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            @if ($item->number_of_subscribe == null)
                                -
                            @else
                                {{ $item->number_of_subscribe }}
                            @endif
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            {{ $item->price }}
                        </td>
                        <td class="px-2 py-2 text-sm border-b border-r ">
                            {{ $item->total }}
                        </td>
                    </tr class="bg-white border-b">
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
