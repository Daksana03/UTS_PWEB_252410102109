@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="hero">
    <h1>Selamat datang, <span class="gold">{{ $username }}</span>!</h1>
    <p class="muted">Berikut ini adalah stat desamu.</p>
</section>

<section class="grid grid-4">
    @foreach ($stats as $stat)
        @include('partials.stat-card', ['stat' => $stat])
    @endforeach
</section>

<section class="grid grid-2">
    <div class="card">
        <h2>Total Rampasan</h2>
        <ol class="list">
            @foreach ($rampasan as $item)
                <li>
                    <strong>{{ $item['nama'] }}</strong>
                    <span class="badge">{{ $item['jumlah'] }}</span>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="card">
        <h2>Strategi Favorit</h2>
        <ul class="list">
            @foreach ($pengumuman as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        <a class="btn btn-small" href="{{ route('pengelolaan', ['username' => $username]) }}">Kelola Pasukan</a>
    </div>
</section>
@endsection