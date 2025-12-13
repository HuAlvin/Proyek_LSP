<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{

    public function index(Request $request)
    {
        $query = Pengumuman::with('user');

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $pengumuman = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pengumuman_admin', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'tgl_publish' => 'required|date',
            'status'      => 'required',
            'content'     => 'nullable|array',
            'thumbnail'   => 'nullable|image|max:2048', 
            'content.*.file' => 'nullable|image|max:2048', 
        ]);

        $contentData = [];
        $inputs = $request->input('content');

        if ($inputs && is_array($inputs)) {
            foreach ($inputs as $key => $item) {
                if (!isset($item['type'])) continue;

                if ($item['type'] === 'text') {
                    $contentData[] = [
                        'type' => 'text',
                        'text' => $item['text'] ?? ''
                    ];
                } elseif ($item['type'] === 'image') {
                    $path = null;
                    if ($request->hasFile("content.{$key}.file")) {
                        $path = $request->file("content.{$key}.file")->store('pengumuman', 'public');
                    }

                    $contentData[] = [
                        'type'       => 'image',
                        'image_path' => $path,
                        'caption'    => $item['caption'] ?? ''
                    ];
                }
            }
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('pengumuman/thumbnails', 'public');
        }

        Pengumuman::create([
            'user_id'     => Auth::id(),
            'judul'       => $request->judul,
            'kategori'    => $request->kategori, 
            'tags'        => $request->tags,
            'tgl_publish' => $request->tgl_publish,
            'status'      => $request->status,
            'is_hidden'   => $request->has('is_hidden'),
            'deskripsi'   => json_encode($contentData),
            'gambar'      => $thumbnailPath,
        ]);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman_edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'tgl_publish' => 'required|date',
            'status'      => 'required',
            'content'     => 'nullable|array',
            'thumbnail'   => 'nullable|image|max:2048',
        ]);

        $thumbnailPath = $pengumuman->gambar; 
        if ($request->hasFile('thumbnail')) {
            if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
                Storage::disk('public')->delete($pengumuman->gambar);
            }
            $thumbnailPath = $request->file('thumbnail')->store('pengumuman/thumbnails', 'public');
        }

        $contentData = [];
        $inputs = $request->input('content');

        if ($inputs && is_array($inputs)) {
            foreach ($inputs as $key => $item) {
                if (!isset($item['type'])) continue;

                if ($item['type'] === 'text') {
                    $contentData[] = [
                        'type' => 'text',
                        'text' => $item['text'] ?? ''
                    ];
                } elseif ($item['type'] === 'image') {
                    $path = $item['existing_path'] ?? null; 

                    if ($request->hasFile("content.{$key}.file")) {
                        if ($path && Storage::disk('public')->exists($path)) {
                            Storage::disk('public')->delete($path);
                        }
                        $path = $request->file("content.{$key}.file")->store('pengumuman', 'public');
                    }

                    $contentData[] = [
                        'type'       => 'image',
                        'image_path' => $path,
                        'caption'    => $item['caption'] ?? ''
                    ];
                }
            }
        }

        $pengumuman->update([
            'judul'       => $request->judul,
            'kategori'    => $request->kategori,
            'tags'        => $request->tags,
            'tgl_publish' => $request->tgl_publish,
            'status'      => $request->status,
            'is_hidden'   => $request->has('is_hidden'), 
            'deskripsi'   => json_encode($contentData),
            'gambar'      => $thumbnailPath,
        ]);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        $contents = json_decode($pengumuman->deskripsi, true);
        if (is_array($contents)) {
            foreach ($contents as $item) {
                if (isset($item['type']) && $item['type'] == 'image' && isset($item['image_path'])) {
                    if ($item['image_path'] && Storage::disk('public')->exists($item['image_path'])) {
                        Storage::disk('public')->delete($item['image_path']);
                    }
                }
            }
        }

        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus!');
    }

    public function publicIndex(Request $request)
    {
        $query = Pengumuman::with('user')->where('status', 'aktif');

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        if ($request->has('tag') && $request->tag != '') {
            $query->where('tags', 'like', '%' . $request->tag . '%');
        }

        $featured = $query->clone()->latest()->first();

        $newsQuery = $query->clone()->latest();
        
        if ($featured) {
            $newsQuery->where('id', '!=', $featured->id);
        }
        
        $pengumuman = $newsQuery->paginate(6)->withQueryString();

        $categories = Pengumuman::where('status', 'aktif')
            ->select('kategori', \DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();

        $allTagsString = Pengumuman::where('status', 'aktif')->pluck('tags')->filter()->toArray();
        $tagsList = [];
        foreach ($allTagsString as $tagStr) {
            if ($tagStr) {
                $split = explode(',', $tagStr);
                foreach ($split as $t) {
                    $tagsList[] = trim($t);
                }
            }
        }
        $tags = array_unique($tagsList);

        return view('pengumuman', compact('featured', 'pengumuman', 'categories', 'tags'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::with('user')->where('status', 'aktif')->findOrFail($id);
        
        return view('pengumuman_show', compact('pengumuman'));
    }
}