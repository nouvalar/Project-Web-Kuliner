@extends('admin.home')

@section('title', 'Bogor Culinary - Admin')

@section('page-title', 'Admin')

@section('content')
<div class="container mt-5">
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
        </div>
        <div class="form-group mb-3">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
        </div>
        <div class="form-group mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori">
        </div>
        <div class="form-group mb-3">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <ul class="list-group mt-4">
        @foreach ($items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $item->judul }}</strong> - {{ $item->nama }} - {{ $item->lokasi }} - {{ $item->kategori }}
                    <img src="{{ Storage::url('public/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}" style="width:50px;" class="img-thumbnail ml-3">
                </div>
                <div>
                    <a href="{{ route('admin.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.delete', ['id' => $item->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection