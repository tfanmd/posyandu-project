<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Jadwal Kegiatan Posyandu') }}
            </h2>
            <a href="{{ route('kader.jadwal.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                + Tambah Jadwal
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
                                <th scope="col" class="px-6 py-3">Nama Kegiatan</th>
                                <th scope="col" class="px-6 py-3">Waktu Pelaksanaan</th>
                                <th scope="col" class="px-6 py-3">Lokasi</th>
                                <th scope="col" class="px-6 py-3">Sasaran</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwals as $jadwal)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-bold text-gray-900">
                                        {{ $jadwal->nama_kegiatan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('d M Y, H:i') }}
                                        <br><span class="text-xs text-gray-400">s/d
                                            {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}</span>
                                    </td>
                                    <td class="px-6 py-4">{{ $jadwal->lokasi }}</td>
                                    <td class="px-6 py-4 capitalize">
                                        {{ str_replace('_', ' ', $jadwal->kategori_sasaran) }}</td>
                                    <td class="px-6 py-4">
                                        @if ($jadwal->status == 'akan_datang')
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded border border-blue-400">Akan
                                                Datang</span>
                                        @elseif($jadwal->status == 'berlangsung')
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded border border-yellow-400">Berlangsung</span>
                                        @else
                                            <span
                                                class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded border border-gray-400">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('kader.jadwal.edit', $jadwal->id) }}"
                                            class="font-medium text-blue-600 hover:text-blue-800 mr-3">Edit</a>

                                        <form action="{{ route('kader.jadwal.destroy', $jadwal->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-800"
                                                onclick="return confirm('Hapus agenda kegiatan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada jadwal
                                        kegiatan yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
