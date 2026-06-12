<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Sasaran Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('kader.warga.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                    placeholder="Nama sesuai KK/KTP/KIA"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                @error('nama_lengkap')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">NIK (Opsional)</label>
                                <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16"
                                    placeholder="Kosongkan jika belum punya NIK"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                @error('nik')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                        required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                        <option value="">-- Pilih --</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Kategori Sasaran</label>
                                <select name="kategori" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="balita" {{ old('kategori') == 'balita' ? 'selected' : '' }}>Balita /
                                        Anak</option>
                                    <option value="ibu_hamil" {{ old('kategori') == 'ibu_hamil' ? 'selected' : '' }}>
                                        Ibu Hamil</option>
                                    <option value="lansia" {{ old('kategori') == 'lansia' ? 'selected' : '' }}>Lansia
                                    </option>
                                    <option value="umum" {{ old('kategori') == 'umum' ? 'selected' : '' }}>Umum / PUS
                                        / WUS</option>
                                </select>
                                @error('kategori')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nama Orang Tua / Wali
                                    (Opsional)</label>
                                <input type="text" name="nama_orang_tua_wali"
                                    value="{{ old('nama_orang_tua_wali') }}" placeholder="Diisi jika kategori Balita"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nomor HP / WhatsApp
                                    (Opsional)</label>
                                <input type="text" name="no_hp_kontak" value="{{ old('no_hp_kontak') }}"
                                    placeholder="08..."
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea name="alamat" rows="2" required placeholder="Contoh: RT 01 RW 05, No. 12"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="flex justify-end gap-4 mt-6 border-t pt-4">
                        <a href="{{ route('kader.warga.index') }}"
                            class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                        <button type="submit"
                            class="bg-pink-600 text-white px-6 py-2 rounded-md hover:bg-pink-700 shadow-md transition font-bold">Simpan
                            Data</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
