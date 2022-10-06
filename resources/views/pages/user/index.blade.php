@extends('layouts/admin')

@section('title', 'User Data')

@section('main')
    <div class="w-full px-5 py-5">
        <div class="px-5 py-5 bg-dark rounded-2xl">
            <table class="min-w-full text-center">
                <thead class="border border-white">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r" rowspan="2">
                            Num
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r" rowspan="2">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r" rowspan="2">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r" rowspan="2">
                            Referral Code
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r" rowspan="2">
                            User Referrer
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-b border-r"
                            colspan="2">
                            Referrenced
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white" rowspan="2">
                            Action
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r">
                            User 1
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white border-r">
                            User 2
                        </th>
                    </tr>
                </thead class="border-b">
                <tbody>

                    <?php $no = 1; ?>
                    @foreach ($data as $user)
                        <tr class="text-white border border-white  hover:bg-slate-300 hover:text-black">
                            <td class="px-2 py-2 text-sm border-b border-r ">{{ $no++ }}</td>
                            <td class="px-2 py-2 text-sm text-left border-b border-r">
                                {{ $user['name'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                {{ $user['email'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                {{ $user['referral']->referral_code }}
                            </td>
                            <td class="px-2 py-2 text-sm text-left border-b border-r">
                                @if ($user['referral']->referrer == null)
                                    -
                                @else
                                    {{ $user['referral']->referrer }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                @if ($user['referral']->referrenced_1 == null)
                                    -
                                @else
                                    {{ $user['referral']->referrenced_1 }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                @if ($user['referral']->referrenced_2 == null)
                                    -
                                @else
                                    {{ $user['referral']->referrenced_2 }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r hover:bg-green-300 group">
                                <a href={{ route('user.show', $user['id']) }}>
                                    <div class="w-full h-full">
                                        <i class="fas fa-eye group-hover:scale-125"></i>
                                    </div>
                                </a>
                            </td>
                        </tr class="bg-white border-b">
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
