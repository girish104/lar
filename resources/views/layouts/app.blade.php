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

    @yield('styles')
</head>

<<<<<<< HEAD
<body
    class="container text-white mx-auto mt-10 mb-10 max-w-lg bg-slate-100relative bg-cover bg-center bg-no-repeat bg-fixed"
    style="background-image: url('/images/list.jpg')">
    <div class="absolute inset-0 bg-black opacity-80"></div>

    <div class="relative z-10 p-4 mx-auto mt-8 max-w-md bg-black rounded-lg bg-opacity-10 shadow-2xl">
        <h1 class="text-2xl mb-6">
            @yield('title')
        </h1>

        <div x-data="{ flash: true }">
            @if (session()->has('success'))
                <div x-show = "flash"
                    class=" relative mb-10 rounded border border-green-500 bg-green-100 px-4 py-3 text-green-700 text-lg"
                    role="alert">
                    <Strong class="font-bold">Success!</Strong>
                    <div>{{ session('success') }}</div>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif
            @yield('content')
        </div>
=======
<body class="container mx-auto mt-10 mb-10 max-w-lg bg-slate-100">
    <h1 class="text-2xl mb-6">
        @yield('title')
    </h1>

    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show = "flash"
                class=" relative mb-10 rounded border border-green-500 bg-green-100 px-4 py-3 text-green-700 text-lg"
                role="alert">
                <Strong class="font-bold">Success!</Strong>
                <div>{{ session('success') }}</div>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
        @yield('content')
>>>>>>> 3660a8a23d87c7d8f96ddf7c0b4ff4f3712fc877
    </div>
</body>

</html>
