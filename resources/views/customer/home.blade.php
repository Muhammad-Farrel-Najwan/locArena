@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-8 h-max px-16 py-12">
    <div class="flex items-center justify-between gap-2">
        <div>
            <p class="font-primary font-bold text-2xl">
                Halo, {{ auth()->user()->nama_depan }}!
            </p>
            <p class="text-sm text-gray-500">
                Selamat datang di LocArena.
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-green-500 text-white font-bold px-6 py-2 rounded-xl">
                Keluar
            </button>
        </form>
    </div>
</div>
@endsection
