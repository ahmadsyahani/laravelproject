@extends('admin.template.app')

@section('title', 'Master Siswa')

@section('content')
    <div class="col mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between mb-4">
                    <h4>Master Siswa</h4>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                        Tambah Siswa
                    </a>
                </div>
                <div class="table-siswa">
                    <table class="table table-stripped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tentang</th>
                                <th scope="col">Foto</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $i => $s)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->about }}</td>
                                    <td class="w-25 text-center"><img class="w-50"
                                            src="{{ asset('storage/siswa/' . $s->photo) }}">
                                    </td>
                                    <td class="row g-3 d-flex justify-content-center">
                                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ route('siswa.destroy', $s->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
