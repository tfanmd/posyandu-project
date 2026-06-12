<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Publikasi & Artikel') }}
            </h2>
            <a href="{{ route('admin.post.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                + Tulis Konten Baru
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
                                <th scope="col" class="px-6 py-3">Judul Konten</th>
                                <th scope="col" class="px-6 py-3">Kategori</th>
                                <th scope="col" class="px-6 py-3">Penulis</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ Str::limit($post->judul, 50) }}
                                    </td>
                                    <td class="px-6 py-4 capitalize">{{ $post->tipe }}</td>
                                    <td class="px-6 py-4">{{ $post->author->name ?? 'Sistem' }}</td>
                                    <td class="px-6 py-4">
                                        @if ($post->status == 'published')
                                            <span
                                                class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded border border-green-400">Published</span>
                                        @else
                                            <span
                                                class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded border border-gray-400">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('admin.post.edit', $post->id) }}"
                                            class="font-medium text-blue-600 hover:text-blue-800 mr-3">Edit</a>

                                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-800"
                                                onclick="return confirm('Hapus konten ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada publikasi
                                        konten.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
