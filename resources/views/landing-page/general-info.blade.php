@extends('layouts.landing')
@section('content')
    <section class="module parallax2 parallax-2 d-flex mb-4">
        <div class="container d-flex text-center align-items-center justify-content-center text-white">
            <h2>GENERAL INFORMATION</h2>
        </div>
    </section>

    <section>
        <a class="container d-flex justify-content-center align-items-center" href="#">
            <img src="assets/images/poster4.jpg" alt="Bootstrap" width="100%" height="100%" />
        </a>
    </section>

    <section>
        <div class="container">
            <div class="d-flex col-6 mx-auto mt-4 pt-4 justify-content-center">
                <div class="flex-grow-1 d-flex gap-2 col-6 mx-auto mt-4 pt-4 justify-content-center">
                    <div class="card col-12">
                        <div class="card-body text-center cream">
                            <h2 class="card-text">CONFERENCE REGISTRATION</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <div class="container text-center text-white">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center cream csize">
                                    <p class="card-text m-2"><br /></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center cream csize">
                                    <p class="text-center m-2">NATIONAL</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center cream csize">
                                    <p class="card-text m-2">INTERNATIONAL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center cream csize">
                                    <p class="card-text m-2">INDUSTRY/GOVERNMENT</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center blue text-white csize">
                                    <p class="card-text">
                                        IDR <br />
                                        600.000
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center blue text-white csize">
                                    <p class="card-text">
                                        USD<br />
                                        75
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center cream csize">
                                    <p class="card-text m-2">LECTURE</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center blue text-white csize">
                                    <p class="card-text">
                                        IDR <br />
                                        500.000
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center blue text-white csize">
                                    <p class="card-text">
                                        USD<br />
                                        75
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center cream csize">
                                    <p class="card-text m-2">STUDENT</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center blue text-white csize">
                                    <p class="card-text">
                                        IDR <br />
                                        450.000
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center blue text-white csize">
                                    <p class="card-text">
                                        USD<br />
                                        75
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
                class="container d-flex justify-content-center mt-4 fw-bold fst-italic"
              >
                <h3>
                  REGISTRATION
                  <a style="color: red">VALID UNTIL 16 NOVEMBER 2024</a>
                </h3>
              </div> 

        <div class="container d-flex mt-4">
            <br />
            <h6 class="fw-bold">Payment Notification:</h6>
        </div>
        <div class="container">
            <p>
                We are pleased to inform you that payment for our services can be
                processed through our secure payment gateway. A personalized payment
                link will be sent directly to your email. Please follow the link to
                complete your transaction quickly and securely. For questions or
                assistance, please contact our support team <b>Julius Rael</b>, via WA at<a href="html_images.asp"
                    target="_blank "
                    style="
              color: hsl(209, 100%, 63%);
              background-color: transparent;
              text-decoration: none;
            ">
                    +62 813-3725-7999</a>
                <br /><br />
            </p>
        </div>
    </section>

    <section>
      <h4 class="text-center">Benefit:</h4><br/>
      <div class="container text-center justify-content-center d-flex">
        <div class="row benefit">
          <div class="col-4">
            <img
              src="assets/certificate.png"
              alt="" width="50%" height="50%"
            />
            <br/><br/><h6>Certificate</h6>
          </div>
          <div class="col-4">
            <img src="assets/merchandise.png" alt="" width="50%" height="50%" />
            <br/><br/><h6>Merchandise</h6>
          </div>
          <div class="col-4">
            <img src="assets/open-book.png" alt="" width="50% " height="50%" />
            <br/><br/><h6>Seminar Kit</h6>
          </div>
        </div>
      </div>
    </section>

    @include('landing-page.partials.time')
@endsection
