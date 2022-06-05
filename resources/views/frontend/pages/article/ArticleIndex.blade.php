@extends('layouts.app')

@section('title', 'Semua Artikel')

@section('content')
<section class="container mx-auto px-4 xl:px-0 mt-20">
    <h5 class="font-bold text-3xl border-b-2 pb-5 inline-block border-color2">Temukan Informasi Menarik di Pekanbaru</h5>
</section>
<section class="container mx-auto px-4 xl:px-0 mb-20 mt-10">
        <div class="grid grid-cols-3 gap-10">
            <div class="flex flex-col gap-5 col-span-2">
                @foreach ($articles as $item)
                    <div class="border py-2 px-4 rounded-md flex gap-5 shadow-sm">
                        <img src="{{ url('storage/artikel', $item->thumbnail) }}" alt="{{ $item->judul }}" width="200">
    
                        <div>
                            <h5 class="font-bold text-xl"><a href="{{ route('user.article.show', $item->slug) }}" class="hover:text-color1 transition-all">{{ $item->judul }}</a></h5>
                            <div class="flex gap-4 mt-2">
                                <div class="flex items-center gap-2 text-gray-400 text-sm">
                                    <i class="far fa-clock"></i>
                                    {{ date_format($item->created_at, 'd F Y') }}
                                </div>
            
                                <div class="flex items-center gap-2 text-gray-400 text-sm">
                                    <i class="fas fa-user"></i>
                                    {{ $item->user->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <div class="px-5 pb-4">
                <h5 class="font-medium text-xl border-b-2 pb-3">Rekomendasi Destinasi Pekanbaru</h5>
    
                <div class="flex flex-col gap-3 mt-3">
                    @foreach ($wisatas as $item)
                        <div class="flex items-start gap-3">
                            <img class="rounded-md" src="{{ url('storage/wisata', $item->thumbnail) }}" alt="{{ $item->judul }}" width="120">
    
                            <div>
                                <h5><a href="{{ route('user.wisata.show', $item->slug) }}" class="font-medium hover:text-color1 transition-colors">{{ $item->judul }}</a></h5>
                                <p class="text-xs text-gray-500">{{ $item->alamat }}</p>
                            </div>
                        </div>
    
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    <div class="mt-8">
        {{ $articles->links('vendor.pagination.tailwind') }}
    </div>
</section>
@endsection