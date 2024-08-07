@extends('index')

@section('title', 'Bogor Culinary - Home')
<link href="{{ asset('/assets/css/main1.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

@section('content')
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">Banyaknya Wisata Kuliner<br>di Kota Hujan</h2>
                    <p data-aos="fade-up" data-aos-delay="100">"Kota Hujan, surga kuliner dengan beragam hidangan lezat dari
                        warung tradisional hingga restoran modern, memanjakan pengunjung dengan kekayaan cita rasa lokal."
                    </p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a class="btn-book-a-table">Let's Journey!</a>
                        <a href="https://www.youtube.com/watch?v=IuGvIxKiN18&pp=ygUNa3VsaW5lciBib2dvcg%3D%3D"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('/assets/img/tugu_kujang.png') }}" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Home Section -->

    <main id="main">

        <!-- ======= Doclang Mantarena ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Kuliner Lagendaris</h2>
                    <p>di Jembatan <span>Merah</span></p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-7 position-relative about-img"
                        style="background-image: url('{{ asset('assets/img/gerobak_doclang_mantarena.png') }}'); background-size: cover;"
                        data-aos="fade-up" data-aos-delay="150">
                        <div class="call-us position-absolute">
                            <h4>Doclang Mantarena</h4>
                            <p style="font-size: 22px;">Jl. Mantarena (Jembatan Merah), Telp (0251) 8346260</p>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic" style="text-align: justify;">
                                Doclang adalah salah satu makanan khas dari kota Bogor. Potongan lontong yang disajikan
                                bersama tahu goreng dan kentang rebus, kemudian diguyur bumbu kacang yang khas.
                            </p>
                            <ul>
                                <li> Akses Menuju Lokasi :</li>
                                <li><i class="bi bi-check2-all"></i> Dari Stasiun Kota Bogor : Naik Angkutan Umum 02 jurusan
                                    sukasari - bubulak, turun di Jembatan Merah.</li>
                                <li><i class="bi bi-check2-all"></i> Dari Terminal Baranangsiang : Naik Angkutan Umum 03
                                    jurusan br.siang - bubulak, turun di Jembatan Merah.</li>
                            </ul>
                            <p style="text-align: justify;">
                                Doclang cukup banyak dijajakan di kawasan Jembatan Merah. Salah satunya ada di Jl.
                                Mantarena. Doclang ini hanya dijajakan pada saat sarapan, biasanya menjelang siang sudah
                                habis.
                                Lontongnya begitu lembut dan cita rasa bumbunya pas. Untuk yang berwisata kuliner ke Kota
                                Bogor, jangan lupa untuk menikmati sepiring Doclang.
                            </p>

                            <div class="position-relative mt-4">
                                <img src="assets/img/home/picdoclangbgr.jpg" class="img-fluid" alt="">
                                <a href="https://www.youtube.com/watch?v=DXTx096JQ8o&pp=ygUVa3VsaW5lciBib2dvciBkb2NsYW5ndoc"
                                    class="glightbox play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- Doclang Mantarena -->

        <br>
        <div class="container">
            @foreach ($items as $item)
                <div class="food-card" data-id="{{ $item->id }}">
                    <div class="image-container">
                        <img src="{{ Storage::url('gambar/' . $item->gambar) }}" alt="{{ $item->judul }}">
                        <div class="badge new">NEW</div>
                        <button type="button" class="favorite-button" data-id="{{ $item->id }}">
                            <i class="fa fa-hw fa fa-heart"></i>
                        </button>
                    </div>
                    <div class="info">
                        <h3>{{ $item->judul }}</h3>
                        <p class="location">{{ $item->lokasi }}</p>
                        <p class="category">{{ $item->kategori }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- ======= Map Section ======= -->
        <section id="contact" class="contact">
            <div class="container1" data-aos="fade-up">

                <div class="section-header">
                    <h2>Map</h2>
                    <p>Rain of City<span> - Bogor</span></p>
                </div>

                <div class="mb-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126743.69842676005!2d106.66949759999998!3d-6.5962640999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d8c29e07fd%3A0xfbbd6d4d460f8c6c!2sBogor%2C%20Kota%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1627651624691!5m2!1sen!2sid"
                        width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div><!-- End Google Maps -->

    </main><!-- End #main -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteButtons = document.querySelectorAll('.favorite-button');

            loadFavorites();

            favoriteButtons.forEach(el => {
                el.addEventListener('click', function(event) {
                    event.preventDefault();
                    const card = el.closest('.food-card');
                    const itemId = card.getAttribute('data-id');
                    toggleFavorite(itemId);
                    el.classList.toggle('clicked');
                });
            });

            function toggleFavorite(itemId) {
                let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

                if (favorites.includes(itemId)) {
                    favorites = favorites.filter(id => id !== itemId);
                } else {
                    favorites.push(itemId);
                }

                localStorage.setItem('favorites', JSON.stringify(favorites));
            }

            function loadFavorites() {
                const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
                favorites.forEach(itemId => {
                    const button = document.querySelector(
                        `.food-card[data-id="${itemId}"] .favorite-button`);
                    if (button) {
                        button.classList.add('clicked');
                    }
                });
            }
        });
        
        $(document).ready(function() {
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
                        // window.location.href = '/favorit';
                    }
                });
            });
        });
    </script>
@endsection
