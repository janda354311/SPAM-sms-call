@extends('layouts.front_app')

@section('title', 'Home')

@push('style')
    <style>
        section.landing-hero {
            position: relative;
            background: #fff;
            display: flex;
            height: calc(100% - 160px);
        }

        section.landing-hero .row {
            height: 100%;
            align-items: center;
        }

        section.landing-hero h1 {
            font-size: 40px;
            font-weight: 900;
            color: #fff;
            margin-bottom: 30px;
        }

        section.landing-hero p {
            font-size: 16px;
            color: #eee;
            margin-bottom: 30px;
        }

        section.landing-hero .col-md-6 {
            position: relative;
        }

        section.landing-hero .hero-image:before {
            content: '';
            position: absolute;
            display: block;
            background-image: url(<?= url('/img/gedung-itb.jpg') ?>);
            background-position: center;
            background-size: cover;
            width: 45%;
            height: 100%;
            top: 0;
            right: 0;
            opacity: .8;
        }

        section.landing-hero .hero-image:after {
            content: '';
            position: absolute;
            display: block;
            background-color: #005aab;
            width: 55%;
            height: 100%;
            top: 0;
            left: 0;
            border-radius: 0 0 0 25%;
        }

        @media (max-width: 767px) {
            section.landing-hero {
                height: calc(100% - 130px);
                padding: 50px 0;
            }

            section.landing-hero h1 {
                font-size: 30px;
            }

            section.landing-hero .hero-image:before {
                display: none;
            }

            section.landing-hero .hero-image:after {
                width: 100%;
                border-radius: 0 0 25% 0;
            }
        }
    </style>

    <style>
        .information-headline {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            margin-bottom: 30px;
        }

        .information-headline:before {
            content: '';
            position: absolute;
            display: inline-block;
            width: 100px;
            height: 100px;
            background: #005aab;
            border-radius: 50%;
        }

        .information-headline span {
            display: inline-block;
            background: #fff;
            font-size: 24px;
            font-weight: 700;
            font-style: italic;
            transform: rotate(-5deg);
        }

        .information-subheadline {
            width: 300px;
            display: inline-flex;
            align-items: center;
        }

        .information-subheadline:before {
            content: '';
            position: absolute;
            display: block;
            width: 300px;
            height: 3px;
            background: #005aab;
        }

        .information-subheadline span {
            display: inline-block;
            background: #fff;
            font-size: 16px;
            font-weight: 600;
            padding: 0 10px;
            margin: 0 auto;
            z-index: 1;
        }

        .fs-16px {
            font-size: 16px !important;
        }

        .fw-700 {
            font-weight: 700 !important;
        }
    </style>
@endpush

@section('content')
    {{-- <section style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div style="position: sticky; display: flex; flex-direction: column; justify-content: center; height: 100vh; top: 0;">
                        <h2 style="font-size: 36px; font-weight: 900;">Selamat Datang di <br>Website UPDA ITB</h2>
                        <p>Sekolah Pascasarjana akan menyelenggarakan Ujian Potensi Dasar Akademik (UPDA) ITB yang dapat digunakan untuk menggantikan persyaratan TPA Program Pascasarjana ITB. Lakukan registrasi untuk pendaftaran Ujian Potensi Dasar Akademik (UPDA) ITB.</p>
                        <div>
                            <a class="btn btn-primary" href="{{ url('register') }}">Mulai Pendaftaran</a>
                            <a class="btn btn-secondary" href="#guide">Langkah Pendaftaran</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div id="hero" class="d-flex" style="height: 100vh; align-items: center; justify-content: center;">
                        <img src="{{ url('/img/hero-image.png') }}" alt="" style="width: 100%;">
                    </div>
                    <div id="guide" class="d-flex flex-column" style="height: 100vh; align-items: center; justify-content: center;">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h2 style="font-size: 24px; font-weight: 900; margin-bottom: 20px;">Langkah Pertama</h2>

                                <img class="mb-4" src="{{ url('/img/guides/register_button_image.png') }}" alt="" style="max-width: 100%;">
                                <p class="mb-0">Klik tombol <strong>Mulai Pendaftaran</strong></p>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: right; margin-top: 20px;">
                            <a class="btn btn-sm btn-secondary text-uppercase" href="#hero">Kembali</a>
                            <a class="btn btn-sm btn-primary text-uppercase" href="#guide2">Lanjut</a>
                        </div>
                    </div>
                    <div id="guide2" class="d-flex flex-column" style="height: 100vh; align-items: center; justify-content: center;">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h2 style="font-size: 24px; font-weight: 900; margin-bottom: 20px;">Langkah Kedua</h2>

                                <img class="mb-4" src="{{ url('/img/guides/register_form_image.png') }}" alt="" style="max-width: 100%;">
                                <p class="mb-0">Isi data diri dengan benar, kemudian tunggu beberapa saat, sistem kami akan mengirim verifikasi akun ke email Anda</p>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: right; margin-top: 20px;">
                            <a class="btn btn-sm btn-secondary text-uppercase" href="#guide">Kembali</a>
                            <a class="btn btn-sm btn-primary text-uppercase" href="{{ url('/register') }}">Registrasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="landing-hero">
        <div class="hero-image"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Selamat Datang di <br>Website UPDA ITB</h1>
                    <p>Sekolah Pascasarjana akan menyelenggarakan Ujian Potensi Dasar Akademik (UPDA) ITB yang dapat digunakan untuk menggantikan persyaratan TPA Program Pascasarjana ITB. Lakukan registrasi untuk pendaftaran Ujian Potensi Dasar Akademik (UPDA) ITB.</p>
                    @if(!Auth::check())
                    <div>
                        <a class="btn btn-lg btn-primary fw-bolder mb-4" href="{{ url('/register') }}">Mulai Pendaftaran</a>
                        <a class="btn btn-lg btn-secondary fw-bolder mb-4" href="{{ url('/guide') }}">Langkah Pendaftaran</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($periode)
        <div id="information" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-10">
                        <div style="position: absolute; top: 20px; right: 20px;">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="information-headline">
                            <span>TELAH DIBUKA</span>
                        </div>
                        <div class="mx-auto" style="width: 300px;">
                            <div class="information-subheadline">
                                <span>PENDAFTARAN</span>
                            </div>
                            <div class="mt-3">
                                <p class="fs-16px fw-700 mb-0">{{$periode->name}}</p>
                                <ul>
                                    @foreach($batchs as $data_batch)
                                    <li><span class="fw-700">{{$data_batch->name}}</span> - {{Carbon\Carbon::parse($data_batch->mulai_ujian)->isoFormat('dddd, D MMMM Y')}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display:none;">

<a href="https://info.halal.go.id/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://bogor.perpusnas.go.id/xampp/rtp-slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://proklimkotacirebon.com/tampilan/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://sisfo.univpgri-palembang.ac.id/full/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://cbt.univpgri-palembang.ac.id/login/slot-gacor-online/" rel="dofollow">Slot Gacor</a>
<a href="https://bpsdm.sultengprov.go.id/assets/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://www.simpati.bpsdm.sultengprov.go.id/img/slot-gacor-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://siperbangkom.bpsdm.sultengprov.go.id/css/slot-online/" rel="dofollow">Slot Gacor</a>
<a href="https://e-letter.bpsdm.sultengprov.go.id/asset/slot-gacor-terpercaya/" rel="dofollow">Slot Gacor</a>
<a href="https://sagata.itb.ac.id/uploads/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://rupda.itb.ac.id/storage/-/slot-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://ptsp.halal.go.id/css/" rel="dofollow">Slot Gacor</a>
<a href="https://ptsp.halal.go.id/js/demo/" rel="dofollow">Slot Gacor</a>
<a href="https://ptsp.halal.go.id/KH/slot2023/" rel="dofollow">Slot Gacor</a>
<a href="https://test.halal.go.id/daftar-slot/" rel="dofollow">Slot Gacor</a>
<a href="https://test.halal.go.id/resmi/" rel="dofollow">Slot Gacor</a>
<a href="https://simadu.poltekkes-smg.ac.id/files/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://stih-painan.ac.id/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://lms.uptdbtikdisdik.sumselprov.go.id/assets/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://pkk.merauke.go.id/.well-known/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://dama.poltekbangsby.ac.id/dashboard/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://dama.poltekbangsby.ac.id/aset/slot-gacor-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://dinsos.merauke.go.id/.sass-cache/-/slot-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://dinsos.merauke.go.id/berita/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://elapor.merauke.go.id/assets/css/tag/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://elapor.merauke.go.id/-/slot-terbaru/" rel="dofollow">Slot Gacor</a>
<a href="https://pkk.merauke.go.id/.well-known/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://pkk.merauke.go.id/backend/admin/situs-rtp-slot/" rel="dofollow">Slot Gacor</a>
<a href="https://pkk.merauke.go.id/images/-/slot88-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://e-rekrutmen.mojokertokab.go.id/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="http://mbkm.ft.unsri.ac.id/public/frontend/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="http://mbkm.ft.unsri.ac.id/public/public/-/slot-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://www.simpeg.kolakakab.go.id/pages/" rel="dofollow">Slot Gacor</a>
<a href="https://e-rekrutmen.mojokertokab.go.id/rtp-slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://sidonor.pmi.okuselatankab.go.id/main/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://sidonor.pmi.okuselatankab.go.id/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://pmi.okuselatankab.go.id/wp-content/uploads/slot-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://pmi.okuselatankab.go.id/wp-content/slot-gacor " rel="dofollow">Slot Gacor</a>
<a href="https://disapaidaman.kukarkab.go.id/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://perizinankotacirebon.com/bagian/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://pemulihandlhkotacirebon.com/css/slot-gacor-maxwin/" rel="dofollow">Slot Gacor</a>
<a href="https://ecp.tnbilsas.com.my/storage/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://dkkp.pip-semarang.ac.id/files/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://sp.sidomuncul.co.id/sp_mon/mod_user/Slot-Gacor-Hari-Ini/" rel="dofollow">Slot Gacor</a>
<a href="https://sehati.halal.go.id/login/" rel="dofollow">Slot Gacor</a>
<a href="http://pintar.jatengprov.go.id/packages/slot-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="http://pintar.jatengprov.go.id/public/uploads/icon/login-slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="http://pintar.jatengprov.go.id/public/uploads/users/slot-gacor-resmi/" rel="dofollow">Slot Gacor</a>
<a href="https://sehati.halal.go.id/login/" rel="dofollow">Slot Gacor</a>
<a href="https://www.simpeg.kolakakab.go.id/siaga/" rel="dofollow">Rtp slot</a>
<a href="https://disapaidaman.kukarkab.go.id/rtp-slot-gacor/" rel="dofollow">Rtp slot</a>
<a href="https://sp.sidomuncul.co.id/sp_mon/rtp-slot/" rel="dofollow">Rtp Slot</a>

            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(window).on('load', function() {
            $('#information').modal('show');
        })
    </script>
@endpush
