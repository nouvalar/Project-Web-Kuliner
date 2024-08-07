@extends('index')

@section('title', 'Bogor Culinary - Favorit')

@section('page-title', 'Favorit')
<link href="{{ asset('/assets/css/main1.css') }}" rel="stylesheet">

@section('content')
    <div id="favorites">
        <h2>Favorit Saya</h2>
        <div class="container" id="">
            @foreach ($favorites as $favorite)
                @if ($favorite->item)
                    <div class="food-card" data-id="{{ $favorite->item->id }}">
                        <div class="image-container">
                            <img src="{{ Storage::url('gambar/' . $favorite->item->gambar) }}"
                                alt="{{ $favorite->item->judul }}">
                        </div>
                        <div class="info">
                            <h3>{{ $favorite->item->judul }}</h3>
                            <p class="location">{{ $favorite->item->lokasi }}</p>
                            <p class="category">{{ $favorite->item->kategori }}</p>
                        </div>
                        @if ($favorite->user_id === Auth::id())
                            <button class="favorite-button favorite" data-id="{{ $favorite->item->id }}">
                                <i class="fas fa-times"></i>
                            </button>
                        @else
                            <button class="favorite-button not-favorite" data-id="{{ $favorite->item->id }}">
                                <i class="fas fa-times"></i>
                            </button>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Existing code (if any) for handling DOMContentLoaded event

            $(document).ready(function() {
                console.log('Document is ready. jQuery is working.');
                // New favorite button click event handler
                $('.favorite-button').on('click', function() {
                    let id = $(this).data('id');

                    $.ajax({
                        url: '/favorit',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            item_id: id
                        },
                        success: function(response) {
                            console.log(response);

                            // Reload the page after favoriting
                            window.location.href = '/favorit';
                        }
                    });
                });

                // Update favorite button color
                $('.favorite-button').each(function() {
                    let isFavorite = $(this).hasClass('favorite');
                    if (isFavorite) {
                        $(this).css('color', 'red'); // Jika favorit, atur warna menjadi merah
                    } else {
                        $(this).css('color',
                        'black'); // Jika bukan favorit, atur warna menjadi hitam
                    }
                });
            });
        });
    </script>
@endsection
