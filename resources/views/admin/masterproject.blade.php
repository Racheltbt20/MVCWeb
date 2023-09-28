@extends('admin.admin')
@section('title', 'Master Project')
@section('content-title', 'Master Project')
@section('content')

    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block;">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
        @endif
        <div class="col-5">
            <div class="card shadow">
                <div class="card-header">
                    <h6>Data Siswa</h6>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-striped ">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" onclick="show({{ $siswa->id }})">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                                <a class="btn btn-success btn-sm" href="{{ route('project.add', $siswa->id) }}">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card shadow">
                <div class="card-header">
                    <h6>List Project</h6>
                </div>
                <div id="project" class="card-body">
                    <h6 class="text-center">Silahkan pilih siswa terlebih dahulu</h6>
                </div>
            </div>
        </div>
    </div>

    <script>
        function show(id) {
            $.get('project/' +id, function(data) {
                $('#project').html(data);
            });
        }
    </script>

@endsection
