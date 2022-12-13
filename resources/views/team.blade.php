@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
{{-- @dd($tim['ketua_pengguna_NIM']) --}}
    <p class="mt-5 mb-4 text-4xl font-bold font-roboto-slab">TIM ANDA</p>
    <div class="w-full h-[80%] bg-blue-700 p-10">
        @if ($isKetua==true)
            <h2 class="mb-2 text-4xl font-bold text-white">{{$tim['namaTim']}}</h2>
            <h4 class="text-2xl font-normal text-white">{{$tim['lomba']}}</h4>
            <div class="bg-blue-400 w-full h-[70%] mt-4 p-4 overflow-auto">
                <div class="flex justify-between">
                    <p class="text-3xl font-normal text-white">Anggota</p>
                    <button class="px-4 py-2 mb-4 text-xl italic font-bold text-white bg-orange-400 rounded">Unggah Kriteria</button>
                </div>
                <table class="w-full max-h-[80%] overflow-auto text-center bg-white border-collapse">
                    <thead>
                        <tr>
                            <th class="text-xl border border-slate-400">Role</th>
                            {{-- <th class="text-xl border border-slate-400">Fakultas</th>
                            <th class="text-xl border border-slate-400">Jurusan</th> --}}
                            <th class="text-xl border border-slate-400">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tim['anggota'] as $a)
                            <tr class="">
                                <td class="border border-slate-400">{{$a['role']}}</td>
                                {{-- <td class="border border-slate-400">FILKOM</td>
                                <td class="border border-slate-400">TIF</td> --}}
                                <td class="border border-slate-400">{{$a['nama']}}</td>
                            </tr>
                        @endforeach

                        {{-- <tr class="">
                            <td class="border border-slate-400">Ketua</td>
                            <td class="border border-slate-400">FILKOM</td>
                            <td class="border border-slate-400">TIF</td>
                            <td class="border border-slate-400">Abdul</td>
                        </tr>
                        <tr class="">
                            <td class="border border-slate-400">Frontend Developer</td>
                            <td class="border border-slate-400">FILKOM</td>
                            <td class="border border-slate-400">TIF</td>
                            <td class="border border-slate-400">Ahmad</td>
                        </tr>
                        <tr class="">
                            <td class="border border-slate-400">UI/UX Designer</td>
                            <td class="border border-slate-400">FILKOM</td>
                            <td class="border border-slate-400">SI</td>
                            <td class="border border-slate-400">Andro</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-end mt-5 gap-x-4">
                <form action="/ketua/search" method="POST">
                    @csrf
                    <input class="px-1 py-2" type="text" name="keyword">
                    <button type="submit" class="px-4 py-2 ml-10 text-2xl italic font-bold text-white bg-orange-400 rounded">Cari Anggota Baru</button>
                </form>
                <form action="/ketua/hapus" method="post">
                    @csrf
                    <input type="hidden" value={{$tim['namaTim']}} name="namaTim">
                    <input type="hidden" value={{$tim['ketua_pengguna_NIM']}} name="namaKetua">
                    <button type="submit" class="px-4 py-2 text-2xl italic font-bold text-white bg-red-600 rounded">Hapus Tim</button>
                </form>
            </div>
        @elseif($isKetua==false)
            <h2 class="mt-[200px] text-4xl font-bold text-center text-white">Anda Belum Memiliki Tim</h2>
            <div class="flex items-center justify-center mt-5 gap-x-4">
                <button class="px-4 py-2 text-2xl italic font-bold text-white bg-orange-400 rounded">Buat Tim</button>
                <button class="px-4 py-2 text-2xl italic font-bold text-white bg-orange-400 rounded">Cari Tim</button>
            </div>
        @endif

    </div>

@endsection
