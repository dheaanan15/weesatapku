@extends('layouts.app')

@section('title', $item->judul)
    
@section('content')
<section class="container mx-auto px-4 xl:px-0 mt-20">
    <ul class="flex gap-3">
      <li><a class="hover:text-color1 transition-colors" href="{{ route('user.home') }}">Home</a></li>
      <li><i class="fas fa-chevron-right text-xs"></i></li>
      <li><a class="hover:text-color1 transition-colors" href="{{ route('user.article.index') }}">Artikel</a></li>
      <li><i class="fas fa-chevron-right text-xs"></i></li>
      <li class="font-medium">{{ $item->judul }}</li>
    </ul>
  </section>

    <section class="container mx-auto px-4 xl:px-0 mt-10">
        <div class="grid grid-cols-3 gap-10 mb-20">
            <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-2xl border shadow rounded-md py-4 px-8 col-span-2">

                <h5 class="font-bold text-2xl">{{ $item->judul }}</h5>
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

                <article class="mt-10 article text-lg prose-img:text-center">
                    {!! $item->body !!}
                </article>
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
    </section>
@endsection

@push('style')
<link
rel="stylesheet"
href="https://unpkg.com/@tailwindcss/typography@0.2.x/dist/typography.min.css"
/>

<style>
    .article img {
        width: 100%;
        height: auto;
    }
</style>
@endpush