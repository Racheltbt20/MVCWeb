@if($data->isEmpty())
    <h6 class="text-center">Siswa belum memiliki Project</h6>

@else 
    @foreach ($data as $item)
        <div class="card mb-3">
            <div class="card-header">
                <h6>{{ $item->project_name }}</h6>
            </div>
            <div class="card-body">
                <h6>Tanggal : </h6>
                <p>{{ $item->project_date }}</p>
                <h6>Photo : </h6>
                <p><img width="150px" class="img-thumbnail" src="{{ asset('storage/' . $item->photo) }}" alt=""></p>
            </div>
            <div class="card-footer justify-content-end d-flex"  style="gap:3px">
                <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-info">
                    <i class="bi bi-pencil-square"></i>
                </a>
                
                {{-- Hapus --}}
                <form action="{{ route('project.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini? ')">
                        <i class="fas fa-light fa-trash"></i>
                    </button>
                </form>
                {{-- End Hapus --}}
            </div>
        </div>
    @endforeach
@endif