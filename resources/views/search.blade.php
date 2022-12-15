@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
{{-- @dd($tim[0]) --}}
@if (isset($data))

@endif
    <p class="mt-5 mb-3 text-4xl font-bold font-roboto-slab">CARI TIM</p>
    <form action="/search" method="post" class="flex justify-between gap-x-5">
        @csrf
        <input type="text" name="keyword" class="w-5/6 border-2">
        <button type="submit" class="w-1/6 px-4 py-3 text-2xl italic font-bold text-white bg-orange-400 rounded">Cari Tim</button>
    </form>
    <div class="flex flex-row flex-wrap gap-3 mt-8 overflow-auto justify-evenly h=[500px]">
        @if (isset($data))
        {{-- @dd($data) --}}
            @foreach ($data as $t)
            <a href="" class="flex h-[250px] w-[30%] flex-col rounded bg-gray-200 shadow-md">
                <div class="flex flex-col items-center justify-center h-full">
                    <h2 class="mb-2 text-3xl font-bold uppercase">{{$t['namaTim']}}</h2>
                    <h2 class="mb-4 text-xl font-bold uppercase">{{$t['lomba']}}</h2>
                    <div class="flex gap-x-2">
                        <button class="text-white bg-orange-400 font-bold rounded w-[100px] py-1">Detail</button>
                        <button class="text-white bg-green-500 font-bold  rounded w-[100px] py-1">Gabung</button>
                    </div>
                </div>
            </a>
            @endforeach
        @elseif(isset($error))
        <h1 class="text-4xl font-bold mt-[100px]">{{$error}}</h1>
        @else
            @foreach ($tim as $t)
            <a href="" class="flex h-[250px] w-[30%] flex-col rounded bg-gray-200 shadow-md">
                <div class="flex flex-col items-center justify-center h-full">
                    <h2 class="mb-2 text-3xl font-bold uppercase">{{$t['namaTim']}}</h2>
                    <h2 class="mb-4 text-xl font-bold uppercase">{{$t['lomba']}}</h2>
                    <div class="flex gap-x-2">
                        <button class="text-white bg-orange-400 font-bold rounded w-[100px] py-1">Detail</button>
                        <button class="text-white bg-green-500 font-bold  rounded w-[100px] py-1">Gabung</button>
                    </div>
                </div>
            </a>
            @endforeach
        @endif
        {{-- <a href="" class="flex h-[250px] w-[30%] flex-col rounded bg-gray-200 shadow-md">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="mb-2 text-3xl font-bold">TIM RPL 7</h2>
                <div class="flex gap-x-2">
                    <button class="text-white bg-orange-400 font-bold rounded w-[100px] py-1">Detail</button>
                    <button class="text-white bg-green-500 font-bold  rounded w-[100px] py-1">Gabung</button>
                </div>
            </div>
            <div class="w-full py-5 pl-10 text-sm font-bold bg-white">
                <div class="flex">
                    <p class="w-[80px]">Role</p>
                    <p class="font-normal">: Apps Designer</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Jurusan</p>
                    <p class="font-normal">: Teknik Informatika</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Fakultas</p>
                    <p class="font-normal">: Filkom</p>
                </div>
            </div>
        </a>
        <a href="" class="flex h-[250px] w-[30%] flex-col rounded bg-gray-200 shadow-md">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="mb-2 text-3xl font-bold">TIM RPL 7</h2>
                <div class="flex gap-x-2">
                    <button class="text-white bg-orange-400 font-bold rounded w-[100px] py-1">Detail</button>
                    <button class="text-white bg-green-500 font-bold  rounded w-[100px] py-1">Gabung</button>
                </div>
            </div>
            <div class="w-full py-5 pl-10 text-sm font-bold bg-white">
                <div class="flex">
                    <p class="w-[80px]">Role</p>
                    <p class="font-normal">: Apps Designer</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Jurusan</p>
                    <p class="font-normal">: Teknik Informatika</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Fakultas</p>
                    <p class="font-normal">: Filkom</p>
                </div>
            </div>
        </a>
        <a href="" class="flex h-[250px] w-[30%] flex-col rounded bg-gray-200 shadow-md">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="mb-2 text-3xl font-bold">TIM RPL 7</h2>
                <div class="flex gap-x-2">
                    <button class="text-white bg-orange-400 font-bold rounded w-[100px] py-1">Detail</button>
                    <button class="text-white bg-green-500 font-bold  rounded w-[100px] py-1">Gabung</button>
                </div>
            </div>
            <div class="w-full py-5 pl-10 text-sm font-bold bg-white">
                <div class="flex">
                    <p class="w-[80px]">Role</p>
                    <p class="font-normal">: Apps Designer</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Jurusan</p>
                    <p class="font-normal">: Teknik Informatika</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Fakultas</p>
                    <p class="font-normal">: Filkom</p>
                </div>
            </div>
        </a>
        <a href="" class="flex h-[250px] w-[30%] flex-col rounded bg-gray-200 shadow-md">
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="mb-2 text-3xl font-bold">TIM RPL 7</h2>
                <div class="flex gap-x-2">
                    <button class="text-white bg-orange-400 font-bold rounded w-[100px] py-1">Detail</button>
                    <button class="text-white bg-green-500 font-bold  rounded w-[100px] py-1">Gabung</button>
                </div>
            </div>
            <div class="w-full py-5 pl-10 text-sm font-bold bg-white">
                <div class="flex">
                    <p class="w-[80px]">Role</p>
                    <p class="font-normal">: Apps Designer</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Jurusan</p>
                    <p class="font-normal">: Teknik Informatika</p>
                </div>
                <div class="flex">
                    <p class="w-[80px]">Fakultas</p>
                    <p class="font-normal">: Filkom</p>
                </div>
            </div>
        </a> --}}
    </div>
@endsection
