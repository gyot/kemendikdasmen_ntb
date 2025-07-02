@extends('admin.main')

@section('content')
    <div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Daftar Link</h5>
            <a href="{{ route('eksternallink.create') }}" class="btn btn-primary mb-3">+ Tambah Link</a>
            <ul class="list-group">
                @foreach ($items as $item)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            {{ $item->images }}
                            <span class="fw-semibold">{{ $item->title }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ $item->link }}" class="btn btn-outline-primary btn-sm" target="_blank">Kunjungi</a>
                            <a href="{{ route('eksternallink.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('eksternallink.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus link ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
