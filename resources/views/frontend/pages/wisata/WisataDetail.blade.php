@extends('layouts.app')

@section('title', $item->judul)

@section('content')

@php
$rating = 0;
foreach ($reviews as $review) {
$rating += round($review->rating / count($reviews), 1);
}
@endphp

<section class="container mx-auto px-4 xl:px-0 mt-20">
  <ul class="flex gap-3">
    <li><a class="hover:text-color1 transition-colors" href="{{ route('user.home') }}">Home</a></li>
    <li><i class="fas fa-chevron-right text-xs"></i></li>
    <li><a class="hover:text-color1 transition-colors" href="{{ route('user.wisata.index') }}">Object Wisata</a></li>
    <li><i class="fas fa-chevron-right text-xs"></i></li>
    <li class="font-medium">{{ $item->judul }}</li>
  </ul>
</section>

<section class="container mx-auto px-4 xl:px-0 my-10">
  <div class="grid grid-cols-2 gap-10 bg-white p-5 border shadow rounded-md">

    <div>
      <div id="my-keen-slider" class="keen-slider">
        @foreach ($item->galleries as $galeri)
        <div class="keen-slider__slide cursor-pointer">
          <img src="{{ url('storage/wisata', $galeri->image) }}" alt="{{ $item->judul }}">
        </div>
        @endforeach
      </div>
      <div id="thumbnails" class="keen-slider thumbnail mt-3">
        @foreach ($item->galleries as $galeri)
        <div class="keen-slider__slide border">
          <img src="{{ url('storage/wisata', $galeri->image) }}" alt="{{ $item->judul }}">
        </div>
        @endforeach
      </div>
    </div>

    <div>
      <div class="flex justify-between items-center">
        <h3 class="font-bold text-2xl">{{ $item->judul }}</h3>
        <span class="bg-color2 rounded-md px-3 py-1 text-white flex items-center gap-3"><i
            class="fas fa-star text-sm"></i> {{ $rating }}</span>
      </div>
      <div class="my-8 leading-relaxed desc">{!! $item->deskripsi !!}</div>

      <div class="mt-5">
        <h6 class="font-medium mb-2 underline">Informasi Lainnya</h6>
        <table>
          <tbody>
            <tr class="flex gap-3">
              <th class="whitespace-nowrap">Jenis :</th>
              <td>{{ $item->jenis }}</td>
            </tr>
            <tr class="flex gap-3">
              <th class="whitespace-nowrap">No. Hp :</th>
              <td>{{ $item->hp ?? '-' }}</td>
            </tr>
            <tr class="flex gap-3">
              <th class="whitespace-nowrap">Alamat :</th>
              <td>{{ $item->alamat }}</td>
            </tr>
          </tbody>
        </table>

        <a href="{{ $item->maps }}"
          class="bg-color2 hover:bg-color1 text-white rounded-md px-5 py-2 mt-5 inline-flex items-center gap-3"><i
            class="fas fa-location-arrow"></i> Lihat Peta</a>
      </div>
    </div>
  </div>
</section>

<section class="container mx-auto px-4 xl:px-0 mb-5">
  <div class="bg-white p-5 border shadow rounded-md">
    <h4 class="font-medium text-xl border-b pb-5">Beri Ulasan</h4>

    @auth
    <form action="{{ route('user.wisata.review', $item->id) }}" method="post">
      @csrf

      <div class="my-5">
        <label class="block font-medium mb-3">Beri rating:</label>
        <div class="flex gap-3">
          <div class="flex items-center gap-2">
            <input class="text-color1" type="radio" name="rating" id="rating-1" value="1">
            <label class="flex items-center" for="rating-1">
              <i class="fas fa-star text-sm text-yellow-500"></i>
            </label>
          </div>

          <div class="flex items-center gap-2">
            <input class="text-color1" type="radio" name="rating" id="rating-2" value="2">
            <label for="rating-2" class="flex items-center">
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
            </label>
          </div>

          <div class="flex items-center gap-2">
            <input class="text-color1" type="radio" name="rating" id="rating-3" value="3">
            <label for="rating-3" class="flex items-center">
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
            </label>
          </div>

          <div class="flex items-center gap-2">
            <input class="text-color1" type="radio" name="rating" id="rating-4" value="4">
            <label for="rating-4" class="flex items-center">
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
            </label>
          </div>

          <div class="flex items-center gap-2">
            <input class="text-color1" type="radio" name="rating" id="rating-5" value="5">
            <label for="rating-5" class="flex items-center">
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
              <i class="fas fa-star text-sm text-yellow-500"></i>
            </label>
          </div>
        </div>
      </div>

      <div>
        <textarea rows="3" class="w-6/12 resize-none rounded-md focus:border-color2" name="komentar"
          placeholder="Ceritakan pengalaman kamu disini"></textarea>
      </div>

      <button type="submit"
        class="bg-color2 hover:bg-color1 inline-block transition-colors px-3 py-2 rounded-md mt-3 text-white">Kirim
        Ulasan</button>

    </form>

    @else
    <div class="my-5 text-center">
      <p class="text-gray-600">Silahkan Login untuk memberi Ulasan</p>
      <a href="{{ route('login') }}" class="mt-3 inline-block border border-color1 py-2 px-6 rounded-md hover:bg-color1 hover:text-white transition-colors">Login</a>
    </div>
    @endauth
  </div>
</section>

<section class="container mx-auto px-4 xl:px-0 mb-20">
  <div class="bg-white p-5 border shadow rounded-md">
    <h4 class="font-medium text-xl border-b pb-5">{{ count($reviews) }} Ulasan</h4>

    @foreach ($reviews as $review)
    <div class="mt-8 border p-4">
      <div>
        <div class="flex flex-col gap-y-0.5">
          <h6 class="font-medium">{{ $review->user->name }}</h6>
          <div>
            @for ($i = 0; $i < $review->rating; $i++)
              <i class="fas fa-star text-xs text-yellow-400"></i>
              @endfor
          </div>
        </div>
      </div>
      <p class="leading-relaxed mt-3">{{ $review->komentar }}</p>
    </div>
    @endforeach
  </div>
</section>
@endsection

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/keen-slider@6.3.5/keen-slider.min.css" />
<style>
  .thumbnail .keen-slider__slide.active {
    border: 2px solid #1EC6B6;
  }

  .desc p {
    margin: .5em 0;
  }
</style>
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/keen-slider@6.3.5/keen-slider.min.js"></script>
<script>
  function ThumbnailPlugin(main) {
    return (slider) => {
      function removeActive() {
        slider.slides.forEach((slide) => {
          slide.classList.remove("active")
        })
      }
      function addActive(idx) {
        slider.slides[idx].classList.add("active")
      }

      function addClickEvents() {
        slider.slides.forEach((slide, idx) => {
          slide.addEventListener("click", () => {
            main.moveToIdx(idx)
          })
        })
      }

      slider.on("created", () => {
        addActive(slider.track.details.rel)
        addClickEvents()
        main.on("animationStarted", (main) => {
          removeActive()
          const next = main.animator.targetIdx || 0
          addActive(main.track.absToRel(next))
          slider.moveToIdx(next)
        })
      })
    }
  }
  var slider = new KeenSlider("#my-keen-slider")
  var thumbnails = new KeenSlider(
    "#thumbnails",
    {
      initial: 0,
      slides: {
        perView: 4,
        spacing: 10,
      },
    },
    [ThumbnailPlugin(this.slider)]
  )
</script>
@endpush