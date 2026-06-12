<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Akun Kader') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('admin.kader.update', $kader->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div class="border-b pb-4 mb-4">
                            <h3 class="text-lg font-bold text-emerald-600 mb-4">Informasi Akun (Login)</h3>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $kader->name) }}" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email', $kader->email) }}" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Reset Password (Opsional)</label>
                                <input type="password" name="password"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-emerald-600 mb-4">Informasi Profil Kader</h3>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Jabatan di Posyandu</label>
                                <select name="jabatan" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                                    <option value="Ketua"
                                        {{ $kader->kaderProfile->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                    <option value="Sekretaris"
                                        {{ $kader->kaderProfile->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris
                                    </option>
                                    <option value="Bendahara"
                                        {{ $kader->kaderProfile->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara
                                    </option>
                                    <option value="Anggota"
                                        {{ $kader->kaderProfile->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota
                                    </option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp/HP</label>
                                <input type="text" name="no_hp"
                                    value="{{ old('no_hp', $kader->kaderProfile->no_hp) }}" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat" rows="3" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">{{ old('alamat', $kader->kaderProfile->alamat) }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 mt-6">
                            <a href="{{ route('admin.kader.index') }}"
                                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 shadow-md transition font-bold">Update
                                Data Kader</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
