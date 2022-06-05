@extends('layouts.backend')

@section('title', 'Tambah Object Wisata')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" style="resize: none" id="deskripsi" name="deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept="image/*">
                            <label class="custom-file-label" for="thumbnail">Choose file...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Galeri</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="galeri" name="galeri[]" accept="image/*" multiple>
                            <label class="custom-file-label" for="galeri">Choose file...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" style="resize: none" id="alamat" name="alamat"
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="hp">Nomor Handphone</label>
                        <input type="tel" class="form-control" id="hp" name="hp">
                    </div>

                    <div class="form-group">
                        <label for="maps">Link Google Maps</label>
                        <input type="text" class="form-control" id="maps" name="maps">
                    </div>

                    <div class="mt-3 float-right">
                        <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#deskripsi' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        })
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush