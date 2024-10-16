@extends('layouts.landing')
@section('content')
    <section class="module parallax2 parallax-2 d-flex mb-4">
        <div class="container d-flex text-center align-items-center justify-content-center text-white">
            <h2>ALL ACCOMMODATION</h2>
        </div>
    </section>

    <section>
        <div class="container mt-5">
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="assets/images/broom.jpg" class="img-fluid"
                        alt="Image of a balcony room with a bed, desk, and TV" />
                    <div class="fw-bold fs-5 mt-3">Balcony Room</div>
                    <div class="fw-bold fs-6">Rp 3.000.000 per night</div>
                    <div class="fw-bold fs-6">Distance : MAIN EVENT</div>
                    <br />
                    <p style="text-align: justify;">
                        This room category is ideal for those planning to enjoy an
                        extended stay at the Prime Plaza Hotel Sanur. Located on the
                        ground floor, it comes with a large balcony, so you’ll have your
                        own private space to relax in with views of our tropical Balinese
                        garden. Each balcony is fitted with outdoor furniture so you can
                        relax in the warm island breeze.
                        <br />
                        <br />
                        The room itself measures 45 sqm. Choose from a king-sized bed or
                        twin sharing. Rest assured that all our beds are plush and
                        comfortable, with perfectly plump pillows, a mattress topper, a
                        duvet and clean cotton bedsheets.
                        <br />
                        <br />
                        You can rest easy with cold air-conditioning, warm lighting and
                        reading lights for when you need them. There is a desk and a
                        chair, a flat-screen TV with international channels, ample
                        wardrobe space and a floor-to-ceiling mirror as well as a bathroom
                        with a hot and cold shower and a large sink.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="assets/images/sroom.jpg" class="img-fluid"
                        alt="Image of a suites room with a sofa, table, and a view into another room" />
                    <div class="fw-bold fs-5 mt-3">Suites Room</div>
                    <div class="fw-bold fs-6">Rp 4.500.000 per night</div>
                    <div class="fw-bold fs-6">Distance : MAIN EVENT</div>
                    <br />
                    <p style="text-align: justify;">
                        The perfect choice for those seeking even more space throughout
                        their stay, our Suite is 64 sqm, It’s bright, airy and
                        contemporary and features a living and dining area that’s separate
                        from the bedroom. In the living area, you’ll find a large,
                        comfortable L-shaped sofa and a round dining table that can seat
                        up to 4 people. The bedroom is in a separate room of its own and
                        comes with a king-sized bed and an ensuite bathroom, complete with
                        a bathtub and a shower.
                        <br />
                        <br />
                        The Suite is perfect for busy executives and those seeking their
                        own space that would allow them the freedom to focus - whether on
                        themselves, on work or on their loved ones while on holiday at
                        Prime Plaza Suites Sanur.
                    </p>
                </div>
            </div>
            <div class="text-center fw-bold fs-5 mt-5">Terms and Conditions</div>
            <div class="text-center mt-3">
                <p class="fw-bold">1. Room Rates</p>
                <p>Room rates include taxes and service charges.</p>
                <p class="fw-bold">2. Shuttle Service</p>
                <p>
                    Room rates include shuttle service to the Bali International
                    Convention Center. The shuttle schedule will be informed as soon as
                    possible.
                </p>
                <p class="fw-bold">3. Additional Requests</p>
                <p>
                    For additional requests, please contact <b>Julius Rael</b>, via WA at<a href="html_images.asp"
                        target="_blank "
                        style="
              color: hsl(209, 100%, 63%);
              background-color: transparent;
              text-decoration: none;
            ">
                        +62 813-3725-7999</a>
                </p>
            </div>
        </div>
    </section>
    @include('landing-page.partials.time')
@endsection
