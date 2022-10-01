@extends('layouts/admin')

@section('title', 'User Data')

@section('main')
    <div class="w-full px-5 py-5">
        <div class="bg-dark px-5 py-5 rounded-2xl">
            <table class="min-w-full text-center">
                <thead class="border border-white">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-medium border-r text-white" rowspan="2">
                            Num
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium border-r text-white" rowspan="2">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm border-r font-medium text-white" rowspan="2">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-4 border-r text-sm font-medium text-white" rowspan="2">
                            Referral Code
                        </th>
                        <th scope="col" class="px-6 py-4 border-r text-sm font-medium text-white" rowspan="2">
                            User Referrer
                        </th>
                        <th scope="col" class="px-6 py-4 border-r text-sm font-medium text-white border-b"
                            colspan="2">
                            Referrenced
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white" rowspan="2">
                            Action
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-4 border-r text-sm font-medium text-white">
                            User 1
                        </th>
                        <th scope="col" class="px-6 py-4 border-r text-sm font-medium text-white">
                            User 2
                        </th>
                    </tr>
                </thead class="border-b">
                <tbody>

                    <?php $no = 1; ?>
                    @foreach ($data as $user)
                        <tr class=" hover:bg-slate-300 border border-white text-white hover:text-black">
                            <td class="px-2 py-2 text-sm border-b border-r ">{{ $no++ }}</td>
                            <td class="px-2 py-2 text-sm border-b border-r text-left">
                                {{ $user['name'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                {{ $user['email'] }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                {{ $user['referralId']->referral_code }}
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r text-left">
                                @if ($user['referralId']->referrer == null)
                                    -
                                @else
                                    {{ $user['referralId']->referrer }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                @if ($user['referralId']->referrenced_1 == null)
                                    -
                                @else
                                    {{ $user['referralId']->referrenced_1 }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r ">
                                @if ($user['referralId']->referrenced_2 == null)
                                    -
                                @else
                                    {{ $user['referralId']->referrenced_2 }}
                                @endif
                            </td>
                            <td class="px-2 py-2 text-sm border-b border-r  hover:bg-green-300 group">
                                <a href={{ route('user.show', $user['id']) }} data-bs-toggle="modal"
                                    data-bs-target="#userProfile">
                                    <div class="w-full h-full">
                                        <i class="fas fa-eye group-hover:scale-125"></i>
                                    </div>
                                </a>
                                {{-- <button class="transition duration-200 ease-in-out hover:text-blue" type="button"
                                    id="btnView" data-bs-target="#userProfile" data-bs-toggle="modal"
                                    data-name={{ $user['name'] }} data-email={{ $user['email'] }}
                                    data-no={{ $paslon->no_urut }}>
                                    <i class="fas fa-eye group-hover:scale-125"></i>
                                </button> --}}
                            </td>
                        </tr class="bg-white border-b">
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- User Profile --}}
    {{-- @include('pages.user.user_profile') --}}

    {{-- <script>
        $(document).on('click', '#showModal', function() {
            $('#modalPaslon').modal('show');
        });

        $(document).on('click', '#btnEdit', function() {
            let name = $(this).data('ketua');
            let email = $(this).data('wakil');
            let referralCode = $(this).data('no');

            $('#editNamaKetua').val(nama_ketua);
            $('#editNamaWakil').val(nama_wakil);
            $('#editNoUrut').val(no_urut);
        }) --}}
    </script>
@endsection
