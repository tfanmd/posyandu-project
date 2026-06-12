<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Sasaran Warga') }}
            </h2>
            <a href="{{ route('kader.warga.create') }}"
                class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded shadow">
                + Tambah Warga
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama / NIK</th>
                                <th scope="col" class="px-6 py-3">Kategori</th>
                                <th scope="col" class="px-6 py-3">L/P</th>
                                <th scope="col" class="px-6 py-3">Usia</th>
                                <th scope="col" class="px-6 py-3">Ortu/Wali</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wargas as $warga)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-gray-900">{{ $warga->nama_lengkap }}</p>
                                        <p class="text-xs text-gray-400">{{ $warga->nik ?? 'NIK Kosong' }}</p>
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        <span
                                            class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded border border-indigo-400">
                                            {{ str_replace('_', ' ', $warga->kategori) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ $warga->jenis_kelamin }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }} Thn
                                    </td>
                                    <td class="px-6 py-4">{{ $warga->nama_orang_tua_wali ?? '-' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('kader.warga.edit', $warga->id) }}"
                                            class="font-medium text-blue-600 hover:text-blue-800 mr-3">Edit</a>

                                        <form action="{{ route('kader.warga.destroy', $warga->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-800"
                                                onclick="return confirm('Hapus data warga ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data warga
                                        terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
