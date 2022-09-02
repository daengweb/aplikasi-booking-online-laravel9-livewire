<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>NadaLab - Klinik USG 3D/4D</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('ui/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('ui/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ asset('ui/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('ui/assets/css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"></i> <a href="mailto:admin@daengweb.id">admin@daengweb.id</a>
                <i class="bi bi-phone"></i> +6285-343-966-997
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="/">NadaLab</a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Buat</span> Janji</a>
        </div>
    </header>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to NadaLab</h1>
            <h2>Klinik dengan layanan USG 3D/4D</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section>

    <main id="main">
        {{ $slot }}
    
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                    <p>Temukan kami di alamat berikut ini untuk konsultasi lebih lanjut</p>
                </div>
            </div>
            <div>
                <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.3815422675316!2d119.43419941459196!3d-5.202578296224953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3467b3aef3d%3A0xf290fdd4187a977e!2sDaeng%20Web!5e0!3m2!1sid!2sid!4v1662085476813!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
            </div>
            </div>
        </section>
    </main>
    <footer id="footer">
        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>NadaLab</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://daengweb.id">DaengWeb.id</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <script src="{{ asset('ui/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('ui/assets/js/main.js') }}"></script>
    @livewireScripts
</body>
</html>