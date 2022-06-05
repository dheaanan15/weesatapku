@extends('layouts.backend')

@section('title', 'Object Wisata')

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
          <a href="{{ route('admin.wisata.create') }}" class="btn btn-primary float-right mb-3">+ Tambah Object
            Wisata</a>
        </div>
        <table class="table table-striped border">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Thumbnail</th>
              <th scope="col">Judul</th>
              <th scope="col">Jenis</th>
              <th scope="col">Alamat</th>
              <th class="text-nowrap" scope="col">No. Hp</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($wisatas as $wisata)
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              <td><img src="{{ url('storage/wisata', $wisata->thumbnail) }}" class="img-fluid" alt="{{ $wisata->judul }}" width="150"></td>
              <td>{{ $wisata->judul }}</td>
              <td>{{ $wisata->jenis }}</td>
              <td class="text-wrap">{{ $wisata->alamat }}</td>
              <td>{{ $wisata->hp }}</td>
              <td class="d-flex">
                <a href="{{ route('user.wisata.show', $wisata->slug) }}" target="_blank" class="btn btn-sm btn-secondary mr-1"><i class="fas fa-eye"></i></a>
                <a href="{{ route('admin.wisata.edit', $wisata->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.wisata.destroy', $wisata->id) }}" method="POST">
                  @csrf
                  @method('delete')

                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
              </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="p-3 text-center text-secondary">Object Wisata belum tersedia</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection