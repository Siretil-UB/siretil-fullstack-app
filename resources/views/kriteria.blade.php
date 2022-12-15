@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
{{-- @dd($tim) --}}
    <p class="mt-5 mb-4 text-4xl font-bold font-roboto-slab">TIM ANDA</p>
    <div class="w-full h-[80%] bg-blue-700 p-10">
        @if ($isKetua==true)
        <div class="w-full h-full p-10 bg-white">
            <form action="/ketua/kriteria" method="post">
                @csrf
                <input type="hidden" value={{$tim}} name="namaTim">
                <label class="text-3xl font-bold" for="role">Masukkan Role</label>
                <input class="w-full px-2 py-1 mt-4 mb-8 border-2 border-black rounded" type="text" name="role">
                <label class="text-3xl font-bold" for="jurusan">Masukkan Jurusan</label>
                <input class="w-full px-2 py-1 mt-4 mb-8 border-2 border-black rounded" type="text" name="jurusan">
                <label class="text-3xl font-bold" for="fakultas">Masukkan Fakultas</label>
                <input class="w-full px-2 py-1 mt-4 mb-8 border-2 border-black rounded" type="text" name="fakultas">
                <button type="submit" class="px-4 py-2 text-xl italic font-bold text-white bg-green-400 rounded" type="submit">Tambahkan Kriteria</button>
            </form>
                <form action="/ketua/redirect-batal-unggah-kriteria">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-xl italic font-bold text-white bg-red-400 rounded" type="submit">Batal</button>
                </form>
            </div>
        @elseif($isKetua==false)

        @endif

    </div>

@endsection
