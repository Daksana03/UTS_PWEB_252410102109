<article class="card troop">
    <img class="troop-img" src="{{ asset('Asset/pasukan/' . $troop['gambar']) }}" alt="{{ $troop['nama'] }}">

    <header class="troop-head">
        <h3>{{ $troop['nama'] }}</h3>
        <span class="badge {{ $troop['tipe'] === 'Udara' ? 'badge-sky' : 'badge-earth' }}">{{ $troop['tipe'] }}</span>
    </header>

    <p class="muted">{{ $troop['peran'] }}</p>

    <dl class="troop-meta">
        <div><dt>Ruang</dt><dd>{{ $troop['ruang'] }}</dd></div>
        <div><dt>Target</dt><dd>{{ $troop['target'] }}</dd></div>
        <div><dt>Resource</dt><dd>{{ $troop['elixir'] }}</dd></div>
    </dl>
</article>