<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIRETIL | @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
    @if ($isKetua == true)
        <nav class="absolute top-0 left-0 bottom-0 flex h-full w-[80px] flex-col gap-8 bg-blue-800 py-10">
            <a href="/ketua/" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'home')
                bg-orange-400
            @endif ">
                <i class="fa-solid fa-house"></i>
            </a>
            {{-- <a href="/ketua/search" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'search')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a> --}}
            <a href="/ketua/team" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'team')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-users"></i>
            </a>
            <a href="/ketua/profile" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'profile')
                bg-orange-400
            @endif">
                <i class="fa-sharp fa-solid fa-user"></i>
            </a>
            <a href="/ketua/notification" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'notification')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-bell"></i>
            </a>
            {{-- <a href="/ketua/notification" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'notification')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a> --}}
            <form action="/logout" method="post">
                @csrf
                {{-- <input type="hidden" > --}}
                <button type="submit" class="items-center justify-center w-full py-4 text-4xl text-white lex">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </nav>
    @else
        <nav class="absolute top-0 left-0 bottom-0 flex h-full w-[80px] flex-col gap-8 bg-blue-800 py-10">
            <a href="/" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'home')
                bg-orange-400
            @endif ">
                <i class="fa-solid fa-house"></i>
            </a>
            <a href="/search" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'search')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href="/team" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'team')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-users"></i>
            </a>
            <a href="/profile" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'profile')
                bg-orange-400
            @endif">
                <i class="fa-sharp fa-solid fa-user"></i>
            </a>
            <a href="/notification" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'notification')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-bell"></i>
            </a>
            {{-- <a href="/ketua/notification" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'notification')
                bg-orange-400
            @endif">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a> --}}
            <form action="/logout" method="post">
                @csrf
                {{-- <input type="hidden" > --}}
                <button type="submit" class="items-center justify-center w-full py-4 text-4xl text-white lex">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </nav>
    @endif
    {{-- <nav class="absolute top-0 left-0 bottom-0 flex h-full w-[80px] flex-col gap-8 bg-blue-800 py-10">
        <a href="/" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'home')
            bg-orange-400
        @endif ">
            <i class="fa-solid fa-house"></i>
        </a>
        <a href="/search" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'search')
            bg-orange-400
        @endif">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        <a href="/team" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'team')
            bg-orange-400
        @endif">
            <i class="fa-solid fa-users"></i>
        </a>
        <a href="/profile" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'profile')
            bg-orange-400
        @endif">
            <i class="fa-sharp fa-solid fa-user"></i>
        </a>
        <a href="/notification" class="flex w-full items-center justify-center text-4xl text-white py-4 @if ($page == 'notification')
            bg-orange-400
        @endif">
            <i class="fa-solid fa-bell"></i>
        </a>
    </nav> --}}
    <div class="mx-auto h-screen w-[1100px] py-10">
        <h1 class="text-2xl italic font-extrabold text-orange-400">SISTEM REKRUTMEN TIM LOMBA</h1>
        <h2 class="text-2xl italic font-bold text-blue-800">UNIVERSITAS BRAWIJAYA</h2>
        @yield('content')
    </div>
</body>

</html>
