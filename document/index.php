<?php

$data = isset($_GET['data']) ? $_GET['data'] : 'index';
$title = ($data == 'index') ? 'to generate random data' : 'for ' . $data . ' data'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation <?= $title ?> - DataForDummies</title>
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">

    <!-- Flatdoc -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src='https://cdn.rawgit.com/rstacruz/flatdoc/v0.9.0/legacy.js'></script>
    <script src='https://cdn.rawgit.com/rstacruz/flatdoc/v0.9.0/flatdoc.js'></script>

    <!-- Flatdoc theme -->
    <link href='../assets/css/flatdoc.css' rel='stylesheet'>
    <script src='https://cdn.rawgit.com/rstacruz/flatdoc/v0.9.0/theme-white/script.js'></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body role='flatdoc'>
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="../"><span><i class="fas fa-sitemap fa-lg mr-2"></i></span>
                DataForDummies</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link" href="./"><span><i class="fas fa-book mr-1"></i></span>
                        API Docs</a>
                    <a class="nav-item nav-link" href="../api-testing-tool"><span><i class="fas fa-check-square mr-1"></i></span> Test your API</a>
                    <a class="nav-item nav-link" href="../generate-data"><span><i class="fas fa-plus-square mr-1"></i></span> Generate data</a>
                </div>
                <a href="../#contact">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                        <span><i class="fas fa-address-book mr-1"></i></span> Contact</button>
                </a>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class='content-root'>
        <div class='menubar'>
            <div class='menu section' role='flatdoc-menu'></div>
        </div>
        <div role='flatdoc-content' class='content'></div>
    </div>

    <!-- FOOTER -->
    <footer style="position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0 text-center text-lg-left">
                    <p style="line-height: 25px;">DataForDummies is providing a free API service to everyone and we try
                        to create new sets of data for you. I <a href="#"><u>Farman Hafeez</u></a> created this website
                        to help you to use our service in your projects or applications. Help us to improve our service
                        and to keep this service alive...</p>
                    <button class="btn btn-outline-light mt-2"><span class="mr-1"><i class="fas fa-donate"></i></span>
                        Donate</button>
                </div>
                <div class="col-lg-7 ml-auto">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h3 class="mb-4">Navigation</h3>
                            <ul class="list-unstyled">
                                <li><a href="../">Home</a></li>
                                <li><a href="./">API Docs</a></li>
                                <li><a href="../api-testing-tool">Test your API</a></li>
                                <li><a href="../generate-data">Generate data</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h3 class="mb-4">Navigation</h3>
                            <ul class="list-unstyled">
                                <li><a href="../json-to-xml-converter">JSON To XML</a></li>
                                <li><a href="../xml-to-json-converter">XML To JSON</a></li>
                                <li><a href="../copyright">Copyright</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h3 class="mb-4">Follow Us</h3>
                            <div class="d-flex flex-wrap justify-content-around">
                                <a href="https://github.com/farmanhafeez/" title="Github"><i class="fab fa-github fa-lg"></i></a>
                                <a href="https://www.facebook.com/farman.hafeez.9/" title="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="https://www.instagram.com/f.a.r.m.a.n._.h.a.f.e.e.z/" title="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
                                <a href="https://twitter.com/FarmanHafeez6" title="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="https://www.linkedin.com/in/farman-hafeez-956b57198/" title="LinkedIn"><i class="fab fa-linkedin fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center pt-5">
                <div class="col-12">
                    <p class="mb-2">&copy; Copyright DataForDummies. All Rights Reserved</p>
                    <p class="mb-0 small">Created & Designed with <span class="text-danger"><i class="fas fa-heart"></i></span> by Farman Hafeez</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Initializer -->
    <script>
        Flatdoc.run({
            fetcher: Flatdoc.file('../readme/<?= $data ?>.md')
        });
    </script>

    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($('.menubar').offset().top + $(".menubar").height() > $("footer").offset().top) {
                    $('.menubar').css('top', -($(".menubar").offset().top + $(".menubar").height() - $("footer").offset().top));
                } else {
                    $('.menubar').css('top', '');
                }
            });
        });
    </script>

</body>

</html>