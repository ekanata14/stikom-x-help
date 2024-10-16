<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('assets/images/stikom-sm.png') }}">
    <link id="style-sheet" rel="stylesheet" href="assets/css/styles.css" />
    <script src="https://kit.fontawesome.com/4654690b34.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top fw-semibold">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="assets/images/esg.png" alt="" width="60%" height="40%" />
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
                            <a class="nav-link px-4 {{ request()->is('home') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown px-4">
                            <a class="nav-link dropdown-toggle {{ request()->is('general-info*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                General Info
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('general-info') ? 'active' : '' }}" href="{{ route('general-info') }}">General Information</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('commitee') ? 'active' : '' }}" href="{{ route('commitee') }}">Comittee</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link {{ request()->routeIs('speakers') ? 'active' : '' }}" href="{{ route('speakers') }}">Speakers</a>
                        </li>
                        <li class="nav-item dropdown px-4">
                            <a class="nav-link dropdown-toggle {{ request()->is('travel*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Travel & Accomodation
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('accomodation') ? 'active' : '' }}" href="{{ route('accomodation') }}">All Accomodation</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('travel') ? 'active' : '' }}" href="{{ route('travel') }}">Travel Information</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-4 btn btn-sm" style="background-color: #507c3c">
                            <a class="nav-link text-white {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}"><b>Register/Login</b></a>
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
                    <h5>FOR MORE INFORMATION</h5>
                    <br>
                    <p>
                        Contact Person :
                        <a href="https://wa.me/081337257999" target="_blank "
                            style="
                color: hsl(209, 100%, 63%);
                background-color: transparent;
                text-decoration: none;
              ">
                            +62 813-3725-7999</a> <br>
                        Email : <a
                            href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=julius@stikom-bali.ac.id"
                            target="_blank "
                            style="
                color: hsl(209, 100%, 63%);
                background-color: transparent;
                text-decoration: none;
              ">
                            julius@stikom-bali.ac.id</a>
                    </p>
                </div>
                <div class="row row-cols-1 col-md-4 col-sm-6 justify-content-end">
                    <div class="col text-center">
                        <h5>SPONSOR BY:</h5>
                    </div>
                    <br />
                    <div class="row content d-flex align-items-center justify-content-center">
                        <div class="col-4">
                            <img src="assets/images/esg.png" alt="" width="70%" height="70%" />
                        </div>
                        <div class="col-4">
                            <img src="assets/images/stikom.png" alt="" width="70%" height="70%" />
                        </div>
                        <div class="col-4">
                            <img src="assets/images/help.png" alt="" width="70% " height="70%" />
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 col-md-4 col-sm-6 justify-content-end">
                    <div class="col text-center">
                        <h5>SOCIAL MEDIA</h5>
                    </div>
                    <div class="row content d-flex align-items-center justify-content-center p-3">
                        <div class="col-3">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-whatsapp fa-3x"></i>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-facebook fa-3x"></i>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="#" class="me-4 text-reset">
                                <i class="fab fa-instagram fa-3x"></i>
                            </a>
                        </div>
                        <div class="col-3">
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
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
