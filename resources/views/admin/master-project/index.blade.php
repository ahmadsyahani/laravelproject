@extends('admin.template.app')

@section('title', 'Master Project')

@section('content')
    <div class="row">
        <div class="col-5 mb-4">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <div class="card-title d-flex justify-content-between">
                        <h5>Data Siswa</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <a onclick="show({{ $item->id }})" class="btn btn-info"><i
                                                class="fas fa-folder-open"></i></a>
                                        <a href="{{ route('project.add', $item->id) }}" class="btn btn-success"><i
                                                class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-7 mb-4">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <div class="card-title d-flex justify-content-between text-light">
                        <h5>List Project</h5>
                    </div>
                </div>
                <div class="card-body">
                    <hr>
                    <div id="project" class="text-center">Pilih siswa terlebih dahulu😊</div>
                </div>
            </div>
        </div>

        <script>
            function show(id) {
                $.get('project/' + id, function(data) {
                    $('#project').html(data)
                });
            }
        </script>
    @endsection
