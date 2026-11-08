@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<section class="card profile-card">
    <div class="avatar">{{ strtoupper(substr($username, 0, 1)) }}</div>
    <div>
        <h1>{{ $username }}</h1>
        <p class="muted">{{ $profil['peran'] }} - {{ $profil['klan'] }}</p>
    </div>
</section>

<section class="grid grid-2">
    <div class="card">
        <h2>Informasi Akun</h2>
        <ul class="list">
            @foreach ($profil as $kunci => $nilai)
                <li><span class="muted">{{ ucfirst($kunci) }}</span> <strong>{{ $nilai }}</strong></li>
            @endforeach
        </ul>
    </div>

    <div class="card">
        <h2>Pasukan Favorit</h2>
        <ul class="list">
            @foreach ($pasukanFavorit as $nama)
                <li>⭐ {{ $nama }}</li>
            @endforeach
        </ul>
        <a class="btn btn-small" href="{{ route('pengelolaan', ['username' => $username]) }}">Lihat Semua Pasukan</a>
    </div>
</section>
@endsection