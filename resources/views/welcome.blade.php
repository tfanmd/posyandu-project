<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Posyandu Sangkuriang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <div class="bg-indigo-950 text-indigo-100 text-xs py-2">
        <div class="max-w-7xl mx-auto px-6 flex justify-between tracking-wider font-medium">
            <span>Pelayanan Kesehatan Terpadu Tingkat RW</span>
            <span>Sangkuriang, Bandung</span>
        </div>
    </div>

    <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                <span class="text-rose-500 text-2xl"><i class="fa-solid fa-hands-holding-child"></i></span>
                Posyandu Sangkuriang
            </h1>

            <nav class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-indigo-600 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-indigo-700 transition shadow-sm">Masuk
                            Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-indigo-600 font-semibold text-sm hover:text-indigo-800 transition">Portal Petugas
                            &rarr;</a>
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <div class="bg-gradient-to-br from-indigo-50 via-white to-rose-50 pt-16 pb-28 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            <div>
                <span
                    class="px-3 py-1 bg-rose-100 text-rose-600 text-xs font-bold uppercase tracking-widest rounded-full mb-6 inline-block">Bersama
                    Mencegah Stunting</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 leading-tight">
                    Kawal Tumbuh Kembang <span class="text-indigo-600">Generasi Masa Depan</span>
                </h2>
                <p class="text-lg text-slate-600 mb-8">
                    Hadir lebih dekat untuk memantau kesehatan gizi balita, pendampingan ibu hamil, dan kesejahteraan
                    lansia di lingkungan Sangkuriang.
                </p>

                <div class="space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-weight-scale text-indigo-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Pemantauan Gizi Rutin</h4>
                            <p class="text-sm text-slate-500 mt-1">Pencatatan berat dan tinggi badan berkala untuk
                                memastikan anak tumbuh ideal sesuai kurva kesehatan.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-rose-100 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-syringe text-rose-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Layanan Imunisasi Dasar</h4>
                            <p class="text-sm text-slate-500 mt-1">Fasilitasi pemberian vaksin dan vitamin A untuk
                                membangun kekebalan tubuh balita sejak dini.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative flex justify-center">
                <div class="absolute inset-0 bg-indigo-200 blur-3xl opacity-30 rounded-full"></div>

                <div
                    class="relative z-10 w-full max-w-sm aspect-square bg-white rounded-3xl shadow-2xl border border-slate-100 p-8 flex flex-col items-center justify-center text-center transform rotate-2 hover:rotate-0 transition duration-300">
                    <i class="fa-solid fa-heart-pulse text-7xl text-rose-400 mb-6"></i>
                    <h3 class="text-2xl font-bold text-slate-800">Posyandu Digital</h3>
                    <p class="text-slate-500 text-sm mt-2">Transparan, cepat, dan terintegrasi untuk kenyamanan warga
                        Sangkuriang.</p>
                </div>
            </div>

        </div>
    </div>

    <section class="max-w-7xl mx-auto px-6 -mt-14 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-3xl font-extrabold text-indigo-600">{{ $stats['balita'] }}</h3>
                <p class="text-xs font-bold text-slate-400 mt-2 uppercase tracking-wide">Data Balita</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-3xl font-extrabold text-rose-500">{{ $stats['ibu_hamil'] }}</h3>
                <p class="text-xs font-bold text-slate-400 mt-2 uppercase tracking-wide">Ibu Hamil</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-3xl font-extrabold text-amber-500">{{ $stats['lansia'] }}</h3>
                <p class="text-xs font-bold text-slate-400 mt-2 uppercase tracking-wide">Lansia Terdata</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-3xl font-extrabold text-emerald-500">{{ $stats['kegiatan_bulan_ini'] }}</h3>
                <p class="text-xs font-bold text-slate-400 mt-2 uppercase tracking-wide">Giat Bulan Ini</p>
            </div>

        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <section class="lg:col-span-2 space-y-8">
            <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                <div class="w-8 h-8 rounded bg-indigo-100 text-indigo-600 flex items-center justify-center"><i
                        class="fa-regular fa-newspaper"></i></div>
                <h3 class="text-2xl font-bold text-slate-900">Edukasi Warga</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($articles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group">
                        @if ($article->gambar_thumbnail)
                            <img src="{{ asset('storage/' . $article->gambar_thumbnail) }}" alt="Thumbnail"
                                class="w-full h-48 object-cover transition duration-300 group-hover:scale-105">
                        @else
                            <div class="w-full h-48 bg-slate-100 flex items-center justify-center text-slate-400">
                                <i class="fa-solid fa-camera text-3xl"></i>
                            </div>
                        @endif
                        <div class="p-6 relative bg-white">
                            <span
                                class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-bold uppercase tracking-wider mb-3 inline-block">{{ $article->tipe }}</span>
                            <h4
                                class="text-lg font-bold text-slate-900 mb-2 leading-snug group-hover:text-indigo-600 transition">
                                {{ $article->judul }}</h4>
                            <p class="text-xs text-slate-400 flex items-center gap-1"><i
                                    class="fa-regular fa-clock"></i> {{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </article>
                @empty
                    <div
                        class="bg-slate-50 p-10 rounded-2xl border-2 border-dashed border-slate-200 text-center text-slate-400 col-span-2">
                        Belum ada artikel edukasi yang diterbitkan.
                    </div>
                @endforelse
            </div>
        </section>

        <aside class="space-y-8">
            <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                <div class="w-8 h-8 rounded bg-rose-100 text-rose-600 flex items-center justify-center"><i
                        class="fa-regular fa-calendar-days"></i></div>
                <h3 class="text-2xl font-bold text-slate-900">Agenda Terdekat</h3>
            </div>

            <div class="space-y-4">
                @forelse($jadwal_terdekat as $jadwal)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden">
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-rose-400"></div>

                        <span
                            class="px-2 py-1 bg-rose-50 text-rose-600 rounded text-xs font-bold uppercase tracking-wider">
                            {{ ucfirst($jadwal->kategori_sasaran) }}
                        </span>
                        <h4 class="font-bold text-slate-900 mt-3 text-base leading-tight">{{ $jadwal->nama_kegiatan }}
                        </h4>

                        <div class="mt-4 space-y-2 text-sm text-slate-500">
                            <p class="flex items-center gap-3"><i class="fa-regular fa-calendar text-slate-400 w-4"></i>
                                {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('d F Y') }}</p>
                            <p class="flex items-center gap-3"><i
                                    class="fa-solid fa-location-dot text-slate-400 w-4"></i> {{ $jadwal->lokasi }}</p>
                        </div>
                    </div>
                @empty
                    <div
                        class="bg-slate-50 p-8 rounded-2xl border-2 border-dashed border-slate-200 text-center text-slate-400">
                        Tidak ada agenda terdekat saat ini.
                    </div>
                @endforelse
            </div>
        </aside>

    </main>

    <section id="tentang" class="bg-white py-20 border-t border-slate-200 mt-10">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <span
                class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">Tentang
                Sistem</span>
            <h3 class="text-3xl font-bold text-slate-900 mb-8">Inovasi Digital Posyandu Sangkuriang</h3>

            <div class="space-y-6 text-slate-600 leading-relaxed text-justify md:text-center">
                <p>
                    Berawal dari kendala pencatatan manual di buku register yang seringkali memakan waktu, rentan rusak,
                    dan menyulitkan proses rekapitulasi data. Sistem Informasi Posyandu Sangkuriang dikembangkan sebagai
                    solusi digital terpadu untuk mempermudah tugas mulia para Kader Posyandu di lingkungan kami.
                </p>
                <p>
                    Melalui sistem berbasis *website* ini, pendataan imunisasi balita, pemantauan kesehatan ibu hamil,
                    hingga rekam jejak lansia dapat dilakukan secara akurat, terpusat, dan minim risiko redundansi (data
                    ganda). Tidak hanya bagi petugas, sistem ini juga dirancang dengan antarmuka yang modern agar warga
                    dapat dengan mudah mengakses informasi kesehatan dan jadwal kegiatan secara transparan langsung dari
                    layar *smartphone* mereka.
                </p>
            </div>

            <div class="mt-10 flex justify-center gap-4">
                <div class="w-16 h-1 bg-rose-500 rounded-full"></div>
                <div class="w-4 h-1 bg-indigo-500 rounded-full"></div>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-20 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span
                    class="px-3 py-1 bg-rose-50 text-rose-600 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">Dokumentasi</span>
                <h3 class="text-3xl font-bold text-slate-900">Galeri Kegiatan</h3>
                <p class="text-slate-500 mt-3">Momen hangat pelayanan dan kebersamaan di Posyandu Sangkuriang.</p>
            </div>

            <!-- Grid Galeri (3 Kolom) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <!-- Foto 1 -->
                <div
                    class="aspect-video bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group cursor-pointer relative">
                    <div
                        class="absolute inset-0 bg-indigo-900/10 group-hover:bg-transparent transition duration-300 z-10">
                    </div>
                    <img src="{{ asset('images/image1.png') }}" alt="Kegiatan Posyandu"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <!-- Foto 2 -->
                <div
                    class="aspect-video bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group cursor-pointer relative">
                    <div
                        class="absolute inset-0 bg-indigo-900/10 group-hover:bg-transparent transition duration-300 z-10">
                    </div>
                    <img src="{{ asset('images/image2.png') }}" alt="Kegiatan Posyandu"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <!-- Foto 3 -->
                <div
                    class="aspect-video bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group cursor-pointer relative">
                    <div
                        class="absolute inset-0 bg-indigo-900/10 group-hover:bg-transparent transition duration-300 z-10">
                    </div>
                    <img src="{{ asset('images/image3.png') }}" alt="Kegiatan Posyandu"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>

            </div>

            <div class="text-center mt-10">
                <button
                    class="px-6 py-2 border-2 border-indigo-100 text-indigo-600 font-bold rounded-full hover:bg-indigo-50 transition">Lihat
                    Semua Foto</button>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">

            <div>
                <h4 class="font-bold text-white text-lg mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-hands-holding-child text-rose-500"></i> Posyandu Sangkuriang
                </h4>
                <p class="text-sm leading-relaxed text-slate-400 text-justify">
                    Kami berkomitmen memberikan layanan preventif kesehatan dasar yang mudah diakses, ramah, dan
                    profesional bagi warga dilingkungan sekitar.
                </p>
            </div>

            <div>
                <h4 class="font-bold text-white text-lg mb-6">Hubungi Kami</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-slate-500"></i> (022) 123-4567
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-slate-500"></i> halo@sangkuriang.com
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-white text-lg mb-6">Alamat</h4>
                <p class="text-sm text-slate-400 mb-6">
                    Sekretariat RW, Jalan Sangkuriang<br>
                    Kota Bandung, Jawa Barat
                </p>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-6 border-t border-slate-800 pt-8 text-center">
            <p class="text-xs font-medium text-slate-500">&copy; {{ date('Y') }} Sistem Informasi Posyandu
                Sangkuriang. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>

</html>
