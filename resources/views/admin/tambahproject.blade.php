@extends('admin.admin')
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project - ' .$siswa->name)
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0">
                <div class="card-header">
                    <a href="{{ route('project.index') }}" class="btn btn-outline-info">
                        <i class="bi bi-arrow-bar-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                        <div class="form-group">
                            <label for="project_name">Nama Project</label>
                            <input type="text" name="project_name" id="project_name" class="form-control @error('project_name') is-invalid @enderror" value="{{ old('project_name') }}">
                            @error('project_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="project_date">Tanggal Project</label>
                            <input type="date" name="project_date" id="project_date" class="form-control @error('project_date') is-invalid @enderror" value="{{ old('project_date') }}">
                            @error('project_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input class="btn btn-outline-success mx-2" type="submit" value="Simpan">
                            <input class="btn btn-outline-danger" type="reset" value="Batal">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection