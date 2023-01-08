<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"/>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
            </script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" > --}}
        <title>Find or post your Inquiry</title>
    </head>
    <body class="mb-48 " style="background-color: #F5F5F5">
        <main class="max-w-[70rem] mx-auto px-4">
            
            <nav class="flex justify-between items-center mb-4">
                <a href="/"
                ><img class="w-24" src="{{asset('images/uni-logo.png')}}" class="logo"/>
                </a>
                <div class="max-w-[900px] w-full">
                    @include('partials._search')

                </div>
            <ul class="flex space-x-6  text-lg">
                @auth
                <li>
                    <a href="/Posts/manage" class="hover:text-laravel"
                    ><i class="fa-solid fa-user"></i>
                    </a
                    >
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a
                    href="/Posts/create"
                    class="rounded-xl hover:rounded-none duration-300 right-10 bg-black text-white py-2 px-5">Post</a>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li> 
                <li>
                    <a href="/login" class="hover:text-laravel"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
        <main>
            {{$slot}}
        </main>
    <x-flash-message/>
</main>
</body>
</html>
