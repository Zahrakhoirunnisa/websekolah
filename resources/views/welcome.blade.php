<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('assets/icons/logok4.ico') }}">
    <title>SMK Negeri 4 Kota Bogor</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: rgba(13, 110, 253, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('{{ asset('assets/images/lapangansmk.jpeg') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            animation: zoomEffect 20s infinite alternate;
        }

        @keyframes zoomEffect {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .hero-text {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .card-program {
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .card-program:hover {
            transform: translateY(-10px);
        }

        .program-icon {
            width: 70px;
            height: 70px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .berita-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .berita-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-content {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-title {
            font-size: 1.25rem;
        }

        .card-text {
            font-size: 0.9rem;
        }


        .footer {
            background: #0d6efd;
            color: white;
            padding: 60px 0;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        #calendar-container {
        flex: 0 0 350px; /* Ukuran kalender */
    }

    #calendar {
        max-width: 100%; /* Supaya kalender responsif */
    }

    #agenda-details {
        min-width: 300px;
    }

    @media (max-width: 768px) {
        #calendar-container {
            flex: 1 1 100%; /* Kalender menjadi 100% lebar di layar kecil */
            margin-bottom: 20px;
        }

        #agenda-details {
            flex: 1 1 100%;
        }
    }

        #agenda .card {
            transition: transform 0.3s ease;
        }

        #agenda .card:hover {
            transform: translateY(-5px);
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .lead {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .kepsek-container {
            position: relative;
            overflow: hidden;
            max-width: 350px;
            width: 100%;
        }

        .kepsek-img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transform: scale(1);
            transition: transform 0.5s ease;
        }

        .kepsek-container:hover .kepsek-img {
            transform: scale(1.05);
            /* Zoom effect on hover */
        }

        .kepsek-info {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: rgba(33, 150, 243, 0.8);
            /* Soft blue background */
            color: white;
            padding: 10px 20px;
            border-radius: 0 15px 0 0;
            width: 80%;
            transition: bottom 0.3s ease-in-out;
        }

        .kepsek-container:hover .kepsek-info {
            bottom: 10px;
            /* Moves up slightly on hover */
        }

        .kepsek-container::before {
            content: "";
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 200%;
            height: 50%;
            background: radial-gradient(circle at center, rgba(33, 150, 243, 0.3), transparent);
            transform: translateX(-50%) scaleY(1.2);
            animation: waveAnimation 5s infinite linear;
        }

        #calendar {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .fc-toolbar-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .fc-daygrid-event {
            background-color: #ffdd57 !important;
            color: #333 !important;
            border: none;
            font-weight: 500;
        }

        .fc-daygrid-block-event {
            border-radius: 5px;
        }

        .modal-content {
            background: #f8f9fa;
            border: none;
        }

        .modal-header {
            border-bottom: none;
            font-size: 1.25rem;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-body p {
            margin: 0;
            line-height: 1.6;
        }b 

        @keyframes waveAnimation {
            from {
                transform: translateX(-50%) scaleY(1.2);
            }

            to {
                transform: translateX(0%) scaleY(1.2);
            }
        }

        /* Calendar Styling */
        .fc {
            font-family: 'Poppins', sans-serif;
        }
        
        .fc .fc-toolbar-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #0d6efd;
        }
        
        .fc .fc-button-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }
        
        .fc .fc-button-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
            transform: translateY(-2px);
        }
        
        .fc .fc-daygrid-day {
            transition: all 0.2s ease;
        }
        
        .fc .fc-daygrid-day:hover {
            background-color: #f8f9fa;
        }
        
        .fc .fc-event {
            background-color: #0d6efd;
            border: none;
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .fc .fc-event:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
        }
        
        /* Agenda Detail Styling */
        .agenda-detail-container {
            min-height: 400px;
        }
        
        .event-header {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 1rem;
        }
        
        .badge {
            padding: 0.5rem 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        
        #event-details {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Gallery Styling */
        .gallery-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
        }
        
        .gallery-preview {
            position: relative;
            overflow: hidden;
        }
        
        .gallery-preview img {
            transition: transform 0.3s ease;
        }
        
        .gallery-card:hover .gallery-preview img {
            transform: scale(1.05);
        }
        
        .image-count-overlay {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            backdrop-filter: blur(5px);
        }
        
        /* Modal & Carousel Styling */
        .modal-content {
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 10%;
            background: rgba(0,0,0,0.3);
            border: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .carousel:hover .carousel-control-prev,
        .carousel:hover .carousel-control-next {
            opacity: 1;
        }
        
        .carousel-control-prev {
            border-radius: 0 5px 5px 0;
        }
        
        .carousel-control-next {
            border-radius: 5px 0 0 5px;
        }
        
        .modal-header,
        .modal-footer {
            padding: 1rem 1.5rem;
        }

        /* Program Card Styling */
        .program-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .program-image {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .program-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .program-card:hover .program-image img {
            transform: scale(1.1);
        }

        .program-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .program-icon {
            background: rgba(255,255,255,0.1);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255,255,255,0.2);
        }

        .program-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .program-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(13, 110, 253, 0.9);
            border-radius: 20px;
            font-size: 0.9rem;
            backdrop-filter: blur(5px);
        }

        /* Modal Styling */
        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .skill-tag {
            background: #e9ecef;
            color: #495057;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .program-image {
                height: 250px;
            }

            .program-title {
                font-size: 1.25rem;
            }
        }

        /* News Styling */
        .featured-news .card {
            transition: transform 0.3s ease;
            background: linear-gradient(145deg, #0d6efd, #0b5ed7);
        }
        
        .featured-tag {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            backdrop-filter: blur(5px);
        }

        .news-card {
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-date {
            text-align: right;
        }

        .news-date .day {
            display: block;
            font-size: 1.5rem;
            line-height: 1;
        }

        .news-date .month {
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .news-category .badge {
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .news-author {
            color: #6c757d;
        }

        .btn-link {
            text-decoration: none;
            font-weight: 500;
            transition: transform 0.3s ease;
        }

        .btn-link:hover {
            transform: translateX(5px);
        }

        /* Modal Styling */
        .modal-content {
            overflow: hidden;
        }

        .news-meta {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .news-content {
            line-height: 1.8;
            color: #495057;
        }

        @media (max-width: 768px) {
            .news-date .day {
                font-size: 1.25rem;
            }
        }

        /* Sambutan Kepala Sekolah Styling */
        .kepsek-image-container {
            position: relative;
            overflow: hidden;
            aspect-ratio: 3/4;
        }

        .kepsek-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .kepsek-image-container:hover .kepsek-img {
            transform: scale(1.05);
        }

        .decoration-circle-1,
        .decoration-circle-2 {
            position: absolute;
            border-radius: 50%;
            z-index: -1;
        }

        .decoration-circle-1 {
            width: 150px;
            height: 150px;
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            top: -20px;
            left: -20px;
            opacity: 0.1;
        }

        .decoration-circle-2 {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #0dcaf0, #0d6efd);
            bottom: -10px;
            right: -10px;
            opacity: 0.1;
        }

        .kepsek-info-card {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .kepsek-line {
            width: 4px;
            height: 40px;
            background: linear-gradient(to bottom, #0d6efd, #0dcaf0);
            border-radius: 2px;
        }

        .sambutan-content {
            position: relative;
        }

        .quote-card {
            position: relative;
            border-left: 4px solid #0d6efd;
        }

        .message-content {
            position: relative;
            padding-left: 2rem;
        }

        .message-content::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            background: linear-gradient(to bottom, #0d6efd 50%, transparent);
        }

        .message-content p {
            color: #4a5568;
            line-height: 1.8;
        }

        .signature-block {
            margin-top: 3rem;
            text-align: right;
        }

        .signature-img {
            height: 60px;
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        .signature-line {
            width: 200px;
            height: 1px;
            background: #dee2e6;
            margin-left: auto;
            margin-bottom: 0.5rem;
        }

        .signature-name {
            font-weight: 600;
            margin-bottom: 0;
        }

        .signature-title {
            font-size: 0.9rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 991px) {
            .kepsek-info-card {
                position: relative;
                bottom: 0;
                transform: translateX(-50%) translateY(-50%);
            }
            
            .message-content {
                padding-left: 1rem;
            }
        }

        @media (max-width: 768px) {
            .kepsek-image-container {
                aspect-ratio: 1/1;
                max-width: 400px;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/icons/logok4.ico') }}" height="45" alt="SMKN 4 Bogor">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#informasi">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#agenda">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <img src="{{ asset('assets/images/lapangansmk.jpeg') }}" alt="Hero Background" class="hero-image">
        <div class="container text-center text-white">
            <h1 class="hero-text mb-4" data-aos="fade-up">Selamat Datang di <br>SMK Negeri 4 Kota Bogor</h1>
            <h4 class="mb-5" data-aos="fade-up" data-aos-delay="200">Sekolah kejuruan berbasis Teknologi Informasi dan
                Komunikasi</h4>
            <a href="#program" class="btn btn-danger btn-lg" data-aos="fade-up" data-aos-delay="400">Jelajahi Program
                Kami</a>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-primary fw-semibold mb-2 d-block">Sambutan</span>
                <h2 class="fw-bold">Sambutan Kepala Sekolah</h2>
                <p class="text-muted">SMK Negeri 4 Kota Bogor</p>
            </div>

            <div class="row align-items-center g-5">
                <!-- Kolom Foto -->
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="position-relative">
                        <!-- Foto Utama -->
                        <div class="kepsek-image-container rounded-4 overflow-hidden shadow-lg">
                            <img src="{{ asset('assets/images/kepsek.jpg') }}" 
                                alt="Kepala Sekolah"
                                class="img-fluid w-100 kepsek-img">
                            
                            <!-- Decorative Elements -->
                            <div class="decoration-circle-1"></div>
                            <div class="decoration-circle-2"></div>
                        </div>
                        
                        <!-- Info Card -->
                        <div class="kepsek-info-card bg-white rounded-4 shadow-lg p-4">
                            <div class="d-flex align-items-center">
                                <div class="kepsek-line me-3"></div>
                                <div>
                                    <h5 class="fw-bold mb-1">Drs. Mulya Murprihartono, M.Si</h5>
                                    <p class="text-primary mb-0">Kepala SMK Negeri 4 Bogor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Sambutan -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="sambutan-content">
                        <!-- Quote Card -->
                        <div class="quote-card bg-primary bg-opacity-10 p-4 rounded-4 mb-4">
                            <i class="fas fa-quote-left text-primary opacity-25 fa-2x mb-3"></i>
                            <p class="lead text-dark mb-0">
                                SMK Negeri 4 Bogor berkomitmen untuk menghasilkan lulusan yang kompeten, 
                                berkarakter, dan siap menghadapi tantangan di era digital.
                            </p>
                        </div>

                        <!-- Main Message -->
                        <div class="message-content">
                            <p class="mb-3">Assalamu'alaikum Wr. Wb.</p>
                            
                            <p class="mb-3">Puji syukur kita panjatkan ke hadirat Allah SWT, atas segala limpahan rahmat dan karunia-Nya. 
                            Selamat datang di website resmi SMK Negeri 4 Bogor.</p>
                            
                            <p class="mb-3">SMK Negeri 4 Bogor merupakan salah satu sekolah kejuruan unggulan di Kota Bogor 
                            yang berkomitmen untuk menghasilkan lulusan yang kompeten, berkarakter, dan siap menghadapi 
                            tantangan di era digital.</p>
                            
                            <p class="mb-3">Dengan dukungan tenaga pendidik yang profesional dan fasilitas pembelajaran 
                            yang modern, kami terus berupaya memberikan pendidikan berkualitas dan relevan dengan 
                            kebutuhan dunia industri.</p>
                            
                            <p class="mb-3">Mari bersama-sama kita wujudkan visi SMK Negeri 4 Bogor untuk menjadi sekolah 
                            kejuruan yang unggul dalam menghasilkan lulusan yang kompeten, inovatif, dan berakhlak mulia.</p>
                            
                            <p class="mb-4">Wassalamu'alaikum Wr. Wb.</p>

                            <!-- Signature Block dihapus -->
                            <div class="text-end">
                                <p class="fw-bold mb-1">Drs. Mulya Murprihartono, M.Si</p>
                                <p class="text-muted">Kepala SMK Negeri 4 Bogor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Program Keahlian -->
    <section id="program" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-primary" data-aos="fade-up">Program Keahlian</h2>
            <div class="row g-4">
                <!-- Program 1: PPLG -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up">
                    <div class="program-card h-100" data-bs-toggle="modal" data-bs-target="#programModal1">
                        <div class="program-image">
                            <img src="{{ asset('assets/images/keg.pplg.jpg') }}" alt="PPLG" class="img-fluid">
                            <div class="program-overlay">
                                <div class="program-icon">
                                    <img src="{{ asset('assets/images/pplg.png') }}" alt="PPLG Icon" width="60">
                                </div>
                                <h3 class="program-title">Pengembangan Perangkat Lunak dan Gim</h3>
                                <span class="program-badge">Software Engineering</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program 2: TO -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="program-card h-100" data-bs-toggle="modal" data-bs-target="#programModal2">
                        <div class="program-image">
                            <img src="{{ asset('assets/images/keg.to.jpeg') }}" alt="TO" class="img-fluid">
                            <div class="program-overlay">
                                <div class="program-icon">
                                    <img src="{{ asset('assets/images/to.png') }}" alt="TO Icon" width="60">
                                </div>
                                <h3 class="program-title">Teknik Otomotif</h3>
                                <span class="program-badge">Automotive Engineering</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program 3: TJKT -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="program-card h-100" data-bs-toggle="modal" data-bs-target="#programModal3">
                        <div class="program-image">
                            <img src="{{ asset('assets/images/keg.tjkt.jpg') }}" alt="TJKT" class="img-fluid">
                            <div class="program-overlay">
                                <div class="program-icon">
                                    <img src="{{ asset('assets/images/tjkt.jpeg') }}" alt="TJKT Icon" width="60">
                                </div>
                                <h3 class="program-title">Teknik Jaringan Komputer dan Telekomunikasi</h3>
                                <span class="program-badge">Network Engineering</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program 4: TPFL -->
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="program-card h-100" data-bs-toggle="modal" data-bs-target="#programModal4">
                        <div class="program-image">
                            <img src="{{ asset('assets/images/keg.to.jpg') }}" alt="TPFL" class="img-fluid">
                            <div class="program-overlay">
                                <div class="program-icon">
                                    <img src="{{ asset('assets/images/tpfl.jpeg') }}" alt="TPFL Icon" width="60">
                                </div>
                                <h3 class="program-title">Teknik Fabrikasi Logam</h3>
                                <span class="program-badge">Metal Engineering</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Program Keahlian -->
    @foreach([
        ['id' => 1, 'title' => 'Pengembangan Perangkat Lunak dan Gim', 'image' => 'keg.pplg.jpg', 'icon' => 'pplg.png',
         'desc' => 'Program keahlian yang fokus pada pengembangan aplikasi, website, dan game. Siswa akan mempelajari berbagai bahasa pemrograman, database, dan teknologi pengembangan perangkat lunak modern.',
         'skills' => ['Web Development', 'Mobile Apps', 'Game Development', 'UI/UX Design', 'Database Management']],
        ['id' => 2, 'title' => 'Teknik Otomotif', 'image' => 'keg.to.jpeg', 'icon' => 'to.png',
         'desc' => 'Program keahlian yang mempelajari teknologi kendaraan modern, sistem kelistrikan, dan perawatan mesin. Siswa akan dibekali keterampilan praktis dalam diagnosis dan perbaikan kendaraan.',
         'skills' => ['Engine Management', 'Electrical Systems', 'Chassis & Transmission', 'Automotive Technology', 'Vehicle Maintenance']],
        ['id' => 3, 'title' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'image' => 'keg.tjkt.jpg', 'icon' => 'tjkt.jpeg',
         'desc' => 'Program keahlian yang fokus pada infrastruktur jaringan, keamanan sistem, dan teknologi telekomunikasi. Siswa akan mempelajari konfigurasi perangkat jaringan dan manajemen sistem.',
         'skills' => ['Network Administration', 'Cyber Security', 'Cloud Computing', 'System Administration', 'IoT']],
        ['id' => 4, 'title' => 'Teknik Fabrikasi Logam', 'image' => 'keg.to.jpg', 'icon' => 'tpfl.jpeg',
         'desc' => 'Program keahlian yang mempelajari teknik pengolahan dan pembentukan logam. Siswa akan dibekali keterampilan dalam pengelasan, pembentukan, dan manufaktur logam.',
         'skills' => ['Welding', 'Metal Forming', 'CAD/CAM', 'Quality Control', 'Industrial Safety']]
    ] as $program)
    <div class="modal fade" id="programModal{{ $program['id'] }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-header bg-primary text-white border-0">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/' . $program['icon']) }}" alt="Program Icon" width="40" class="me-3">
                        <h5 class="modal-title">{{ $program['title'] }}</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <img src="{{ asset('assets/images/' . $program['image']) }}" alt="Program Image" class="img-fluid rounded-3 shadow-sm">
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Deskripsi Program</h6>
                            <p class="text-muted">{{ $program['desc'] }}</p>
                            
                            <h6 class="fw-bold mb-3 mt-4">Kompetensi Utama</h6>
                            <div class="skill-tags">
                                @foreach($program['skills'] as $skill)
                                    <span class="skill-tag">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Include Bootstrap JS (if not already included in your project) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



    



    <!-- Berita Section -->
    <section id="informasi" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-primary" data-aos="fade-up">Informasi Terkini</h2>
            
            <!-- Featured News -->
            @if($beritas->isNotEmpty())
            <div class="featured-news mb-5" data-aos="fade-up">
                <div class="card border-0 shadow-lg rounded-4 bg-primary bg-gradient text-white">
                    <div class="card-body p-4 p-lg-5">
                        <div class="featured-tag mb-3">Berita Terbaru</div>
                        <div class="news-meta mb-2">
                            <span class="me-3">
                                <i class="far fa-calendar-alt me-1"></i> 
                                {{ \Carbon\Carbon::parse($beritas->first()->created_at)->format('d M Y') }}
                            </span>
                            <span>
                                <i class="far fa-user me-1"></i> 
                                {{ $beritas->first()->penulis }}
                            </span>
                        </div>
                        <h3 class="fw-bold mb-3">{{ $beritas->first()->judul }}</h3>
                        <p class="mb-4 opacity-75">{{ Str::limit(strip_tags($beritas->first()->isi), 200) }}</p>
                        <button class="btn btn-light px-4 py-2 rounded-pill" data-bs-toggle="modal" 
                            data-bs-target="#beritaModal{{ $beritas->first()->id }}">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- News Grid -->
            <div class="row g-4">
                @foreach($beritas->skip(1) as $berita)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-card h-100">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="news-category">
                                        <span class="badge bg-primary-subtle text-primary">Informasi</span>
                                    </div>
                                    <div class="news-date text-end">
                                        <span class="day fw-bold text-primary">
                                            {{ \Carbon\Carbon::parse($berita->created_at)->format('d') }}
                                        </span>
                                        <span class="month text-muted">
                                            {{ \Carbon\Carbon::parse($berita->created_at)->format('M Y') }}
                                        </span>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold mb-3">{{ $berita->judul }}</h5>
                                <p class="card-text text-muted mb-4">{{ Str::limit(strip_tags($berita->isi), 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <div class="news-author">
                                        <i class="far fa-user-circle me-1"></i>
                                        <span class="text-muted small">{{ $berita->penulis }}</span>
                                    </div>
                                    <button class="btn btn-link text-primary p-0" data-bs-toggle="modal" 
                                        data-bs-target="#beritaModal{{ $berita->id }}">
                                        Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- News Modals -->
            @foreach($beritas as $berita)
            <div class="modal fade" id="beritaModal{{ $berita->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 rounded-4">
                        <div class="modal-header bg-primary text-white border-0 rounded-top-4">
                            <h5 class="modal-title fw-bold">{{ $berita->judul }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="news-meta mb-4 pb-3 border-bottom">
                                <span class="me-3">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}
                                </span>
                                <span>
                                    <i class="far fa-user me-1"></i>
                                    {{ $berita->penulis }}
                                </span>
                            </div>
                            <div class="news-content">
                                {!! nl2br(e($berita->isi)) !!}
                            </div>
                        </div>
                        <div class="modal-footer border-0 bg-light rounded-bottom-4">
                            <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    



    <!-- agenda -->
    <section id="agenda" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-primary" data-aos="fade-up">Agenda Sekolah</h2>

            <div class="row g-4">
                <!-- Kalender -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="card shadow-lg border-0 rounded-4 h-100">
                        <div class="card-body p-4">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <!-- Detail Agenda -->
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="card shadow-lg border-0 rounded-4 h-100">
                        <div class="card-header bg-primary text-white p-4 rounded-top-4 border-0">
                            <h5 class="mb-0 fw-bold">Detail Agenda</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="agenda-detail-container">
                                <div id="no-event-selected" class="text-center py-5">
                                    <img src="{{ asset('assets/icons/schedule.png') }}" alt="Calendar" class="mb-3" style="width: 80px; opacity: 0.5;">
                                    <h5 class="text-primary fw-bold mb-2">Pilih Agenda</h5>
                                    <p class="text-muted mb-0">Klik pada agenda di kalender untuk melihat detailnya</p>
                                </div>
                                
                                <div id="event-details" class="d-none">
                                    <div class="event-header mb-4">
                                        <span class="badge bg-primary mb-2">Agenda Terpilih</span>
                                        <h4 id="agenda-title" class="fw-bold text-primary mb-2"></h4>
                                        <div class="d-flex align-items-center text-muted">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <span id="agenda-date"></span>
                                        </div>
                                        <div class="d-flex align-items-center text-muted mt-1">
                                            <i class="fas fa-clock me-2"></i>
                                            <span id="agenda-time"></span>
                                        </div>
                                    </div>
                                    <div class="event-description">
                                        <h6 class="fw-bold mb-2">Deskripsi:</h6>
                                        <p id="agenda-description" class="text-muted"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const eventDetails = document.getElementById('event-details');
    const noEventSelected = document.getElementById('no-event-selected');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        events: [
            @foreach($agendas as $agenda)
            {
                id: '{{ $agenda->id }}',
                title: '{{ $agenda->judul }}',
                start: '{{ \Carbon\Carbon::parse($agenda->created_at)->toIso8601String() }}',
                end: '{{ \Carbon\Carbon::parse($agenda->created_at)->addHours(2)->toIso8601String() }}',
                description: '{{ $agenda->isi }}'
            },
            @endforeach
        ],
        eventClick: function(info) {
            const event = info.event;
            
            // Format tanggal dan waktu
            const startDate = event.start.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            const startTime = event.start.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });
            const endTime = event.end.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });
            
            // Update konten
            document.getElementById('agenda-title').innerText = event.title;
            document.getElementById('agenda-date').innerText = startDate;
            document.getElementById('agenda-time').innerText = `${startTime} - ${endTime}`;
            document.getElementById('agenda-description').innerText = event.extendedProps.description;
            
            // Tampilkan detail event
            noEventSelected.classList.add('d-none');
            eventDetails.classList.remove('d-none');
            
            // Animasi smooth scroll ke detail agenda di mobile
            if(window.innerWidth < 992) {
                document.getElementById('event-details').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });

    calendar.render();
});

    </script>
    




    <!-- Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-primary" data-aos="fade-up">Gallery Sekolah</h2>
        <div class="row g-4">
            @php
                // Mengelompokkan gallery berdasarkan post_id
                $groupedGalleries = $galleries->groupBy('post_id');
            @endphp

            @foreach ($groupedGalleries as $postId => $galleryGroup)
                @php
                    $post = $galleryGroup->first()->posts;
                    $imageCount = $galleryGroup->count();
                @endphp
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card gallery-card border-0 shadow-lg rounded-4 h-100 overflow-hidden">
                        <!-- Preview Image Container -->
                        <div class="gallery-preview position-relative" style="height: 250px;">
                            <!-- Main Preview Image -->
                            <img src="{{ asset($galleryGroup->first()->images->first()->file) }}" 
                                class="w-100 h-100 object-fit-cover"
                                alt="{{ $post->judul }}"
                                data-bs-toggle="modal" 
                                data-bs-target="#galleryModal{{ $postId }}">
                            
                            <!-- Overlay with Image Count -->
                            @if($imageCount > 1)
                            <div class="image-count-overlay">
                                <i class="fas fa-images me-2"></i>
                                {{ $imageCount }} Foto
                            </div>
                            @endif
                        </div>

                        <div class="card-body p-4">
                            <h5 class="card-title text-dark mb-2">{{ $post->judul }}</h5>
                            <p class="card-text text-muted mb-0">{{ Str::limit(strip_tags($post->isi), 100) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Modal for Album -->
                <div class="modal fade" id="galleryModal{{ $postId }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 overflow-hidden">
                            <div class="modal-header border-0 bg-primary text-white">
                                <h5 class="modal-title">{{ $post->judul }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <!-- Carousel for Album Images -->
                                <div id="carousel{{ $postId }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($galleryGroup as $index => $gallery)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset($gallery->images->first()->file) }}" 
                                                    class="d-block w-100" 
                                                    style="height: 500px; object-fit: cover;"
                                                    alt="Gallery Image {{ $index + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($imageCount > 1)
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $postId }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $postId }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer border-0 bg-light">
                                <div class="small text-muted">{{ $imageCount }} foto dalam album ini</div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



    <!-- Maps Section -->
    <section id="peta" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" data-aos="fade-up">Lokasi Kami</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="ratio ratio-4x3 shadow-sm" data-aos="zoom-in">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.748104153501!2d106.8238691!3d-6.6407317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sen!2sid!4v1694954039677!5m2!1sen!2sid"
                            style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Bootstrap JS (if not already included in your project) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-4">Tentang Kami</h5>
                    <p>SMK Negeri 4 Bogor adalah sekolah kejuruan unggulan yang berfokus pada pengembangan teknologi dan
                        keterampilan industri.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-4">Kontak</h5>
                    <p><i class="fas fa-envelope me-2"></i> smkn4@smkn4bogor.sch.id</p>
                    <p><i class="fas fa-phone me-2"></i> (0251) 7547381</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Tajur, Bogor Selatan</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-4">Ikuti Kami</h5>
                    <div class="social-links">
                        <a
                            href="https://www.instagram.com/smkn4kotabogor?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img
                                src="{{ asset('assets/icons/ig.png') }}" alt="Instagram" width="20"></a>
                        <a href="https://www.facebook.com/people/SMK-NEGERI-4-KOTA-BOGOR/100054636630766/"><img
                                src="{{ asset('assets/icons/fb.png') }}" alt="Facebok" width="20"></a>
                        <a href="https://www.youtube.com/@smknegeri4bogor905"><img
                                src="{{ asset('assets/icons/yt.jpeg') }}" alt="Facebok" width="20"></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 SMK Negeri 4 Bogor. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(13, 110, 253, 0.95)';
            } else {
                navbar.style.background = 'rgba(13, 110, 253, 0.9)';
            }
        });
    </script>
</body>

</html>
