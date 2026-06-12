<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('author')->latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:artikel,berita,pengumuman',
            'status' => 'required|in:draft,published',
            'konten' => 'required',
            'gambar_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar_thumbnail')) {
            // Upload ke folder 'public/thumbnails'
            $imagePath = $request->file('gambar_thumbnail')->store('thumbnails', 'public');
        }

        Post::create([
            'user_id' => Auth::id(), // Diambil otomatis dari akun yang sedang login
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul . '-' . Str::random(5)), // Generate URL ramah SEO
            'tipe' => $request->tipe,
            'konten' => $request->konten,
            'status' => $request->status,
            'gambar_thumbnail' => $imagePath,
        ]);

        return redirect()->route('admin.post.index')->with('success', 'Konten berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:artikel,berita,pengumuman',
            'status' => 'required|in:draft,published',
            'konten' => 'required',
            'gambar_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul . '-' . Str::random(5)),
            'tipe' => $request->tipe,
            'konten' => $request->konten,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar_thumbnail')) {
            if ($post->gambar_thumbnail) {
                Storage::disk('public')->delete($post->gambar_thumbnail);
            }
            // Upload gambar baru dan simpan path-nya
            $data['gambar_thumbnail'] = $request->file('gambar_thumbnail')->store('thumbnails', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.post.index')->with('success', 'Konten berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if ($post->gambar_thumbnail) {
            Storage::disk('public')->delete($post->gambar_thumbnail);
        }

        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Konten berhasil dihapus!');
    }
}
