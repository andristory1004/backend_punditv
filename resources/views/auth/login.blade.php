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
            class="flex items-center w-full h-screen px-5 mx-auto shadow-2xl md:w-2/3 lg:w-1/3 md:h-582 bg-gradient-to-b from-dark-blue to-black rounded-xl">
            <div class="w-full">

                <img src={{ asset('images/logoPunditv.png') }} alt="Logo Pundi TV" width="100" class="mx-auto ">
                <p class="text-lg text-center text-white font-acme">LogIn to Dashboard Pundi TV</p>
                <p class="mb-5 text-sm text-center text-gray-500 font-acme">Enter your email and passord below</p>

                @if (session()->has('loginError'))
                    <div class="inline-flex items-center w-full px-6 py-5 mb-3 text-base text-red-700 bg-red-100 rounded-lg text-red alert alert-dismissible"
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
                        <label for="email" class="flex mb-2 text-left text-white form-label font-acme">Email</label>
                        <input type="email"
                            class="form-control block w-full px-3 py-1.5 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                            id="email" name="email" placeholder="Enter email" />
                        @error('email')
                            <div class="flex mt-2 text-sm text-left text-red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 form-group">
                        <label for="password"
                            class="flex mb-2 text-left text-white form-label font-acme">Password</label>
                        <input type="password"
                            class="form-control block w-full px-3 py-1.5 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none font-acme "
                            id="password" name="password" placeholder="Enter Password" />
                        @error('password')
                            <div class="flex mt-2 text-sm text-left text-red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between mb-6 text-sm md:text-base">
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded shadow-sm text-blue"
                                    name="remember">
                                <span class="ml-2 text-sm text-white font-acme">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <a href="#!"
                            class="text-blue-600 transition duration-200 ease-in-out font-acme hover:text-blue-700 focus:text-blue-700">
                            Lupa Password..?
                        </a>
                    </div>
                    <button type="submit"
                        class="w-full px-6 py-2.5 bg-blue hover:bg-opacity-70 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-150 ease-in-out font-acme">
                        Masuk
                    </button>
                </form>
                <div class="flex items-center justify-center mt-5 space-x-3 text-white font-acme">
                    <p>dont have an account..?</p>
                    <a href="" class="transition ease-in-out text-blue hover:text-opacity-70">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
