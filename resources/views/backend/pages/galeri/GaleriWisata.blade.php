@extends('layouts.backend')

@section('title', 'Galeri Wisata')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if($message = Session::get('destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->wisata->judul }}</td>
                            <td><img src="{{ url('storage/wisata', $item->image) }}" class="img-fluid"
                                    alt="{{ $item->wisata->judul }}" width="150"></td>
                            <td>
                                <form action="{{ route('admin.galeri-wisata.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center"><i class="fas fa-trash mr-2"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-secondary">Galeri Wisata belum tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection