@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <p class="mt-5 font-roboto-slab text-4xl font-bold">SELAMAT DATANG, NAMA</p>
    <div class="mt-8 flex flex-row flex-wrap justify-between gap-y-5">
        <a href="" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
            <p class="w-full bg-white py-5 pl-10 text-2xl font-bold">CARI TIM</p>
        </a>
        <a href="" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
            <p class="w-full bg-white py-5 pl-10 text-2xl font-bold">TIM ANDA</p>
        </a>
        <a href="" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
            <p class="w-full bg-white py-5 pl-10 text-2xl font-bold">PROFIL</p>
        </a>
        <a href="" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
            <p class="w-full bg-white py-5 pl-10 text-2xl font-bold">NOTIFIKASI</p>
        </a>

    </div>
@endsection
