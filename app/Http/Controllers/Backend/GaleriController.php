<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function wisataGaleri() {

        $items = Gallery::with('wisata')->where('tipe', '=', 'wisata')->orderBy('created_at', 'desc')->get();

        return view('backend.pages.galeri.GaleriWisata', [
            'items' => $items
        ]);
    }

    public function wisataGaleriDestroy($id) {
        $item = Gallery::find($id);

        unlink(public_path('storage/wisata/') . $item->image);

        $item->delete();

        return redirect()->route('admin.galeri-wisata.index')->with('destroy', 'Gambar berhasil dihapus');
    }
}
