@extends('layouts.backend')

@section('title', 'Daftar Ulasan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Judul Wisata</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Komentar</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $item)
                            <tr>
                                <th scope="row">{{ $reviews->firstItem() + $loop->index }}</th>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->wisata->judul }}</td>
                                <td>
                                    @for ($i = 0; $i < $item->rating; $i++)
                                    <i class="fas fa-star text-xs text-warning"></i>
                                    @endfor
                                </td>
                                <td>{{ $item->komentar}}</td>
                                <td>{{ date_format($item->created_at, 'd F Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-3 text-center">Review Belum Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3 float-right">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection