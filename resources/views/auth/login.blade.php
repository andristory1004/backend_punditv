<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    @vite('resources/css/app.css', 'resources/js/chart.css')
</head>

<body class="bg-dark-a">
    <div class="flex items-center h-screen">
        <div
            class="flex items-center w-full h-screen md:w-2/3 lg:w-1/3 md:h-582 bg-gradient-to-b from-dark-blue to-black mx-auto px-5 rounded-xl shadow-2xl">
            <div class="w-full">

                <img src={{ asset('images/logoPunditv.png') }} alt="Logo Pundi TV" width="100" class="mx-auto ">
                <p class="text-lg font-acme text-white text-center">LogIn to Dashboard Pundi TV</p>
                <p class="text-sm text-gray-500 font-acme mb-5 text-center">Enter your email and passord below</p>

                @if (session()->has('loginError'))
                    <div class="bg-red-100 rounded-lg text-red py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert alert-dismissible"
                        role="alert">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                            class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                            </path>
                        </svg>
                        {{ session('loginError') }}
                    </div>
                @endif

                {{-- <form action={{ route('authenticate') }} method="POST"> --}}
                <form action={{ route('authenticate') }} method="POST">
                    @csrf
                    <div class="mb-6 form-group ">
                        <label for="email" class="form-label mb-2 text-white font-acme flex text-left">Email</label>
                        <input type="email"
                            class="form-control block w-full px-3 py-1.5 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                            id="email" name="email" placeholder="Input Price" />
                        @error('email')
                            <div class="text-red text-sm flex text-left mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 form-group">
                        <label for="password"
                            class="form-label mb-2 text-white font-acme flex text-left">Password</label>
                        <input type="password"
                            class="form-control block w-full px-3 py-1.5 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                            id="password" name="password" placeholder="Enter Password" />
                        @error('password')
                            <div class="text-red text-sm flex text-left mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between mb-6 text-sm md:text-base">
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded text-blue shadow-sm"
                                    name="remember">
                                <span class="ml-2 text-sm text-white font-acme">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        {{-- <div class="form-group form-check">
                            <input type="checkbox"
                                class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                                id="checkBox">
                            <label class="inline-block text-white form-check-label font-acme" for="checkBox">
                                Remind Me
                            </label>
                        </div> --}}
                        <a href="#!"
                            class="font-acme text-blue-600 transition duration-200 ease-in-out hover:text-blue-700 focus:text-blue-700">
                            Lupa Password..?
                        </a>
                    </div>
                    <button type="submit"
                        class="w-full px-6 py-2.5 bg-blue hover:bg-opacity-70 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-150 ease-in-out font-acme">
                        Masuk
                    </button>
                </form>
                <div class="flex items-center space-x-3 font-acme text-white justify-center mt-5">
                    <p>dont have an account..?</p>
                    <a href="" class="text-blue hover:text-opacity-70 transition ease-in-out">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
