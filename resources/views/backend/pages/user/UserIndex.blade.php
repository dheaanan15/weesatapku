@extends('layouts.backend')

@section('title', 'Daftar User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if ($message = Session::get('destroy'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->isAdmin ? 'Administrator' : 'User' }}</td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center"><i class="fas fa-trash mr-2"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection