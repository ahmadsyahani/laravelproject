@extends('admin.template.app')

@section('title', 'Master Project - ' . $project->siswa->name)

@section('content')
    <div class="col mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between mb-4">
                    <h4>Ubah project siswa</h4>
                    <a href="{{ route('project.index') }}" class="btn btn-danger">
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
                <form action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nama Project</label>
                            <input type="text" class="form-control"
                                value="{{ old('project_name', $project->project_name) }}" id="project_name"
                                name="project_name" placeholder="Nama Project">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Tanggal Project</label>
                            <input type="text" class="form-control"
                                value="{{ old('project_date', $project->project_date) }}" id="project_date"
                                name="project_date" placeholder="Tanggal Project">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="file" name="file"
                                data-default-file="{{ asset('storage/project/' . $project->foto) }}">
                              <img src="{{ asset('storage/project/' . $project->photo) }}" style="width: 30%" alt="">  
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
