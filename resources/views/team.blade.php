@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <p class="mt-5 mb-4 text-4xl font-bold font-roboto-slab">TIM ANDA</p>
    <div class="w-full h-[80%] bg-blue-700 p-10">
        <h2 class="mb-2 text-4xl font-bold text-white">NAMA TIM</h2>
        <h4 class="text-2xl font-normal text-white">Lomba yang diikuti</h4>
        <div class="bg-blue-400 w-full h-[70%] mt-4">
            <div class="flex justify-between p-4">
                <p class="text-3xl font-normal text-white">Kriteria Anggota</p>
                <button class="px-4 py-2 text-xl italic font-bold text-white bg-orange-400 rounded">Unggah Kriteria</button>
            </div>
        </div>
        <div class="flex items-center justify-end mt-5 gap-x-4">
            <button class="px-4 py-2 text-2xl italic font-bold text-white bg-orange-400 rounded">Cari Anggota</button>
            <button class="px-4 py-2 text-2xl italic font-bold text-white bg-red-600 rounded">Hapus Tim</button>
        </div>
    </div>

@endsection
