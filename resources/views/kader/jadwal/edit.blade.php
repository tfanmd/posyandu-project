<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Agenda Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('kader.jadwal.update', $jadwal->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan"
                                value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                                <input type="datetime-local" name="waktu_mulai"
                                    value="{{ old('waktu_mulai', date('Y-m-d\TH:i', strtotime($jadwal->waktu_mulai))) }}"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                                <input type="datetime-local" name="waktu_selesai"
                                    value="{{ old('waktu_selesai', date('Y-m-d\TH:i', strtotime($jadwal->waktu_selesai))) }}"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Status Pelaksanaan</label>
                                <select name="status" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="akan_datang"
                                        {{ $jadwal->status == 'akan_datang' ? 'selected' : '' }}>Akan Datang</option>
                                    <option value="berlangsung"
                                        {{ $jadwal->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                    <option value="selesai" {{ $jadwal->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </div>

                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Lokasi Pelaksanaan</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi', $jadwal->lokasi) }}"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>

                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Kategori Sasaran</label>
                                <select name="kategori_sasaran" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="balita"
                                        {{ $jadwal->kategori_sasaran == 'balita' ? 'selected' : '' }}>Balita & Anak
                                    </option>
                                    <option value="ibu_hamil"
                                        {{ $jadwal->kategori_sasaran == 'ibu_hamil' ? 'selected' : '' }}>Ibu Hamil
                                    </option>
                                    <option value="lansia"
                                        {{ $jadwal->kategori_sasaran == 'lansia' ? 'selected' : '' }}>Lansia</option>
                                    <option value="umum" {{ $jadwal->kategori_sasaran == 'umum' ? 'selected' : '' }}>
                                        Warga Umum</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Keterangan / Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('deskripsi', $jadwal->deskripsi) }}</textarea>
                        </div>

                        <div class="flex justify-end gap-4 mt-2">
                            <a href="{{ route('kader.jadwal.index') }}"
                                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 shadow-md transition font-bold">Simpan
                                Perubahan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
