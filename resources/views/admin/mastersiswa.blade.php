@extends('admin.admin')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')

    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:inline-block;">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
        @endif
        <div class="col-lg-12">
            <div class="card border-0">
                <div class="card-header">
                    <a href="{{ route('siswa.create') }}" class="btn btn-outline-success">
                        <i class="bi bi-plus-circle"></i>
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">About</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ Str::substr($data->about, 0, 50) }} ... </td>
                                    <td><img width="150px" class="img-thumbnail" src="{{ asset('storage/' . $data->photo) }}" alt=""></td>
                                    <td>
                                        <div class="d-flex"  style="gap:3px">
                                            <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-outline-info">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            {{-- Hapus --}}
                                            <form action="{{ route('siswa.delete', $data->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini? ')">
                                                    <i class="fas fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                            {{-- End Hapus --}}
                                        </div>
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