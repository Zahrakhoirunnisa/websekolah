@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="row align-items-center">
        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-right">
            <div class="position-relative">
                <img src="{{ asset('assets/images/kepsek.jpg') }}" alt="Kepala Sekolah" class="img-fluid rounded-3 shadow" style="width: 100%; max-width: 350px;">
                <div class="position-absolute bottom-0 start-0 bg-primary text-white p-3 rounded-end" style="width: 80%;">
                    <h5 class="mb-1">Drs. Mulya Murprihartono, M.Si</h5>
                    <p class="mb-0 small">Kepala SMK Negeri 4 Bogor</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8" data-aos="fade-left">
            <h2 class="mb-4">Sambutan Kepala Sekolah</h2>
            <p class="lead mb-4">Assalamu'alaikum Wr. Wb.</p>
            <p>Puji syukur kita panjatkan ke hadirat Allah SWT, atas segala limpahan rahmat dan karunia-Nya. Selamat datang di website resmi SMK Negeri 4 Bogor.</p>
            <p>SMK Negeri 4 Bogor merupakan salah satu sekolah kejuruan unggulan di Kota Bogor yang berkomitmen untuk menghasilkan lulusan yang kompeten, berkarakter, dan siap menghadapi tantangan di era digital.</p>
            <p>Dengan dukungan tenaga pendidik yang profesional dan fasilitas pembelajaran yang modern, kami terus berupaya memberikan pendidikan berkualitas dan relevan dengan kebutuhan dunia industri.</p>
            <p class="mb-4">Mari bersama-sama kita wujudkan visi SMK Negeri 4 Bogor untuk menjadi sekolah kejuruan yang unggul dalam menghasilkan lulusan yang kompeten, inovatif, dan berakhlak mulia.</p>
            <p class="mb-0">Wassalamu'alaikum Wr. Wb.</p>
        </div>
    </div>
</div>
@endsection 