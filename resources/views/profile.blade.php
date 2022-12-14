@extends('layouts.main') @section('title') Profile @endsection
@section('content')
{{-- @dd($user->mahasiswa->role) --}}
@dd($data)
<p class="mt-5 mb-8 text-4xl font-bold font-roboto-slab">PROFIL</p>
<div class="p-10 bg-blue-700 rounded">
    <p class="mb-2 text-2xl font-normal text-white">
        <span class="font-bold">Nama : </span>{{$user->nama}}
    </p>
    <p class="mb-2 text-2xl font-normal text-white">
        <span class="font-bold">Role : </span>
        @if ($isKetua == true) Ketua @else
        {{$user->mahasiswa->role}}
        @endif
    </p>
    <p class="mb-2 text-2xl font-normal text-white">
        <span class="font-bold">CV : </span>CV
    </p>
    <button
        class="px-2 py-1 text-2xl font-bold text-white bg-orange-400 rounded"
    >
        Unggah Data Diri
    </button>
</div>

@endsection
