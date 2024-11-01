@extends('layouts.landing')
@section('content')
    <section class="module parallax2 parallax-3 d-flex mb-4">
        <div class="container d-flex text-center align-items-center justify-content-center text-white">
            <h2>COMMITTEE</h2>
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
                            Prof. Dr. Andy Liew<br />
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
                            Ni Nyoman Supuwiningsih, S.T., M.Kom<br />
                            Dr. I Gusti Ayu Widari Upadani, M.Agb<br />
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

    @include('landing-page.partials.time')
@endsection
