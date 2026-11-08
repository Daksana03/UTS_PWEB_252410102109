# UTS_PWEB_NIM

## Barracks Manager: Pengelolaan Pasukan Clash of Clans

Aplikasi web berbasis **Laravel (MVC)** untuk simulasi login dan pengelolaan daftar pasukan bertema Clash of Clans. Username dari form login diteruskan ke Dashboard dan Profil lewat request parameter, dan data pasukan dikirim dari Controller ke View lalu ditampilkan dengan `@foreach`.

> Aplikasi penggemar, tidak berafiliasi dengan Supercell.

## Screenshot

_(Tambahkan screenshot Login, Dashboard, Pengelolaan, dan Profil di sini)_

## Fitur
- Login (username lewat request parameter GET)
- Dashboard dengan ringkasan statistik pasukan
- Halaman pengelolaan dengan filter pasukan Darat / Udara
- Halaman profil
- Tampilan responsif

## Struktur Utama
- `routes/web.php`
- `app/Http/Controllers/PageController.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/{login,dashboard,pengelolaan,profile}.blade.php`
- `resources/views/components/{navbar,footer}.blade.php`
- `resources/views/partials/{stat-card,troop-card}.blade.php`
- `public/css/style.css`

## Cara Menjalankan
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
Buka `http://127.0.0.1:8000`.
