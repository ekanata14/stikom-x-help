<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration</title>
    <link id="style-sheet" rel="stylesheet" href="assets/css/styles.css" />
    <script
      src="https://kit.fontawesome.com/4654690b34.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!--nav-->
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary sticky-top fw-semibold"
    >
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/images/esg.png" alt="Bootstrap" width="60%" height="40%" />
        </a>
        <span>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav d-flex">
              <li class="nav-item">
                <a class="nav-link px-4" aria-current="page" href="{{ route('home') }}"
                  >Home</a
                >
              </li>
              <li class="nav-item dropdown px-4">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  General Info
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="{{ route('general-info') }}"
                      >General Information</a
                    >
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
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Travel & Accomodation
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="{{ route('accomodation') }}"
                      >All Accomodation</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('travel') }}"
                      >Travel Information</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item px-4">
                <a
                  class="nav-link active"
                  style="color: #507c3c"
                  href="regis.html"
                  >Registration</a
                >
              </li>
            </ul>
          </div></span
        >
      </div>
    </nav>

    <section class="module parallax2 parallax-1 d-flex mb-4">
      <div
        class="container d-flex text-center align-items-center justify-content-center text-white"
      >
        <h2>ALL ACCOMMODATION</h2>
      </div>
    </section>

    <section>
      <div class="container d-flex justify-content-center mt-5 mb-5">
        <div class="flex-column mb-3 col-6">
          <div class="p-2 text-center"><h3>Registration Form</h3></div>
          <div class="p-2">
            <form class="">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >First Name</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Last Name</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Complete Name</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Email
                </label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Mobile Phone</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Institution</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Position</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Front Degree</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Back Degree</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="justify-content-center d-flex">
                <button
                  type="submit"
                  class="btn btn-primary"
                  style="
                    background-color: #4c7838;
                    --bs-btn-padding-y: 0.5rem;
                    --bs-btn-padding-x: 1.5rem;
                    --bs-btn-font-size: 1rem;
                  "
                >
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="module d-flex paralax parallax-1 mt-4">
      <div
        class="container d-flex flex-column justify-content-center align-items-center"
      >
        <div><img src="assets/images/esg.png" alt="" height="" width="" /></div>
        <div class="d-grid gap-2 col-3 justify-content-center">
          
          <a
	    href="{{ route('login') }}"
            class="btn mt-4 fw-semibold fs-5"
            style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 6rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            "
          >
            Login
          </a>
          <a		
	    href="{{ route('register') }}"
            class="btn mt-3 fw-semibold fs-5"
            style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 6rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            "
          >
            Register
          </a>
          <button
            type="button"
            class="btn mt-3 fw-semibold"
            style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 6rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            "
          >
            Go To Conference
          </button>
        </div>
        <h3 class="text-center mt-5 text-white">
          GOES TO ESG : ECOLOGY OF BALI 2024
        </h3>

        <div
          id="js-timer"
          class="timer d-flex justify-content-center"
          role="timer"
        >
          <span class="timer__item" id="timer-days">
            <span class="timer__value">00</span>
            <span class="timer__label">Days</span>
          </span>
          <span class="timer__item" id="timer-hours">
            <span class="timer__value">00</span>
            <span class="timer__label">Hours</span>
          </span>
          <span class="timer__item" id="timer-minutes">
            <span class="timer__value">00</span>
            <span class="timer__label">Minutes</span>
          </span>
          <span class="timer__item" id="timer-seconds">
            <span class="timer__value">00</span>
            <span class="timer__label">Seconds</span>
          </span>
        </div>

        <script>
          (function () {
            "use strict";

            if (typeof window.Timer !== "object") {
              window.Timer = {};
            }

            Timer.getTimeRemaining = function (endtimeRaw) {
              var t = Date.parse(endtimeRaw) - Date.parse(new Date());
              var seconds = Math.floor((t / 1000) % 60);
              var minutes = Math.floor((t / 1000 / 60) % 60);
              var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
              var days = Math.floor(t / (1000 * 60 * 60 * 24));

              return {
                total: t,
                days: days,
                hours: hours,
                minutes: minutes,
                seconds: seconds,
              };
            };

            Timer.updateClock = function (endtime) {
              var t = Timer.getTimeRemaining(endtime);
              var days = document
                .getElementById("timer-days")
                .querySelector(".timer__value");
              var hours = document
                .getElementById("timer-hours")
                .querySelector(".timer__value");
              var minutes = document
                .getElementById("timer-minutes")
                .querySelector(".timer__value");
              var seconds = document
                .getElementById("timer-seconds")
                .querySelector(".timer__value");

              days.innerHTML = ("0" + t.days).slice(-2);
              hours.innerHTML = ("0" + t.hours).slice(-2);
              minutes.innerHTML = ("0" + t.minutes).slice(-2);
              seconds.innerHTML = ("0" + t.seconds).slice(-2);

              if (t.total <= 0) {
                clearInterval(timeinterval);
                days.innerHTML = "00";
                hours.innerHTML = "00";
                minutes.innerHTML = "00";
                seconds.innerHTML = "00";
              }
            };

            Timer.start = function (endtime) {
              Timer.updateClock(endtime);
              var timeinterval = setInterval(function () {
                Timer.updateClock(endtime);
              }, 1000);
            };

            // Start the countdown with 65 days, 6 hours, and 22 minutes from now
            var now = new Date();
            var countdownEnd = new Date(
              now.getTime() +
                65 * 24 * 60 * 60 * 1000 +
                6 * 60 * 60 * 1000 +
                22 * 60 * 1000
            );

            Timer.start(countdownEnd);
          })();
        </script>
      </div>
    </section>

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
            <div
              class="row content d-flex align-items-center justify-content-center"
            >
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
            <div
              class="row content d-flex align-items-center justify-content-center p-3"
            >
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
      <div
        class="text-center p-3 text-white fw-semibold"
        style="background-color: black"
      >
        Copyright © ESG : Ecology Of Bali 2024
      </div>
    </footer>
    <script src="assets/js/scripts.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
