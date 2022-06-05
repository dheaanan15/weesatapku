@php
    $review_count = 0;
    $rating_sum = 0;
    $rating = 0;

    foreach ($reviews as $review) {
        if ($item->id === $review->wisata_id) {
            $review_count += 1;
            $rating_sum += $review->rating;
        }
    }

    if ($review_count > 0) {
        $rating = round($rating_sum / $review_count, 1);
    }

@endphp

<div class="bg-white rounded overflow-hidden shadow">
    <div>
        <img src="{{ url('storage/wisata', $item->thumbnail) }}" alt="{{ $item->judul }}">
    </div>

    <div class="py-4 px-3">
        <a href="{{ route('user.wisata.show', $item->slug) }}"><h5 class="font-bold hover:text-color1 transition-colors">{{ $item->judul }}</h5></a>
        <p class="text-gray-400">{{ Str::limit($item->alamat, 40, '...') }}</p>
        <div class="mt-2">
            <div class="flex gap-1 items-center">
                <i class="fas fa-star text-yellow-500"></i>
                <span>{{ $rating }}</span>
                <p class="text-xs text-gray-400 ml-1">
                    ({{ $review_count }} ulasan)
                </p>
            </div>
        </div>
    </div>
</div>