@extends('index')

@section('title', 'Bogor Culinary - review')

@section('page-title', 'Review')

@section('content')

<style>
    .justify-text {
        text-align: justify;
    }
</style>

<div class="card my-4">
    <h5 class="card-header">Leave a Comment</h5>
    <div class="card-body">
        <form action="{{ route('review.store') }}" method="post">
            @csrf
            <div class="form-group">
                <p>Nama :</p>
                <input class="form-control" type="text" name="nama" required>
            </div>
            <div class="form-group">
                <p>Nama Makanan :</p>
                <input class="form-control" type="text" name="nama_makanan" required>
            </div>
            <div class="form-group">
                <p>Comment :</p>
                <textarea class="form-control" name="comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<div class="container row w-100 d-flex justify-content-between">
    @foreach ($reviews as $review)
    <div class="col-4 p-2 mb-3">
        <div class="card w-100">
            <div class="card-body">
              <h5 class="card-header">{{ $review->nama }}</h5>
              <h6 class="card-subtitle mb-4 mt-4 text-muted">{{ $review->nama_makanan }}</h6> 
              <p class="card-text mb-3 justify-text">{{ $review->comment }}</p> 
              <form action="{{ route('reviews.destroy', $review->id) }}" method="post" onsubmit="return confirm('Apakah kamu ingin menghapusnya?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
