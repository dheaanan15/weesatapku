<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public static function index() {
        $articles = Article::with('user')->latest()->get();

        return view('backend.pages.article.ArticleIndex', [
            'articles' => $articles
        ]);
    }

    public static function create() {
        $uniq_id = rand(99,999) . time() . uniqid();

        return view('backend.pages.article.ArticleAdd', [
            'uniq_id' => $uniq_id
        ]);
    }

    public static function store(Request $request) {
        $data = $request->all();

        $slug = rand(100, 999) . '-' . Str::slug($data['judul']);

        if ($request->hasFile('thumbnail')) {
            $thumbName = time() . rand(100,999) . '-' .  $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('storage/artikel'), $thumbName);
        } else {
            $thumbName = null;
        }

        Article::create([
            'user_id' => Auth::user()->id,
            'uniq_id' => $data['uniq_id'],
            'judul' => $data['judul'],
            'slug' => $slug,
            'body' => $data['body'],
            'thumbnail' => $thumbName
        ]);

        return redirect()->route('admin.article.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public static function edit($id) {
        $item = Article::find($id);

        return view('backend.pages.article.ArticleEdit', [
            'item' => $item
        ]);
    }

    public static function update(Request $request, $id) {
        $article = Article::find($id);
        $data = $request->all();

        if ($data['judul'] !== $article->name)
        {
            $slug = rand(100, 999) . '-' . Str::slug($data['judul']);
        } else {
            $slug = $article->slug;
        }

        if ($request->hasFile('thumbnail')) {
            $thumbName = time() . rand(100,999) . '-' . $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('storage/artikel'), $thumbName);
        } else {
            $thumbName = $article->thumbnail;
        }

        $article->update([
            'judul' => $data['judul'],
            'slug' => $slug,
            'body' => $data['body'],
            'thumbnail' => $thumbName
        ]);

        return redirect()->route('admin.article.index')->with('info', 'Artikel berhasil diperbaharui');
    }

    public static function destroy($id) {
        $article = Article::find($id);
        $galleries = Gallery::where('article_uniq', $article->uniq_id)->get();

        if($article->thumbnail) {
            unlink(public_path('storage/artikel/') . $article->thumbnail);
        }

        foreach ($galleries as $gallery) {
            unlink(public_path('storage/artikel/') . $gallery->image);
            $gallery->delete();
        }

        $article->delete();

        return redirect()->route('admin.article.index')->with('destroy', 'Artikel berhasil dihapus');
    }

    public static function upload(Request $request) {

        $data = $request->all();

        if ($request->hasFile('upload')) {
            $filename = time() . rand(100,999) . '-' .  $request->upload->getClientOriginalName();

            $request->upload->move(public_path('storage/artikel'), $filename);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/artikel/' . $filename);
            $msg = 'Gambar berhasil di upload';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            if ($response) {
                Gallery::create([
                    'tipe' => 'article',
                    'article_uniq' => $data['amp;uniq_id'],
                    'image' => $filename
                ]);
            }

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
