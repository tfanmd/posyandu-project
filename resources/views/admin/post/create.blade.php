<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Konten Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Judul Konten</label>
                            <input type="text" name="judul" value="{{ old('judul') }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('judul')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tipe Konten</label>
                                <select name="tipe" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="artikel" {{ old('tipe') == 'artikel' ? 'selected' : '' }}>Artikel
                                        Edukasi</option>
                                    <option value="berita" {{ old('tipe') == 'berita' ? 'selected' : '' }}>Berita
                                        Posyandu</option>
                                    <option value="pengumuman" {{ old('tipe') == 'pengumuman' ? 'selected' : '' }}>
                                        Pengumuman</option>
                                </select>
                                @error('tipe')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status Publikasi</label>
                                <select name="status" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published (Tayang ke Publik)</option>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft
                                        (Simpan Sementara)</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar Thumbnail (Opsional)</label>
                            <input type="file" name="gambar_thumbnail" accept="image/jpeg, image/png, image/jpg"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                            @error('gambar_thumbnail')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Isi Konten</label>
                            <textarea name="konten" rows="10" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('konten') }}</textarea>
                            @error('konten')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4 mt-2">
                            <a href="{{ route('admin.post.index') }}"
                                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</a>
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 shadow-md transition font-bold">Simpan
                                Konten</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
