<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Konten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Judul Konten</label>
                            <input type="text" name="judul" value="{{ old('judul', $post->judul) }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tipe Konten</label>
                                <select name="tipe" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="artikel"
                                        {{ old('tipe', $post->tipe) == 'artikel' ? 'selected' : '' }}>Artikel Edukasi
                                    </option>
                                    <option value="berita" {{ old('tipe', $post->tipe) == 'berita' ? 'selected' : '' }}>
                                        Berita Posyandu</option>
                                    <option value="pengumuman"
                                        {{ old('tipe', $post->tipe) == 'pengumuman' ? 'selected' : '' }}>Pengumuman
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status Publikasi</label>
                                <select name="status" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="published"
                                        {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published
                                        (Tayang ke Publik)</option>
                                    <option value="draft"
                                        {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft (Simpan
                                        Sementara)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar Thumbnail Saat Ini</label>
                            @if ($post->gambar_thumbnail)
                                <div class="mt-2 mb-3">
                                    <img src="{{ asset('storage/' . $post->gambar_thumbnail) }}" alt="Thumbnail"
                                        class="h-32 object-cover rounded shadow">
                                </div>
                            @else
                                <p class="text-sm text-gray-500 italic mb-3">Tidak ada gambar thumbnail.</p>
                            @endif

                            <label class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar_thumbnail" accept="image/jpeg, image/png, image/jpg"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-500 mt-1">Abaikan jika tidak ingin mengganti gambar.</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Isi Konten</label>
                            <textarea name="konten" rows="10" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('konten', $post->konten) }}</textarea>
                        </div>

                        <div class="flex justify-end gap-4 mt-2">
                            <a href="{{ route('admin.post.index') }}"
                                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 shadow-md transition font-bold">Update
                                Konten</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
