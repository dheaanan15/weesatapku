@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="mb-16">
    <div class="bg-cover bg-no-repeat flex flex-col items-center justify-center bg-center"
        style="background-image: url('{{ url('img/header.jpg') }}')">
        <div class="bg-black bg-opacity-30 w-full h-full p-60 text-center text-white flex flex-col gap-3">
            <h1 class="font-bold text-5xl">WeesataPku</h1>
            <p class="leading-relaxed">Informasi Wisata Pekanbaru</p>

            <form action="{{ route('user.wisata.index') }}" method="GET" class="inline-flex items-center">
                <input type="search" name="q" id="search"
                    class="focus:outline-none focus:border-color1 py-2 px-3 text-color3 w-full rounded-l-md"
                    placeholder="Mau Wisata Kemana?">

                <button type="submit" class="flex w-auto px-3 py-2 rounded-r-md items-center gap-3 bg-color1"><i
                        class="fas fa-search"></i> Cari</button>
            </form>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 xl:px-0">
    <h4 class="font-medium text-3xl text-center">Destinasi Wisata Populer</h4>
    <p class="leading-relaxed text-center text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, minima accusamus! Dolorem praesentium quo molestias.</p>
    <div class="grid grid-cols-3 gap-10 mt-10">
        @foreach ($populars as $item)
            @include('frontend.partials.wisata-card')
        @endforeach
    </div>
</section>

<section class="container mx-auto px-4 xl:px-0 my-20">
    <h4 class="font-medium text-3xl text-center">Temukan Destinasi Menarik di Pekanbaru</h4>
    <p class="leading-relaxed text-center text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, minima accusamus! Dolorem praesentium quo molestias.</p>
    <div class="grid grid-cols-3 gap-10 mt-10">
        @foreach ($items as $item)
            @include('frontend.partials.wisata-card')
        @endforeach
    </div>
    <a href="{{ route('user.wisata.index') }}" class="inline-flex float-right px-6 py-2 mt-5 border border-color1 rounded-md text-color1 font-medium hover:bg-color1 hover:text-white hover:border-opacity-0 transition-all items-center gap-2">Lihat Semua Object Wisata <i class="fas fa-long-arrow-alt-right text-lg"></i></a>
</section>

<section class="container mx-auto px-4 xl:px-0 my-20">
    <h4 class="font-medium text-3xl text-center">Informasi Menarik dari Pekanbaru</h4>
    <p class="leading-relaxed text-center text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, minima accusamus! Dolorem praesentium quo molestias.</p>
    <div class="grid grid-cols-4 gap-6 mt-10">
        @foreach ($articles as $item)
        <div class="bg-white rounded overflow-hidden shadow">
            <div>
                <img src="{{ url('storage/artikel', $item->thumbnail) }}" alt="{{ $item->judul }}">
            </div>
        
            <div class="py-4 px-3">
                <p class="text-gray-400 text-sm mb-1 flex items-center gap-1"><i class="far fa-clock"></i> {{ date_format($item->created_at, 'd F Y') }}</p>
                <a href="{{ route('user.article.show', $item->slug) }}"><h5 class="font-bold hover:text-color1 transition-colors items-center gap-2">{{ Str::limit($item->judul, 50) }}</h5></a>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('user.article.index') }}" class="inline-flex float-right px-6 py-2 mt-5 border border-color1 rounded-md text-color1 font-medium hover:bg-color1 hover:text-white hover:border-opacity-0 transition-all items-center gap-2">Lihat Semua Artikel <i class="fas fa-long-arrow-alt-right text-lg"></i></a>
</section>
@endsection