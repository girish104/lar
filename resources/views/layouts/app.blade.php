<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Task Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-white hover:text-black
        }

        .link {
            @apply font-medium text-white underline decoration-red-500  
        }

        label {
            @apply block uppercase text-white mb-2
        }

        input , textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error-message {
            @apply text-red-500 text-sm
        }

    </style>
    {{-- blade-formatter-enable --}}

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/images/list.jpg');
            background-size: cover;
        }
    </style>
</head>


<body class="container text-white mx-auto mt-10 mb-10 max-w-lg bg-slate-600 ">

    <!-- Authentication Links -->
    <div class="flex justify-end space-x-4">
        @guest
            <a href="{{ route('login') }}" class="link">Login</a>
            <a href="{{ route('register') }}" class="link">Register</a>
        @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="link">Logout</button>
            </form>
        @endguest
    </div>


    <div class="relative p-4 mx-auto mt-8 max-w-md bg-cover bg-center bg-no-repeat rounded-lg bg-fixed">

        {{-- <div class="absolute inset-0 bg-black opacity-70 rounded-lg z-0"></div> --}}

        <div class="relative z-10">

            <h1 class="text-2xl mb-6">
                @yield('title')
            </h1>

            <div x-data="{ flash: true }">
                @if (session()->has('success'))
                    <div x-show="flash"
                        class="relative mb-10 rounded border border-green-500 bg-green-100 px-4 py-3 text-green-700 text-lg"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <div>{{ session('success') }}</div>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" @click="flash = false" stroke="currentColor"
                                class="h-6 w-6 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
