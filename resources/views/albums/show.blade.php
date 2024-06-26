@extends('layouts.app')

@section('content')

<style>
    .card {
        width: 250px;
        /* Ubah lebar card sesuai kebutuhan */
        margin-bottom: 20px;
        /* Atur margin bawah card */
    }

    .card .card-img-top {
        height: 200px;
        /* Ubah tinggi gambar sesuai kebutuhan */
    }

    .card-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        /* Mengatur lebar card */
        gap: 10px;
        /* Mengatur jarak antara card */
    }

    .header-title {
        text-align: center;
        /* Menempatkan teks ke tengah */
        margin-top: 20px;
        /* Menambahkan ruang atas */
    }

</style>

<div class="content-wrapper">
    <!-- Section Header -->
    <section class="text-center container">
        <div class="row py-lg-5 shad">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$album->name}}</h1>
                <p class="lead text-muted">{{$album->description}}</p>
                <p>
                    <a href="/photo/upload/{{$album->id}}" class="btn btn-primary my-2">Upload Photo</a>
                    <a href="/albums" class="btn btn-secondary my-2">Back</a>
                </p>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Photo Gallery -->
        @if (count($album->photos) > 0)
        <div class="row card-wrapper">
            @foreach ($album->photos as $photo)
            <div class="col text-dark">
                <div class="shadow card">
                    <!-- Photo -->
                    <a href="{{route('photos.show' , $photo->id)}}" class=" text-dark">
                        <img src="/storage/albums/{{$album->id}}/{{$photo->photo}}" height="250px" class="card-img-top"
                            alt="photo Image">
                    </a>
                    <form class="position-absolute top-0 end-0 m-3" id="like-form-{{$photo->id}}" method="POST"
                        action="{{ route('likes.toggle', $photo->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">❤</button>
                    </form>
                    <div class="card-body">
                        <h5 class="card-title">{{$photo->title}}</h5>
                        <p class="card-text">{{$photo->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>No photos to display</p>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Saat dokumen dimuat, periksa apakah pengguna telah memberikan "like" pada setiap foto
        @foreach($album->photos as $photo)
        $.ajax({
            url: "{{ route('likes.check', $photo->id) }}",
            type: "GET",
            success: function (response) {
                if (response.liked) {
                    // Jika sudah dilike, sembunyikan tombol Like
                    $('#like-form-{{$photo->id}}').hide();
                }
            }
        });
        @endforeach

        // Event handler untuk form Like
        $('form[id^="like-form"]').submit(function (event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default
            var form = $(this);
            var url = form.attr('action');

            // Kirim permintaan AJAX
            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function (response) {
                    // Tampilkan pesan dari respons
                    alert(response.message);

                    // Perbarui tampilan tombol
                    form.hide();
                    form.siblings('.unlike-form').show();
                },
                error: function (xhr) {
                    // Tangani kesalahan
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });

        // Event handler untuk form Unlike
        $('form[id^="unlike-form"]').submit(function (event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default
            var form = $(this);
            var url = form.attr('action');

            // Kirim permintaan AJAX
            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize(),
                success: function (response) {
                    // Tampilkan pesan dari respons
                    alert(response.message);

                    // Perbarui tampilan tombol
                    form.hide();
                    form.siblings('.like-form').show();
                },
                error: function (xhr) {
                    // Tangani kesalahan
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });
    });

</script>
@endsection
