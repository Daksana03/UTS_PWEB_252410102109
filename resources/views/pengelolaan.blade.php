@extends('layouts.app')

@section('title', 'Pengelolaan Pasukan')

@section('content')
<section class="hero">
    <h1>Pengelolaan Pasukan</h1>
    <p class="muted">Daftar pasukan milik <span class="gold">{{ $username }}</span>. Menampilkan {{ count($troops) }} pasukan.</p>

    <div class="filters">
        @foreach (['Semua', 'Darat', 'Udara'] as $opsi)
            <a href="{{ route('pengelolaan', ['username' => $username, 'tipe' => $opsi]) }}"
               class="chip {{ $filter === $opsi ? 'active' : '' }}">{{ $opsi }}</a>
        @endforeach
    </div>
</section>

<section class="grid grid-3">
    @foreach ($troops as $troop)
        @include('partials.troop-card', ['troop' => $troop])
    @endforeach
</section>
@endsection