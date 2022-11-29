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
</head>

<body class="">
    <nav class="absolute top-0 left-0 bottom-0 w-[80px] bg-blue-800 py-10"></nav>
    <div class="mx-auto h-screen w-[1100px] border border-solid py-10">
        <h1 class="text-2xl font-extrabold italic text-orange-400">SISTEM REKRUTMEN TIM LOMBA</h1>
        <h2 class="text-2xl font-bold italic text-blue-800">UNIVERSITAS BRAWIJAYA</h2>
        @yield('content')
    </div>
</body>

</html>
