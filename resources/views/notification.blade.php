@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')

{{-- @dd($data) --}}
    <p class="mt-5 mb-4 text-4xl font-bold font-roboto-slab">NOTIFIKASI</p>
    <div class="flex justify-between">
        <button class="w-full py-4 text-2xl italic font-bold text-white bg-blue-700">NOTIFIKASI MASUK</button>
        <button class="w-full py-4 text-2xl italic font-bold text-white bg-blue-300">RIWAYAT</button>
    </div>
    <div class="w-full h-[75%] bg-blue-700 p-10 overflow-auto">
            <table class="w-full max-h-[80%] overflow-auto text-center bg-white border-collapse">
                @if ($isKetua)
                    <thead>
                        <tr>
                            <th class="text-xl border border-slate-400">User</th>
                            <th class="text-xl border border-slate-400">Role</th>
                            <th class="text-xl border border-slate-400">No. Wa</th>
                            <th class="text-xl border border-slate-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr class="">
                            <td class="border border-slate-400">{{$d['pengaju']}}</td>
                            <td class="border border-slate-400">{{$d['role']}}</td>
                            <td class="border border-slate-400">{{$d['wa']}}</td>
                            <td class="border border-slate-400">
                                <button class="px-4 py-1 text-lg italic font-bold text-white bg-green-400 rounded">Terima</button>
                                <button class="px-4 py-1 text-lg italic font-bold text-white bg-red-400 rounded">Tolak</button>
                            </td>
                        </tr>
                        @endforeach
                    </tr>
                    </tbody>
                @else
                    <thead>
                        <tr>
                            <th class="text-xl border border-slate-400">Pengirim</th>
                            <th class="text-xl border border-slate-400">Tanggal</th>
                            <th class="text-xl border border-slate-400">Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr class="">
                                <td class="border border-slate-400">{{$d['sender']}}</td>
                                <td class="border border-slate-400">{{$d['sent']}}</td>
                                <td class="border border-slate-400">{{$d['message']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    @endif
            </table>
        </div>
    </div>

@endsection
