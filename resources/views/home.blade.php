@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <p class="mt-5 text-4xl font-bold uppercase font-roboto-slab">SELAMAT DATANG, {{$user}}</p>
    <div class="flex flex-row flex-wrap justify-between mt-8 gap-y-5">
        @if ($isKetua==true)
            <a href="/ketua/search" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">CARI ANGGOTA</p>
            </a>
            <a href="/ketua/team" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">TIM ANDA</p>
            </a>
            {{-- <a href="/ketua/profile" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">PROFIL</p>
            </a> --}}
            <a href="/ketua/notification" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">NOTIFIKASI</p>
            </a>
        @else
            <a href="/search" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">CARI TIM</p>
            </a>
            <a href="/team" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">TIM ANDA</p>
            </a>
            <a href="/profile" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">PROFIL</p>
            </a>
            <a href="/notification" class="flex h-[270px] w-[48%] flex-col justify-end rounded bg-gray-200 shadow-md">
                <p class="w-full py-5 pl-10 text-2xl font-bold bg-white">NOTIFIKASI</p>
            </a>
        @endif

    </div>
@endsection
