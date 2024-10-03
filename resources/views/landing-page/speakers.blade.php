@extends('layouts.landing')
@section('content')
    <section class="module parallax2 parallax-1 d-flex mb-4">
      <div
        class="container d-flex text-center align-items-center justify-content-center text-white"
      >
        <h2>SPEAKERS</h2>
      </div>
    </section>

    <div class="container">
      <div class="container">
        <div class="text-center mt-5">
          <h4>Session 1</h4>
        </div>
        <div class="row text-center mb-4">
          <div class="col-md-6">
            <div class="mb-2">
              <h5>SPEAKER 1</h5>
            </div>
            <img
              src="assets/images/esg.png"
              height="150"
              width="150"
              class="rounded-circle mb-3"
            />
            <h5>Professor Datuk Dr Paul Chan</h5>
            <h6>Chancellor, HELP University</h6>
            <p>
              Dr Chan is a co-founder of the HELP Education Group. He is the
              Chancellor of HELP University. An economist, he focuses on life
              management and future legacy building.
            </p>
          </div>
          <div class="col-md-6">
            <h5 class="mb-2">SPEAKER 2</h5>
            <img
              src="assets/images/esg.png"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt="Image of Dr Stephen Moss"
            />
            <h5>Dr Stephen Moss</h5>
            <h6>Chairman, DAJ Capital</h6>
            <p>
              Dr Moss is a consultant and adviser with a background in law,
              psychology and business. He is also an early-stage entrepreneurial
              investor in start-ups and growth companies in financial and
              professional services, law and biotechnology. He held leading
              roles in law, PBU Consulting and Gordon Adel as well as managed
              company leases, acquisitions and mergers. He has consulted for
              over 25 years with international UK and Australian law firms in
              the legal and health services industries. Dr Moss's commitment to
              social justice and human rights has led him to work with Pathways
              Foundation, Child Fund and Amnesty International.
            </p>
          </div>
        </div>
        <div class="text-center mt-5">
          <h4>MODERATOR</h4>
          <img
            src="assets/images/esg.png"
            height="150"
            width="150"
            class="rounded-circle mb-3"
            alt="Image of Marlowe Bandem"
          />
          <h5>Marlowe Bandem</h5>
          <h6>Lorem Ipsum</h6>
          <p>
            I Made Marlowe Makaradhwaja Bandem adalah individu dengan bakat,
            minat dan profesi yang eclectic. Marlowe turut mendirikan 370s pada
            Juli 1928 untuk mewujudkan visi ekonomi. Bersama Istri Tercinta
            370s-Marl. Marlowe juga dikenal sebagai banker. Ia mana mengelola
            berbagai cabar keuangan dalam spirit. Marlowe juga mengejar dunia
            seni dan teknologi yang dinamis, saat ini ia adalah bagian dari
            Quantum Temple, yang memanfaatkan Web 3.0 dan blockchain untuk
            pelestarian pusaka budaya asli.
          </p>
        </div>
        <div class="text-center my-4 mt-5">
          <h4>Session 2</h4>
        </div>
        <div class="row text-center">
          <div class="col-md-6">
            <img
              src="assets/images/esg.png"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt="Image of Hideki Kawanishi, MD"
            />
            <h5>Hideki Kawanishi, MD</h5>
            <h6>(Japan)</h6>
          </div>
          <div class="col-md-6">
            <img
              src="assets/cult.jpg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt="Image of Dr. Tan Ru Yu"
            />
            <h5>Dr. Tan Ru Yu</h5>
            <h6>(Singapore)</h6>
          </div>
        </div>
      </div>
    </div>

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
@endsection
