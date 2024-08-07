@extends('admin.home')

@section('content')
    <div class="container">
        <h2>Edit Item</h2>
        <form action="{{ route('admin.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $item->lokasi }}" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control-file">
                @if ($item->gambar)
                    <img src="{{ Storage::url('public/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}" style="width:100px;" class="img-thumbnail mt-2">
                @endif
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
