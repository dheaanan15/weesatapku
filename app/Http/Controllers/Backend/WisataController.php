<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::getAll();

        return view('backend.pages.wisata.WisataIndex', [
            'wisatas' => $wisatas
        ]);
    }


    public function create()
    {
        return view('backend.pages.wisata.WisataAdd');
    }

    public function store(Request $request)
    {
        $item = $request->all();

        $slug = rand(100, 999) . '-' . Str::slug($item['judul']);

        if ($request->hasFile('thumbnail')) {
            $thumbName = time() . rand(100,999) . '-' .  $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('storage/wisata'), $thumbName);
        } else {
            $thumbName = null;
        }

        Wisata::create([
            'judul' => $item['judul'],
            'slug' => $slug,
            'thumbnail' => $thumbName,
            'jenis' => $item['jenis'],
            'deskripsi' => $item['deskripsi'],
            'alamat' => $item['alamat'],
            'hp' => $item['hp'],
            'maps' => $item['maps'],
        ]);

        $wisata = Wisata::where('slug', $slug)->first();

        if ($request->hasFile('galeri')) {
            foreach ($item['galeri'] as $galeri) {
                $galeriName = time() . rand(100,999) . '-' .  $galeri->getClientOriginalName();
                $galeri->move(public_path('storage/wisata'), $galeriName);

                Gallery::create([
                    'wisata_id' => $wisata->id,
                    'image' => $galeriName,
                    'tipe' => 'wisata'
                ]);
            }
        }

        return redirect()->route('admin.wisata.index')->with('success', 'Object Wisata berhasil ditambahkan');
    }

    public function edit($id)
    {
        $wisata = Wisata::find($id);

        return view('backend.pages.wisata.WisataEdit', [
            'wisata' => $wisata
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $request->all();
        $wisata = Wisata::find($id);

        if ($item['judul'] !== $wisata->name)
        {
            $slug = rand(100, 999) . '-' . Str::slug($item['judul']);
        } else {
            $slug = $wisata->slug;
        }

        if ($request->hasFile('thumbnail')) {
            $thumbName = time() . rand(100,999) . '-' . $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('storage/wisata'), $thumbName);
        } else {
            $thumbName = $wisata->thumbnail;
        }

        $wisata->update([
            'judul' => $item['judul'],
            'slug' => $slug,
            'thumbnail' => $thumbName,
            'jenis' => $item['jenis'],
            'deskripsi' => $item['deskripsi'],
            'alamat' => $item['alamat'],
            'hp' => $item['hp'],
            'maps' => $item['maps'],
        ]);

        if ($request->hasFile('galeri')) {
            foreach ($item['galeri'] as $galeri) {
                $galeriName = time() . rand(100,999) . '-' .  $galeri->getClientOriginalName();
                $galeri->move(public_path('storage/wisata'), $galeriName);

                Gallery::create([
                    'wisata_id' => $wisata->id,
                    'image' => $galeriName,
                    'tipe' => 'wisata'
                ]);
            }
        }

        return redirect()->route('admin.wisata.index')->with('info', 'Object Wisata berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $wisata = Wisata::find($id);

        if ($wisata->thumbnail) {
            unlink(public_path('storage/wisata/') . $wisata->thumbnail);
        }

        $galleries = Gallery::where('wisata_id', $id)->get();
        
        if (count($galleries) > 0) {
            foreach ($galleries as $item) {
                unlink(public_path('storage/wisata/') . $item->image);
            }
        }

        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('destroy', 'Object Wisata berhasil dihapus');
    }
}
