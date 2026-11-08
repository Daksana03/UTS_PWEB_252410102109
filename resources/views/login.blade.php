@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="login-wrap">
    <div class="card login-card">
        <div class="login-icon"><img src="https://www.bing.com/th/id/OIP.O2FNkzxvL2Z4MZEcM4D-SQHaEK?w=259&h=146&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=ImgAns&rm=2" alt=""></div>
        <h1>{{ $judul }}</h1>
        <p class="muted">Masukkan nama pemimpin klan untuk mengelola pasukanmu.</p>

        {{-- Username dikirim ke dashboard lewat request parameter (?username=...) --}}
        <form action="{{ route('dashboard') }}" method="GET">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"
                   placeholder="contoh: ChiefRaja" minlength="3" maxlength="20" required autofocus>

            @if ($error)
                <p class="error">{{ $error }}</p>
            @endif

            <button type="submit" class="btn">Masuk Desa</button>
        </form>
    </div>
</section>
@endsection