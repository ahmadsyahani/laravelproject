@extends('admin.template.app')

@section('title', 'Master Siswa')

@section('content')
    <div class="col mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between mb-4">
                    <h4>Tambah data siswa</h4>
                    <a href="{{ route('siswa.index') }}" class="btn btn-danger">
                        Kembali
                    </a>
                </div>
                <hr class="mb-4">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $item)
                                <li> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="about" class="form-label">Tentang</label>
                            <input type="text" class="form-control" id="about" name="about"
                                placeholder="Tentang anda">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
