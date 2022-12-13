@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <p class="mt-5 mb-4 text-4xl font-bold font-roboto-slab">NOTIFIKASI</p>
    <div class="flex justify-between">
        <button class="w-full py-4 text-2xl italic font-bold text-white bg-blue-700">NOTIFIKASI MASUK</button>
        <button class="w-full py-4 text-2xl italic font-bold text-white bg-blue-300">RIWAYAT</button>
    </div>
    <div class="w-full h-[75%] bg-blue-700 p-10 overflow-auto">
            <table class="w-full max-h-[80%] overflow-auto text-center bg-white border-collapse">
                <thead>
                    <tr>
                        <th class="text-xl border border-slate-400">Role</th>
                        <th class="text-xl border border-slate-400">Fakultas</th>
                        <th class="text-xl border border-slate-400">Jurusan</th>
                        <th class="text-xl border border-slate-400">Nama</th>
                        <th class="text-xl border border-slate-400">No WA</th>
                        <th class="text-xl border border-slate-400">Informasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="border border-slate-400">Ketua</td>
                        <td class="border border-slate-400">FILKOM</td>
                        <td class="border border-slate-400">TIF</td>
                        <td class="border border-slate-400">Abdul</td>
                        <td class="border border-slate-400">081xxxxxxx</td>
                        <td class="border border-slate-400"><button class="px-4 py-1 text-lg italic font-bold text-white bg-orange-400 rounded">Detail</button></td>
                    </tr>
                    <tr class="">
                        <td class="border border-slate-400">Frontend Developer</td>
                        <td class="border border-slate-400">FILKOM</td>
                        <td class="border border-slate-400">TIF</td>
                        <td class="border border-slate-400">Ahmad</td>
                        <td class="border border-slate-400">081xxxxxxx</td>
                        <td class="border border-slate-400"><button class="px-4 py-1 text-lg italic font-bold text-white bg-orange-400 rounded">Detail</button></td>
                    </tr>
                    <tr class="">
                        <td class="border border-slate-400">UI/UX Designer</td>
                        <td class="border border-slate-400">FILKOM</td>
                        <td class="border border-slate-400">SI</td>
                        <td class="border border-slate-400">Andro</td>
                        <td class="border border-slate-400">081xxxxxxx</td>
                        <td class="border border-slate-400"><button class="px-4 py-1 text-lg italic font-bold text-white bg-orange-400 rounded">Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
