@extends('layouts.landing')
@section('content')
    <section class="module parallax2 parallax-2 d-flex mb-4">
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
              src="assets/images/datuk.png"
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
              src="assets/images/datukdr.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt=""
            />
            <h5>Dr. Stephen Moss</h5>
            <h6>Chairman, DAI Capital</h6>
            <p>
              Dr Moss is a consultant and adviser
              with a background in law,
              psychology and business. He is also
              an early-stage entrepreneurial
              investor in start-ups and growth
              companies in financial and
              professional services, law and
              biotechnology. He held leading
              roles in PwC, IBM Consulting and
              Cardno Acil, as well as managed
              company sales, acquisitions and
              mergers. He has consulted for over
              25 years with international, UK and
              Australian law firms in the legal
              and health services industries.
              Dr Moss’s commitment to social
              justice and human rights has led
              him to work with Pathways
              Foundation, Child Fund and
              Amnesty International.
            </p>
          </div>
        </div>
        <div class="text-center mt-5">
          <h4>MODERATOR</h4>
          <img
            src="assets/images/andy.png"
            height="150"
            width="150"
            class="rounded-circle mb-3"
            alt=""
          />
          <h5>Prof. Dr. Andy Liew</h5>
          <h6>Vice Chancellor, HELP University</h6>
          <p>
            Over a span of 30 years Prof Liew
            has held senior positions in
            conventional and open distance
            learning institutions in Malaysia.
            His focus is on quality assurance in
            higher education, strategic
            planning, online teaching and
            learning, Open Educational
            Resources (OER) and accreditation
            of prior experiential learning
            (APEL). As lead assessorfor the
            Malaysian Qualifications Agency
            (MQA), he helped shape national
            policies and frameworks, including
            the development of the General
            Guidelines of Practice for
            Accreditation of Prior Experiential
            Learning (APEL.C and APEL.Q), and
            the Code of Practice for
            Programme Accreditation for Open
            and Distance Learning (ODL)
            programmes. He also collaborates
            with a vast network of ODL experts
            across Asia.
          </p>
        </div>
        <hr / class="mt-5 " style="border-width: 2px;">
        <div class="text-center mt-5">
          <h4>Session 2</h4>
        </div>
        <div class="row text-center">
          <div class="col-md-6">
            <img
              src="assets/images/bandem.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              style="object-fit: cover; object-position: top;"
              alt=""
            />
            <h5>Prof. Dr. I Made Bandem</h5>
            <h6>Foundation Trustee Of ITB STIKOM Bali</h6>
            <p>Bandem served as the director of the Indonesian College of the Arts in Denpasar for 16 years. He was also the rector of Indonesia's oldest cultural institution, the Indonesia Institute of the Arts Yogyakarta. He is currently a professor of Balinese dance and music at the College of the Holy Cross in Worcester, Massachusetts, where he teaches music and dance dealing with the Bali-Gamelan.

              As an artist and as a visiting scholar, Bandem has taught and performed Balinese dance throughout the world. In a 1980 profile, The New York Times described him as "the Joe Papp of Bali."
          
              Bandem's contributions to arts and culture include achievements in ethnomusicology, educational administration, arts and culture management, and politics.</p>
          </div>
          <div class="col-md-6">
            <img
              src="assets/images/ida.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt=""
            />
            <h5>Dr. Ida Bagus Rai Dharmawijaya Mantra</h5>
            <h6>Politician</h6>
            <p>Ida Bagus Rai Dharmawijaya Mantra, S.E., M.Sc., or commonly called Rai Mantra (born April 30, 1967) is an Indonesian politician. He served as Mayor of Denpasar from 2008 to 2010, replacing Anak Agung Gede Ngurah Puspayoga who became Deputy Governor of Bali. He was then elected in the Denpasar regional election and served for the 2010-2015 period and the 2016-2021 period. In 2018, Rai Mantra ran as a candidate for governor of Bali in the 2018 regional election.</p>
          </div>
          <div class="text-center mt-5">
            <h4>MODERATOR</h4>
            <img
              src="assets/images/marlowe.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt=""
            />
            <h5>I Made Marlowe Makaradhwaja Bandem</h5>
            <h6>Artist</h6>
            <p>
              I Made Marlowe Makaradhwaja Bandem is an individual with eclectic talents, interests and professions. Marlowe co-founded 370s in July 1928 to realize an economic vision. Together with his beloved wife 370s-Marl. Marlowe is also known as a banker. He manages various financial challenges in spirit. Marlowe also pursues the dynamic world of art and technology, currently he is part of Quantum Temple, which utilizes Web 3.0 and blockchain for the preservation of indigenous cultural heritage.
            </p>
          </div>
        </div>
      </div>
    </div>
    @include('landing-page.partials.time')
@endsection
