<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('asset_web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_web/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_web/css/templatemo-style.css') }}">

</head>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="http://localhost:8000/">
                <i class="fas fa-store mr-2 text-dark"></i>
                Online Store
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" aria-current="page" href="#">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="#">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('main-content')

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Store</h3>
                    <p>Online Store is about more than sportswear and workout clothes. We partner with the best in the
                        industry to co-create. This way we offer our fans the sporting goods, style and clothing that
                        match the athletic needs, while keeping sustainability in mind. We’re here to support creators.
                        Improve their game. Create change. And we think about the impact we have on our world.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2022
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="#" class="tm-text-gray" rel="sponsored" target="_parent">ABOOD MASOUD</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>

</html>
