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
              He is Founder and President of HELP University (Malaysia), a highly respected international private university that manages more than 10,000 students in Malaysia and Asia. He is also Executive Director of HELP International Corporation which is listed on the Malaysian Stock Exchange. An economist by training, he studied at the University of Malaya and McMaster University, Canada and completed his PhD at the Australian National University. Dr. Chan has a distinguished academic career. He was Chairman, Division of Applied Economics, University of Malaya. He has published widely, taught in many universities, and participated in numerous professional seminars.
            </p>
          </div>
          <div class="col-md-6">
            <h5 class="mb-2">SPEAKER 2</h5>
            <img
              src="assets/images/bandem.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt=""
            />
            <h5>Prof. Dr. I Made Bandem</h5>
            <h6>Foundation Trustee Of ITB STIKOM Bali</h6>
            <p>
Bandem served as the director of the Indonesian College of the Arts in Denpasar for 16 years. He was also the rector of Indonesia's oldest cultural institution, the Indonesia Institute of the Arts Yogyakarta. He is currently a professor of Balinese dance and music at the College of the Holy Cross in Worcester, Massachusetts, where he teaches music and dance dealing with the Bali-Gamelan.

              As an artist and as a visiting scholar, Bandem has taught and performed Balinese dance throughout the world. In a 1980 profile, The New York Times described him as "the Joe Papp of Bali."
          
              Bandem's contributions to arts and culture include achievements in ethnomusicology, educational administration, arts and culture management, and politics.
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
              src="assets/images/datukdr.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              style="object-fit: cover; object-position: top;"
              alt=""
            />
            <h5>Dr. Stephen Moss</h5>
            <h6>Chairman, DAI Capital</h6>
            <p>Dr Moss is a consultant and adviser
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
              Amnesty International.</p>
          </div>
          <div class="col-md-6">
            <img
              src="assets/images/marloebandem.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt=""
            />
            <h5>I Made Marlowe Makaradhwaja Bandem</h5>
            <h6>Artist</h6>
            <p>Marlowe Bandem, is a co-founder of the Bali 1928 Archives, which preserves historical documents from Bali in the 1930s. He is also a banker and a writer/art curator. He is currently the Executive Director of Quantum Temple in Indonesia, a Web 3.0 and blockchain platform for cultural preservation, and an advisor to SAKA Museumi, which is listed in TIME Magazine’s World’s Famous Places 2024.</p>
          </div>
          <div class="text-center mt-5">
            <h4>MODERATOR</h4>
            <img
              src="assets/images/prapita.jpeg"
              height="150"
              width="150"
              class="rounded-circle mb-3"
              alt=""
            />
            <h5>Luh Putu Ayu Prapitasari, S.T., M.Sc</h5>
            <h6>Senior Lecturer</h6>
            <p>
            Luh Putu Ayu Prapitasari is a senior lecturer at the STIKOM Bali Institute of Technology and Business since 2005, and a guest lecturer at the Malang State Polytechnic (Polinema) since 2023. She has an educational background of M.Sc. Computer Science from the University of Mysore, India, and S.Kom. Informatics Engineering from the Indonesian Digital Technology University, Yogyakarta.  
            </p>
          </div>
        </div>
      </div>
    </div>
    @include('landing-page.partials.time')
@endsection
