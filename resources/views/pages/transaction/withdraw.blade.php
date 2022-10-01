@extends('layouts.admin')
@section('title', 'Transaction')
@section('main')
    <div class="text-white justify-center px-5 py-5">
        <div class="flex mt-5 text-white font-medium font-acme space-x-5 text-xs items-center mb-5">
            <a href=""
                class="flex space-x-3 px-6 py-2.5 bg-gray-500 hover:bg-opacity-70 uppercase rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-150 ease-in-out h-fit text-center w-fit items-center pointer-events-none">
                <i class="fas fa-eye"></i>
                <span class="font-acme">
                    Withdraw Transaction
                </span>
            </a>
            <a href=""
                class="flex space-x-3 px-6 py-2.5 bg-blue hover:bg-opacity-70 uppercase rounded shadow-md hover:shadow-lg active:shadow-lg transition duration-150 ease-in-out h-fit text-center w-fit items-center">
                <i class="fas fa-eye"></i>
                <span class="font-acme">
                    Top Up Transaction
                </span>
            </a>
            <div class=" xl:w-96">
                <div class="input-group relative flex flex-wrap items-stretch w-full">
                    <input type="search"
                        class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <div
                        class=" bg-blue text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-opacity-70 hover:shadow-lg transition duration-150 ease-in-out flex items-center"">
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

        <table class="justify-center">
            <thead>
                <tr class="border bg-dark-a">
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white">
                        Num
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white w-64">
                        Name
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white 52">
                        Pundi Ballance
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white w-52">
                        Withdraw Amount
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-r border-white w-52">
                        Status
                    </th>
                    <th scope="col" class="px-2 py-2 text-sm font-medium text-white border-white rounded-tr-3xl">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <tr class="text-white hover:bg-slate-300 hover:text-black border">
                    <td class="px-2 py-2 text-sm border-b border-r text-center">{{ $no++ }}</td>
                    <td class="px-2 py-2 text-sm border-b border-r ">Andri</td>
                    <td class="px-2 py-2 text-sm border-b border-r ">Rp. 200.000</td>
                    <td class="px-2 py-2 text-sm border-b border-r ">Rp. 50.000</td>
                    <td class="px-2 py-2 text-sm border-b border-r text-center">Expire</td>
                    <td class=" text-sm border-b border-r hover:bg-green-500 group text-center">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div class="w-full h-full px-2 py-2">
                                <i class="fas fa-eye group-hover:scale-125"></i>
                            </div>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
