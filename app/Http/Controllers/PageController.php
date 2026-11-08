<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function troops(): array
    {
        $data = [
            ['nama' => 'Barbarian',    'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 1,  'target' => 'Apa saja',        'peran' => 'Pasukan dasar untuk membanjiri pertahanan.'],
            ['nama' => 'Archer',       'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 1,  'target' => 'Apa saja',        'peran' => 'Penyerang jarak jauh, rapuh tapi lincah.'],
            ['nama' => 'Giant',        'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 5,  'target' => 'Pertahanan',      'peran' => 'Tank yang menyerap tembakan pertahanan.'],
            ['nama' => 'Goblin',       'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 1,  'target' => 'Sumber daya',     'peran' => 'Cepat, mengincar gudang dan tambang.'],
            ['nama' => 'Wall Breaker', 'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 2,  'target' => 'Dinding',         'peran' => 'Membuka jalan dengan menghancurkan tembok.'],
            ['nama' => 'Balloon',      'tipe' => 'Udara', 'elixir' => 'Elixir',      'ruang' => 5,  'target' => 'Pertahanan',      'peran' => 'Menjatuhkan bom dari udara ke pertahanan.'],
            ['nama' => 'Wizard',       'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 4,  'target' => 'Apa saja',        'peran' => 'Sihir area dengan damage tinggi.'],
            ['nama' => 'Healer',       'tipe' => 'Udara', 'elixir' => 'Elixir',      'ruang' => 14, 'target' => 'Pasukan sendiri', 'peran' => 'Menyembuhkan pasukan darat.'],
            ['nama' => 'Dragon',       'tipe' => 'Udara', 'elixir' => 'Elixir',      'ruang' => 20, 'target' => 'Apa saja',        'peran' => 'Penyerang udara kuat dengan serangan area.'],
            ['nama' => 'P.E.K.K.A',    'tipe' => 'Darat', 'elixir' => 'Elixir',      'ruang' => 25, 'target' => 'Apa saja',        'peran' => 'Prajurit lapis baja dengan damage besar.'],
            ['nama' => 'Minion',       'tipe' => 'Udara', 'elixir' => 'Dark Elixir', 'ruang' => 2,  'target' => 'Apa saja',        'peran' => 'Penyerang udara murah dan cepat.'],
            ['nama' => 'Hog Rider',    'tipe' => 'Darat', 'elixir' => 'Dark Elixir', 'ruang' => 5,  'target' => 'Pertahanan',      'peran' => 'Melompati dinding menuju pertahanan.'],
            ['nama' => 'Valkyrie',     'tipe' => 'Darat', 'elixir' => 'Dark Elixir', 'ruang' => 8,  'target' => 'Apa saja',        'peran' => 'Kapak berputar yang menyapu banyak target.'],
            ['nama' => 'Golem',        'tipe' => 'Darat', 'elixir' => 'Dark Elixir', 'ruang' => 30, 'target' => 'Pertahanan',      'peran' => 'Tank raksasa dengan HP sangat besar.'],
            ['nama' => 'Witch',        'tipe' => 'Darat', 'elixir' => 'Dark Elixir', 'ruang' => 12, 'target' => 'Apa saja',        'peran' => 'Memanggil kerangka untuk membantu menyerang.'],
            ['nama' => 'Lava Hound',   'tipe' => 'Udara', 'elixir' => 'Dark Elixir', 'ruang' => 30, 'target' => 'Pertahanan',      'peran' => 'Pengalih perhatian anti-udara.'],
        ];

            return array_map(function ($t) {
        $t['gambar'] = strtolower(str_replace([' ', '.'], ['-', ''], $t['nama'])) . '.png';
        return $t;
    }, $data);
    }

    // Ambil username dari request parameter (?username=...)
    private function getUsername(Request $request): ?string
    {
        $username = trim((string) $request->query('username', ''));

        return strlen($username) < 3 ? null : substr($username, 0, 20);
    }

    public function login(Request $request)
    {
        return view('login', [
            'judul' => 'Masuk ke Desa',
            'error' => $request->query('error'),
        ]);
    }

    public function dashboard(Request $request)
    {
        $username = $this->getUsername($request);
        if (!$username) {
            return redirect()->route('login', ['error' => 'Username wajib diisi (minimal 3 karakter).']);
        }

        $troops = $this->troops();

        $stats = [
            ['label' => 'Town Hall', 'nilai' => '15', 'ikon' => 'Building_HV_Town_Hall_level_15_3.png'],
            ['label' => 'Total Pertempuran', 'nilai' => '256', 'ikon' => 'Icon_HV_Battle.png'],
            ['label' => 'Total Perang Clan', 'nilai' => '122', 'ikon' => 'Icon_HV_Clan_War.png'],
            ['label' => 'Total Bintang yang didapat', 'nilai' => '498', 'ikon' => 'Icon_BB_3_Stars.png'],
        ];

        $pengumuman = [
            'Queen Walk',
            'Lavaloonion',
            'Gowiwi',
        ];

        $rampasan = [
            ['nama' => 'Gold',        'jumlah' => '12.500.000'],
            ['nama' => 'Elixir',      'jumlah' => '11.800.000'],
            ['nama' => 'Dark Elixir', 'jumlah' => '95.000'],
];

        return view('dashboard', [
            'username'   => $username,
            'stats'      => $stats,
            'pengumuman' => $pengumuman,
            'rampasan'   => $rampasan
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $username = $this->getUsername($request);
        if (!$username) {
            return redirect()->route('login', ['error' => 'Username wajib diisi (minimal 3 karakter).']);
        }

        $filter = $request->query('tipe', 'Semua');
        $troops = $this->troops();

        if (in_array($filter, ['Darat', 'Udara'], true)) {
            $troops = array_values(array_filter($troops, fn ($t) => $t['tipe'] === $filter));
        }

        return view('pengelolaan', [
            'username' => $username,
            'troops'   => $troops,
            'filter'   => $filter,
        ]);
    }

    public function profile(Request $request)
    {
        $username = $this->getUsername($request);
        if (!$username) {
            return redirect()->route('login', ['error' => 'Username wajib diisi (minimal 3 karakter).']);
        }

        $profil = [
            'peran'     => 'Pemimpin Clan',
            'klan'      => 'Klan PWEB Kelas A',
            'liga'      => 'Liga Kristal',
            'bergabung' => '2025',
        ];

        $pasukanFavorit = ['Dragon', 'Healer', 'Minion'];

        return view('profile', [
            'username'       => $username,
            'profil'         => $profil,
            'pasukanFavorit' => $pasukanFavorit,
        ]);
    }
}

