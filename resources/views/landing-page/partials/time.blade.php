<section class="module d-flex paralax parallax-1 mt-4">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div><img src="assets/images/esg.png" alt="" height="" width="" /></div>
        <div class="d-grid gap-2 col-3 justify-content-center">
            <a href="{{ route('login') }}" class="btn mt-4 fw-semibold fs-5"
                style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 7rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            ">
                Login
            </a>
            <a href="{{ route('register') }}" class="btn mt-3 fw-semibold fs-5"
                style="
              --bs-btn-padding-y: 1rem;
              --bs-btn-padding-x: 7rem;
              --bs-btn-font-size: 1rem;
              background-color: #4c7838;
              color: white;
            ">
                Register
            </a>
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

    // Set countdown end date and time to November 23 at 8:00 AM
    var countdownEnd = new Date("Nov 23, 2024 08:00:00");

    Timer.start(countdownEnd);
  })();
</script>

    </div>
</section>
