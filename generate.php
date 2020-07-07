<?php

$data = isset($_GET['data']) ? $_GET['data'] : 'user';

$user = json_decode(file_get_contents('./data/user/user.json'), true)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataForDummies - Generate data</title>
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="header">
        <!-- NAVIGATION BAR -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-bg-color">
            <div class="container">
                <a class="navbar-brand" href="./"><span><i class="fas fa-sitemap fa-lg mr-2"></i></span>
                    DataForDummies</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav mr-auto">
                        <a class="nav-item nav-link" href="./docs/"><span><i class="fas fa-book mr-1"></i></span>
                            Documentation</a>
                        <a class="nav-item nav-link" href="./api-testing"><span><i class="fas fa-check-square mr-1"></i></span> Test your API</a>
                        <a class="nav-item nav-link" href="./generate-data"><span><i class="fas fa-plus-square mr-1"></i></span> Generate data</a>
                    </div>
                    <a href="./#contact">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                            <span><i class="fas fa-address-book mr-1"></i></span> Contact</button>
                    </a>
                </div>
            </div>
        </nav>

        <!-- JUMBOTRON -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="hero-section">Generate Data</h1>
                <p class="lead">A free random data generator tool for various datasets
                </p>
            </div>
        </div>
    </div>

    <!-- DATA GENERATION TOOl -->
    <div class="site-section">
        <div class="container">
            <h1 class="section-heading mb-5">Data generation tool</h1>
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card h-100">
                        <h5 class="card-header bg-white border-0">Fields</h5>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="data">Select dataset</label>
                                        <select name="data" id="data" class="form-control">
                                            <option value="user" <?php if ($data == 'user') { ?> selected <?php } ?>>User</option>
                                            <option value="employee" <?php if ($data == 'employee') { ?> selected <?php } ?>>Employee</option>
                                            <option value="student" <?php if ($data == 'student') { ?> selected <?php } ?>>Student</option>
                                            <option value="course" <?php if ($data == 'course') { ?> selected <?php } ?>>Course</option>
                                            <option value="country" <?php if ($data == 'country') { ?> selected <?php } ?>>Country</option>
                                            <option value="car" <?php if ($data == 'car') { ?> selected <?php } ?>>Car</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="rows"># Rows</label>
                                        <input type="number" name="rows" id="rows" min="1" max="5000" class="form-control" value="1000">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="format">Format</label>
                                        <select name="format" id="format" class="form-control">
                                            <option value="json">JSON</option>
                                            <option value="csv">CSV</option>
                                            <option value="sql">SQL</option>
                                            <option value="xml">XML</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-gradient btn-block">
                                            <i class="fas fa-download mr-1 fa-sm"></i> Download data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <h5 class="card-header bg-white border-0">Data Generation Made Easy</h5>
                        <div class="card-body">Need some mock data to test your app? DataForDummies lets you generate up to 5,000 rows of realistic test data in CSV, JSON, XML and SQL formats.</div>
                    </div>
                </div>

                <div class="col-md-8 mb-3">
                    <div class="card">
                        <h5 class="card-header bg-white border-0">How to use?</h5>
                        <div class="card-body">
                            <ol type="1">
                                <li class="mb-2">Select the dataset you want to download from the select textbox</li>
                                <li class="mb-2">Enter the number of rows you want to download. Note: You can download a minimum of 1 row and maximum of 5000 rows of data. If this threshold didn't reach, you will get an error response message.</li>
                                <li class="mb-2">Select the format you want your data to be in. We provide different formats like CSV, JSON, XML and SQL formats.</li>
                                <li>Click download button to download your data in the specified format. Your file will be downloaded automatically in your download folder.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OUR TOOL -->
    <div class="site-section pt-0">
        <div class="container">
            <h1 class="section-heading mb-5">Our other tools</h1>
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="card p-2 h-100">
                        <div class="card-body">
                            <h3 class="blog-title text-gradient mb-3">REST API</h3>
                            <p>DataForDummies is a collective list of free API datasets for generating random test data.
                                Load data directly into your test environment.</p>
                            <p class="mb-0"><a href="docs/">Learn more <i class="fas fa-arrow-right fa-xs ml-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-2 h-100">
                        <div class="card-body">
                            <h3 class="blog-title text-gradient mb-3">API Testing Tool</h3>
                            <p>DataForDummies is an online API testing tool. Test your API by sending
                                API requests to the server and check the server responses.</p>
                            <p class="mb-0"><a href="api-testing">Learn more <i class="fas fa-arrow-right fa-xs ml-1"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0 text-center text-lg-left">
                    <p style="line-height: 25px;">DataForDummies is providing a free API service to everyone and we try
                        to create new sets of data for you. I <a href="#"><u>Farman Hafeez</u></a> created this website
                        to help you to use our service in your projects or applications. Help us to improve our service
                        and to keep this service alive...</p>
                    <button class="btn btn-outline-light"><span class="mr-1"><i class="fas fa-donate"></i></span>
                        Donate</button>
                </div>
                <div class="col-lg-7 ml-auto">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h3 class="mb-4">Navigation</h3>
                            <ul class="list-unstyled">
                                <li><a href="./">Home</a></li>
                                <li><a href="./docs/">Documentation</a></li>
                                <li><a href="./api-testing">Test your API</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h3 class="mb-4">Navigation</h3>
                            <ul class="list-unstyled">
                                <li><a href="">Generate data</a></li>
                                <li><a href="./copyright">Copyright</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                            <h3 class="mb-4">Follow Us</h3>
                            <div class="d-flex flex-wrap justify-content-around">
                                <a href="#" title="Github"><i class="fab fa-github fa-lg"></i></a>
                                <a href="#" title="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="#" title="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
                                <a href="#" title="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="#" title="LinkedIn"><i class="fab fa-linkedin fa-lg"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>