@extends('layouts.backend')

@section('title', 'Artikel')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif ($message = Session::get('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif($message = Session::get('destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div>
                    <a href="{{ route('admin.article.create') }}" class="btn btn-primary float-right mb-3">+ Tambah
                        Artikel</a>
                </div>

                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><img src="{{ url('storage/artikel', $item->thumbnail) }}" class="img-fluid"
                                    alt="{{ $item->judul }}" width="150"></td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route('user.wisata.show', $item->slug) }}" target="_blank"
                                    class="btn btn-sm btn-secondary mr-1"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.article.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.article.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-3 text-center">Artikel belum tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection