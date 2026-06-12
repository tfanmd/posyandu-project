<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Posyandu Sangkuriang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border-l-4 border-emerald-500">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Anda masuk menggunakan hak akses:
                        <span
                            class="px-2 py-1 bg-gray-100 rounded text-emerald-700 font-bold uppercase text-xs tracking-wider">
                            {{ Auth::user()->role }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @if (Auth::user()->role === 'admin')
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200">
                        <div class="p-6">
                            <div class="text-emerald-500 mb-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Manajemen Kader</h4>
                            <p class="text-sm text-gray-600 mb-4">Kelola pendaftaran akun dan hak akses operasional
                                kader.</p>
                            <a href="{{ route('admin.kader.index') }}"
                                class="text-emerald-600 text-sm font-semibold hover:text-emerald-800">Kelola Data
                                &rarr;</a>
                        </div>
                    </div>

                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200">
                        <div class="p-6">
                            <div class="text-blue-500 mb-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Publikasi & Artikel</h4>
                            <p class="text-sm text-gray-600 mb-4">Persetujuan (approval) berita posyandu dan artikel
                                edukasi gizi.</p>
                            <a href="{{ route('admin.post.index') }}"
                                class="text-blue-600 text-sm font-semibold hover:text-blue-800">Kelola
                                Konten &rarr;</a>
                        </div>
                    </div>
                @elseif(Auth::user()->role === 'kader')
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200">
                        <div class="p-6">
                            <div class="text-green-500 mb-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Jadwal Kegiatan</h4>
                            <p class="text-sm text-gray-600 mb-4">Inisiasi agenda penimbangan, imunisasi, dan kelas ibu
                                hamil.</p>
                            <a href="#" class="text-green-600 text-sm font-semibold hover:text-green-800">Input
                                Jadwal &rarr;</a>
                        </div>
                    </div>

                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition duration-200">
                        <div class="p-6">
                            <div class="text-pink-500 mb-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Data Sasaran Warga</h4>
                            <p class="text-sm text-gray-600 mb-4">Pencatatan riwayat pemeriksaan Balita dan Ibu Hamil.
                            </p>
                            <a href="#"
                                class="text-emerald-600 text-sm font-semibold hover:text-emerald-800">Kelola Data
                                &rarr;</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
