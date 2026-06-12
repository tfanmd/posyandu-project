<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Agenda Kegiatan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('kader.jadwal.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required
                                placeholder="Contoh: Penimbangan Rutin & Imunisasi Balita"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            @error('nama_kegiatan')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                                <input type="datetime-local" name="waktu_mulai" value="{{ old('waktu_mulai') }}"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                @error('waktu_mulai')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                                <input type="datetime-local" name="waktu_selesai" value="{{ old('waktu_selesai') }}"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                @error('waktu_selesai')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Lokasi Pelaksanaan</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                                    placeholder="Contoh: Balai Warga RW 05"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                @error('lokasi')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kategori Sasaran</label>
                                <select name="kategori_sasaran" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="">-- Pilih Sasaran --</option>
                                    <option value="balita" {{ old('kategori_sasaran') == 'balita' ? 'selected' : '' }}>
                                        Balita & Anak</option>
                                    <option value="ibu_hamil"
                                        {{ old('kategori_sasaran') == 'ibu_hamil' ? 'selected' : '' }}>Ibu Hamil
                                    </option>
                                    <option value="lansia" {{ old('kategori_sasaran') == 'lansia' ? 'selected' : '' }}>
                                        Lansia</option>
                                    <option value="umum" {{ old('kategori_sasaran') == 'umum' ? 'selected' : '' }}>
                                        Warga Umum</option>
                                </select>
                                @error('kategori_sasaran')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Keterangan / Deskripsi Tambahan
                                (Opsional)</label>
                            <textarea name="deskripsi" rows="4" placeholder="Contoh: Diharapkan membawa buku KIA/KMS..."
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4 mt-2">
                            <a href="{{ route('kader.jadwal.index') }}"
                                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                            <button type="submit"
                                class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 shadow-md transition font-bold">Publikasikan
                                Jadwal</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
