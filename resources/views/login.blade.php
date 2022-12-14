<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIRETIL || Login</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="flex items-center h-screen bg-blue-800">
    {{-- FORM CONTAINER --}}
    <div class="mx-auto flex h-[550px] w-3/4 flex-row overflow-hidden rounded bg-white shadow-md shadow-black">
        {{-- FORM --}}
        <form method="POST" action={{ route('login') }}
            class="flex w-[35%] flex-col items-center justify-center bg-white">
            @csrf
            <h1 class="mb-0 text-center font-roboto text-[3.5rem] font-medium text-blue-800"><span
                    class="font-bold text-orange-400">SI</span>RETIL</h1>
            <p class="text-center font-roboto text-[.75rem] font-semibold text-blue-800 mb-2"><span
                    class="text-orange-400">Sistem</span>
                Rekrutmen Tim Lomba
            </p>
            <p class="text-red-500">{{ $errors->first('error') }}</p>
            <div class="relative flex flex-col w-4/6 mt-5 mb-5">
                <label
                    class="absolute top-[-10px] left-[10px] my-0 bg-white py-0 px-1 font-roboto-slab text-sm text-slate-500"
                    for="nim">NIM</label>
                <input type="text" name="nim" required
                    class="w-full rounded-md border-2 border-solid border-slate-200 px-3 py-[10px] font-roboto text-xs tracking-wider text-slate-600 outline-slate-200">
            </div>
            <div class="relative flex flex-col w-4/6">
                <label
                    class="absolute top-[-10px] left-[10px] my-0 bg-white py-0 px-1 font-roboto-slab text-sm text-slate-500"
                    for="password">Kata
                    Sandi</label>
                <input type="password" name="password" required
                    class="mb-5 w-full rounded-md border-2 border-solid border-slate-200 px-3 py-[10px] font-roboto text-xs tracking-wider text-slate-600 outline-slate-200">
            </div>

            <button type="submit"
                class="w-4/6 rounded-md bg-orange-400 py-[.1rem] font-roboto-slab text-lg text-white">Masuk</button>
        </form>
        {{-- IMAGE --}}

        <div class="h-full w-[65%] bg-[url('/public/assets/image/ub_image.png')] bg-cover bg-center"></div>
    </div>

    {{-- access error --}}
    {{-- <div>{{ $errors->first('error') }}</div> --}}
</body>

</html>
