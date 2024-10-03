<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link id="style-sheet" rel="stylesheet" href="assets/css/styles.css" />
    <script src="https://kit.fontawesome.com/4654690b34.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top fw-semibold">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/esg.png" alt="Bootstrap" width="60%" height="40%" />
            </a>
            <span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item">
                            <a class="nav-link px-4 active" style="color: #507c3c" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown px-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                General Info
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('general-info') }}">General Information</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('commitee') }}">Comittee</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="{{ route('speakers') }}">Speakers</a>
                        </li>
                        <li class="nav-item dropdown px-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Travel & Accomodation
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('accomodation') }}">All Accomodation</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('travel') }}">Travel Information</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </span>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container my-4 py-4">
            <div class="row content my-4">
                <div class="col-md-4 col-sm-6">
                    <h5>REGISTRATION AND ACCOMMODATION</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam
                        doloribus neque possimus, minus eligendi suscipit reiciendis
                        minima temporibus corporis, quisquam, soluta nisi voluptate
                        tempora. Corporis impedit eos provident molestias labore.
                    </p>
                </div>
                <div class="row row-cols-1 col-md-4 col-sm-6 justify-content-end">
                    <div class="col text-center">
                        <h5>SPONSOR BY:</h5>
                    </div>
                    <br />
                    <div class="row content d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-sm-6">
                            <img src="assets/images/esg.png" alt="" width="70%" height="70%" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <img src="assets/images/stikom.png" alt="" width="70%" height="70%" />
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <img src="assets/images/help.png" alt="" width="70% " height="70%" />
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 col-md-4 col-sm-6 justify-content-end">
                    <div class="col text-center">
                        <h5>SOCIAL MEDIA</h5>
                    </div>
                    <div class="row content d-flex align-items-center justify-content-center p-3">
                        <div class="col">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-whatsapp fa-3x"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-facebook fa-3x"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-instagram fa-3x"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-youtube fa-3x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center p-3 text-white fw-semibold" style="background-color: black">
            Copyright © ESG : Ecology Of Bali 2024
        </div>
    </footer>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
