<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @vite('resources/css/app.css', 'resources/js/chart.css')

    {{-- Tailwind Element --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">

    {{-- Chart JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

</head>

<body class="bg-dark-blue">
    <div class="flex">
        <aside class="relative hidden h-screen overflow-auto lg:block bg-dark-a w-60">

            <div class="flex justify-center px-6 pt-6 pb-2 text-center">
                <img src={{ asset('images/logoPunditv.png') }} width="75" alt="Logo Pundi TV">
            </div>

            <div class="h-1 mx-5 mb-5 bg-white rounded-full"></div>

            <nav class="mb-4 font-bold text-white text-16pt">
                <a href={{ route('dashboard') }}
                    class="{{ request()->is('dashboard') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                    <i class="mr-3 fas fa-tachometer-alt"></i>
                    <span class="font-bold text-white">
                        Dashboard
                    </span>
                </a>
                @auth
                    @if (auth('sanctum')->user()->role_id == 2)
                        <a href={{ route('admin.index') }}
                            class="{{ request()->is('admin', 'admin/create') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                            <img src={{ asset('icons/icon_admin.png') }} alt="Icon Advertise" width="25px">
                            <span class="font-bold text-white">
                                Admin Data
                            </span>
                        </a>
                    @endif
                @endauth

                <a href={{ route('user.index') }}
                    class="{{ request()->is('user') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                    <img src={{ asset('icons/icon_user.png') }} alt="Icon Advertise" width="25px">
                    <span class="font-bold text-white">
                        User Data
                    </span>
                </a>
                <a href={{ route('campaign') }}
                    class="{{ request()->is('campaign') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                    <img src={{ asset('icons/icon_campaign.png') }} alt="Icon Advertise" width="25px">
                    <span class="font-bold text-white">
                        Campaign
                    </span>
                </a>
                @auth
                    @if (auth('sanctum')->user()->role_id == 2)
                        <a href={{ route('price-list') }}
                            class="{{ request()->is('price-list', 'campaign-price', 'campaign-price/create') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                            <img src={{ asset('icons/icon_pundi.png') }} alt="Icon Advertise" width="25px">
                            <span class="font-bold text-white">
                                Price
                            </span>
                        </a>
                    @else
                    @endif

                @endauth

                <a href={{ route('advertise.index') }}
                    class="{{ request()->is('advertise') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                    <img src={{ asset('icons/icon_advertise.png') }} alt="Icon Advertise" width="25px">
                    <span class="font-bold text-white">
                        Advertise
                    </span>
                </a>
                <a href={{ route('transaction.index') }}
                    class="{{ request()->is('transaction') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                    <img src={{ asset('icons/icon_transaction.png') }} alt="Icon Advertise" width="25px">
                    <span class="font-bold text-white">
                        Transaction
                    </span>
                </a>
                <a href={{ route('inbox.index') }}
                    class="{{ request()->is('inbox') ? 'bg-dark-blue rounded-l-full' : '' }} flex items-center pl-4 nav-item ml-3 hover:bg-dark-blue hover:rounded-l-full my-2 h-11 space-x-3 hover:no-underline">
                    <img src={{ asset('icons/icon_inbox.png') }} alt="Icon Advertise" width="25px">
                    <span class="font-bold text-white">
                        Inbox
                    </span>
                </a>
            </nav>
        </aside>

        <div class="flex flex-col w-full h-screen overflow-y-hidden">
            <!-- Desktop Header -->
            <header class="hidden lg:block">
                {{-- Navbar Desktop --}}
                <div class="flex items-center justify-between w-full py-2 pr-14 bg-dark-a">
                    <div></div>

                    <h1 class="text-3xl text-white font-acme">Pundi TV Officials</h1>

                    @auth
                        <div class="relative dropdown">
                            <button
                                class="flex items-center text-xs font-medium leading-tight text-white uppercase transition duration-150 ease-in-out group "
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="relative px-1 py-1 rounded-full group-hover:bg-blue group-active:bg-blue">
                                    @if (auth('sanctum')->user()->picture == null)
                                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-full w-10"
                                            alt="Avatar" />
                                    @else
                                        <div class="w-10 h-10 bg-center bg-cover rounded-full"
                                            style="background-image: url('{{ auth('sanctum')->user()->picture }}')">
                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="flex items-center pl-5 py-2 -ml-3 space-x-3 rounded-r-full group-hover:bg-blue pr-3 group-active:bg-blue">
                                    <p class="font-acme">
                                        {{ auth('sanctum')->user()->name }}
                                    </p>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </button>
                            <ul class="absolute z-50 hidden float-left w-full py-2 m-0 mt-1 text-base text-left list-none border-none rounded-lg shadow-lg bg-blue dropdown-menu min-w-max bg-clip-padding"
                                aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a href="#"
                                        class="block w-full px-4 py-2 text-sm font-bold dropdown-item whitespace-nowrap hover:bg-gray-100 hover:text-black text-white">
                                        Account
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block w-full px-4 py-2 text-sm font-bold text-white dropdown-item whitespace-nowrap hover:bg-gray-100 hover:text-black">
                                        Support
                                    </a>
                                </li>
                                <li>
                                    <a href={{ route('logout') }}
                                        class="block w-full px-4 py-2 text-sm font-bold text-white dropdown-item whitespace-nowrap hover:bg-gray-100 hover:text-black">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </header>

            <!-- Mobile Header & Nav -->
            <header class="w-full py-5 bg-blue lg:hidden">
                <div class="flex items-center justify-between px-6">
                    <a href="index.html"
                        class="hidden text-3xl text-white hover:text-gray-300 font-lobster sm:block">Sistem Pemenangan
                        Pemilu</a>
                    <a href="index.html"
                        class="text-3xl font-semibold text-white uppercase md:hidden hover:text-gray-300 sm:hidden">SIMPEL</a>
                    <button id="menu-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample"
                        class="text-3xl text-white focus:outline-none">
                        <i id="menu-open" class="menu-open fas fa-bars"></i>
                        <i id="menu-close" class="hidden menu-close fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <div class="overflow-auto scroll-smooth">
                    <nav class="flex flex-col max-h-screen px-6 pt-4 collapse" id="collapseExample">
                        <a href=""
                            class="{{ request()->is('dashboard') ? 'opacity-100 font-bold' : '' }} flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 hover:font-bold nav-item">
                            <i class="mr-3 fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                        <a href=""
                            class="{{ request()->is('tps') ? 'opacity-100 font-bold' : '' }} flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 hover:font-bold nav-item">
                            <i class="mr-3 fas fa-table"></i>
                            Data TPS
                        </a>
                        <a href=""
                            class="{{ request()->is('paslon') ? 'opacity-100 font-bold' : '' }} flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 hover:font-bold nav-item">
                            <i class="mr-3 fas fa-user-tie"></i>
                            Pasangan Calon
                        </a>
                        <a href="#"
                            class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 hover:font-bold nav-item">
                            <i class="mr-3 fas fa-user"></i>
                            Setting
                        </a>
                        <a href="#"
                            class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 hover:font-bold nav-item">
                            <i class="mr-3 fas fa-sign-out-alt"></i>
                            Sign Out
                        </a>
                        <button
                            class="flex items-center justify-center w-full py-2 mt-3 font-semibold bg-white rounded-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
                            <i class="mr-3 fas fa-arrow-circle-up"></i> Upgrade to Pro!
                        </button>
                    </nav>
                </div>
            </header>

            <div class="flex flex-col w-full overflow-auto">
                <main class="flex-grow w-full h-full pb-5">
                    @yield('main')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
