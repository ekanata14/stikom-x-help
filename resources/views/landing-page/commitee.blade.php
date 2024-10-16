@extends('layouts.landing')
@section('content')
    <section class="module parallax2 parallax-3 d-flex mb-4">
        <div class="container d-flex text-center align-items-center justify-content-center text-white">
            <h2>COMITTEE</h2>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="d-flex justify-content-center">
                <h5>Committee Layout of Conference 2024</h5>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Steering Committee</th>
                        <td>
                            Dr. Dadang Hermawan, S.E., M.M., Ak.<br />
                            Professor Datuk Dr Paul Chan<br />
                            Dr. Roy Rudolf Huizen, ST., MT<br />
                            Dr. Ni Luh Putri Srinadi SE., MM. Kom.<br />
                            Yudi Agusta Ph.D.
                        </td>
                    </tr>
                    <tr>
                        <th>Chairman</th>
                        <td> Dr. Evi Triandini, SP., M.Eng</td>
                    </tr>
                    <tr>
                        <th>Committee Member</th>
                        <td>
                            Kadek Widi Widanti<br />
                            Ayu Chrisniyanti, S.Kom., MBA<br />
                            Kadek Surya Adi Saputra,S.Kom.,M.Kom<br />
                            I Komang Dharmendra, S.Kom.,M.T.<br />
                            Dr. I Gusti Ayu Widari Upadani, M.Agb<br />
                            Ni Nyoman Supuwiningsih, S.T., M.Kom<br />
                            I Made Pasek Pradnyana Wijaya, S.Kom,. M.Kom<br />
                            Matius Ivan Bimasena, S.Kom<br />
                            Ni Wayan Ari Ulandari, S.Kom., M.Kom<br />
                            Kadek Adies Wiranegara ,S.Kom<br />
                            Julius Isracl Ngantung, S.E, MBA<br />
                            I Nyoman Bagus Pramartha, S.Pd., M.Pd<br />
                            Ni Luh Mas Elma Yuniawati,S.Kom<br />
                            I Putu Gede Abdi Sudiatmika, S.Pd., M.Kom<br />
                            Putu Tjintia Kencana Dewi, S.E., M.M<br />
                            Rifky Lana Rahardian, S.Kom., M.Tn<br />
                            Tria Hikmah Fratiwi, S.Kom., M.T.<br />
                            Ni Luh Putu Silvia Dewi, S.Kom
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="module d-flex paralax parallax-3 mt-4">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div><img src="assets/esg.png" alt="" height="" width="" /></div>
            <div class="d-grid gap-2 col-3 justify-content-center">
                <button type="button" class="btn mt-4 fw-semibold fs-5"
                    style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 7rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            ">
                    Login
                </button>
                <button type="button" class="btn mt-3 fw-semibold fs-5"
                    style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 7rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            ">
                    Register
                </button>
            </div>
            <h3 class="text-center mt-5 text-white">
                GOES TO ESG : ECOLOGY OF BALI 2024
            </h3>

            <div id="js-timer" class="timer d-flex justify-content-center container col-xl-6 col-md-9" role="timer">
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
                (function() {
                    "use strict";

                    if (typeof window.Timer !== "object") {
                        window.Timer = {};
                    }

                    Timer.getTimeRemaining = function(endtimeRaw) {
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

                    Timer.updateClock = function(endtime) {
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

                    Timer.start = function(endtime) {
                        Timer.updateClock(endtime);
                        var timeinterval = setInterval(function() {
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
