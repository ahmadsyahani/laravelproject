@extends('admin.template.app')

@section('title', 'Master Siswa')

@section('content')
    <div class="col mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between mb-4">
                    <h4>Edit data - <span style="font-weight: 700; color: darkturquoise;">{{ $siswa->name }}</span></h4>
                    <a href="{{ route('siswa.index') }}" class="btn btn-danger">
                        Kembali
                    </a>
                </div>
                <hr class="mb-4">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ old('nama', $siswa->name) }}"
                                id="name" name="name" placeholder="Nama">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="about" class="form-label">Tentang</label>
                            <input type="text" class="form-control" value="{{ old('nama', $siswa->about) }}"
                                id="about" name="about" placeholder="Tentang anda">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo"
                                data-default-file="{{ asset('storage/siswa/' . $siswa->foto) }}">
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
