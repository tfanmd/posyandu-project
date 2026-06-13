<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu Sangkuriang - Sehat Bersama Keluarga</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-900 tracking-tight">🍃 Posyandu Sangkuriang</h1>
            <nav>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-emerald-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-emerald-700 transition shadow-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-gray-600 hover:text-emerald-600 transition">Masuk Petugas
                            &rarr;</a>
                    @endauth
                @endif
            </nav>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-20 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                Posyandu Sangkuriang <br>
                <span class="text-emerald-600 font-bold">Sehat Bersama Keluarga</span>
            </h2>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">Pusat informasi dan layanan kesehatan untuk Balita, Ibu
                Hamil, dan Lansia.</p>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 -mt-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md">
                <h3 class="text-3xl font-extrabold text-emerald-600">{{ $stats['balita'] }}</h3>
                <p class="text-sm font-medium text-gray-400 mt-1">Total Balita</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md">
                <h3 class="text-3xl font-extrabold text-cyan-600">{{ $stats['ibu_hamil'] }}</h3>
                <p class="text-sm font-medium text-gray-400 mt-1">Ibu Hamil</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md">
                <h3 class="text-3xl font-extrabold text-amber-500">{{ $stats['lansia'] }}</h3>
                <p class="text-sm font-medium text-gray-400 mt-1">Lansia Aktif</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md">
                <h3 class="text-3xl font-extrabold text-blue-600">{{ $stats['kegiatan_bulan_ini'] }}</h3>
                <p class="text-sm font-medium text-gray-400 mt-1">Kegiatan Bulan Ini</p>
            </div>

        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-3 gap-8">

        <section class="lg:col-span-2 space-y-6">
            <h3 class="text-xl font-bold text-gray-900 border-b pb-2 border-emerald-500 inline-block">Edukasi & Berita
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($articles as $article)
                    <article
                        class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow transition">
                        @if ($article->gambar_thumbnail)
                            <img src="{{ asset('storage/' . $article->gambar_thumbnail) }}" alt="Thumbnail"
                                class="w-full h-44 object-cover">
                        @else
                            <div
                                class="w-full h-44 bg-emerald-50 flex items-center justify-center text-emerald-600 font-medium text-sm">
                                Posyandu Sangkuriang Info
                            </div>
                        @endif
                        <div class="p-5">
                            <span
                                class="px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded text-xs font-bold uppercase tracking-wider">{{ $article->tipe }}</span>
                            <h4 class="text-base font-bold text-gray-900 mt-2 mb-2 leading-snug">{{ $article->judul }}
                            </h4>
                            <p class="text-xs text-gray-500">{{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </article>
                @empty
                    <div class="bg-white p-8 rounded-xl border border-dashed text-center text-gray-400 col-span-2">
                        Belum ada info publikasi terbaru harian.
                    </div>
                @endforelse
            </div>
        </section>

        <aside class="space-y-6">
            <h3 class="text-xl font-bold text-gray-900 border-b pb-2 border-teal-500 inline-block">Jadwal Terdekat</h3>

            <div class="space-y-4">
                @forelse($jadwal_terdekat as $jadwal)
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 border-l-4 border-emerald-500">
                        <span
                            class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-xs font-semibold uppercase tracking-tight">
                            {{ ucfirst($jadwal->kategori_sasaran) }}
                        </span>
                        <h4 class="font-bold text-gray-900 mt-2 text-sm leading-tight">{{ $jadwal->nama_kegiatan }}
                        </h4>

                        <div class="mt-3 space-y-1 text-xs text-gray-500 font-medium">
                            <p>📅 {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('d F Y') }}</p>
                            <p>📍 {{ $jadwal->lokasi }}</p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-xl border border-dashed text-center text-gray-400">
                        Belum ada jadwal kegiatan terdekat.
                    </div>
                @endforelse
            </div>
        </aside>

    </main>

    <footer class="bg-white text-gray-400 py-6 text-center text-xs border-t border-gray-200 mt-12">
        <p>&copy; {{ date('Y') }} Posyandu Sangkuriang. Pusat Informasi Layanan Terpadu.</p>
    </footer>

</body>

</html>
