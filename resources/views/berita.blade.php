<section id="berita">
    <div class="container py-3">
        <!-- Header -->
        <div class="header-berita text-center">
            <h2 class="fw-bold">Berita SMKN 4 Bogor</h2>
        </div>

        <!-- Berita Cards Row -->
        <div class="row py-5">
            @foreach($beritas as $berita)
            <div class="col-lg-4 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('assets/images/berita1.jpg') }}" class="img-fluid mb-3" alt="">
                    <div class="konten-berita">
                        <p class="mb-3">{{ \Carbon\Carbon::parse($berita->created_at)->format('d/m/Y') }}</p>
                        <h4 class="fw-bold">{{ $berita->judul }}</h4>
                        <p class="text-secondary">#smk4hebat</p>
                        <p>{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
                        <a href="" class="text-decoration-none text-danger">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Footer -->
        <div class="footer-berita text-center">
            <a href="" class="btn btn-outline-danger">Berita Lainnya</a>
        </div>
    </div>
</section>

