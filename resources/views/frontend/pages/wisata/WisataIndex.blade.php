@extends('layouts.app')

@section('title', 'Semua Objek Wisata')

@section('content')

<section class="container mx-auto px-4 xl:px-0 mt-20">
    <h5 class="font-bold text-3xl border-b-2 pb-5 inline-block border-color2">
        {!! $query ? 'Hasil Pencarian: ' . '<span class="text-color1">' . $_GET['q'] . '</span>' : 'Explore Object Wisata Pekanbaru' !!}
    </h5>
</section>
<section class="container mx-auto px-4 xl:px-0 mb-20 mt-10">
    <div class="grid grid-cols-3 gap-10">
        @foreach ($wisatas as $item)
            @include('frontend.partials.wisata-card')
        @endforeach
    </div>
    <div class="mt-8">
        {{ $wisatas->links('vendor.pagination.tailwind') }}
    </div>
</section>
@endsection