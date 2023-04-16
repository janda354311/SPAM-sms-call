@extends('layouts.front_app')

@section('title', 'Form')

@push('style')
    <style>
        #periodeWrap {
            display: none;
        }

        select>option.selectable[disabled] {
            background: red;
        }
    </style>
@endpush

@section('content')
    {{-- <section style="background: #0000FF; color: #fff; padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase" style="font-weight: 700;">Form</h2>
                </div>
            </div>
        </div>
    </section> --}}

    @if($periode)
        <section style="padding: 50px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto" style="min-height: calc(100vh - 260px);">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Selamat!</strong> {!! Session::get('success') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Maaf!</strong> {!! Session::get('failed') !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <div class="card mb-4" style="border: none; border-radius: 20px;">
                            <div class="card-body" style="padding: 50px;">
                                <h2>Pilih Batch Pendaftaran {{$periode->name}}</h2>
                                <select class="form-control" name="periode" id="periodeSelect">
                                    <option selected disabled>Pilih batch</option>
                                    @foreach($batch as $batchs_data)
                                        <option class="selectable" value="{{$batchs_data->id}}" {{$batchs_data->active == 1 ? '' : 'disabled'}}>{{$batchs_data->name}} ({{Carbon\Carbon::parse($batchs_data->mulai_ujian)->isoFormat('dddd, D MMMM Y');}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="periodeNull">
                            <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_qgbmyod8.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin: -50px auto 0;" loop autoplay></lottie-player>
                            <h2 class="text-center">Anda belum memilih batch pendaftaran</h2>
                            <p class="text-center">Silakan pilih batch pendaftaran terlebih dahulu</p>
                        </div>

                        @foreach($batch as $data_batch)
                            <div class="periodeWrap" data-id="{{$data_batch->id}}" style="display: none;">
                                <div class="card mb-4" style="border: none; border-radius: 20px;">
                                    <div class="card-body" style="padding: 50px;">
                                        <h2>Pendaftaran UPDA SPs ITB - {{$data_batch->name}}</h2>
                                        <p>Ujian Potensi Dasar Akademik (UPDA) Sekolah Pascasarjana ITB</p>
                                        <p>Sekolah Pascasarjana akan menyelenggarakan Ujian Potensi Dasar Akademik (UPDA) ITB yang dapat digunakan untuk menggantikan TPA sebagai persyaratan program pascasarjana ITB yang akan dilaksanakan pada 
                                            {{Carbon\Carbon::parse($data_batch->mulai_ujian)->isoFormat('dddd, D MMMM Y')}} (luring) di Kampus Jl. Ganesha No. 10 Bandung.</p>
                                        <ol>
                                            <li>Batas pendaftaran {{Carbon\Carbon::parse($data_batch->batas_pembayaran)->isoFormat('dddd, D MMMM Y')}}</li>
                                            <li>Batas pembayaran {{Carbon\Carbon::parse($data_batch->batas_pembayaran)->isoFormat('dddd, D MMMM Y')}}</li>
                                            <li>Tempat terbatas, jika kuota terpenuhi akan dialihkan ke jadwal selanjutnya</li>
                                            <li>Pendaftar dapat menggunakan NIM, No. Seleksi atau NIK untuk melakukan pendaftaran.</li>
                                        </ol>
                                        <p>* Virtual Account untuk pembayaran akan dikirimkan melalui email beberapa saat setelah pendaftaran ke email terdaftar</p>
                                        <p>Kontak: info@sps.itb.ac.id</p>
                                    </div>
                                </div>

                                <div class="card" style="border: none; border-radius: 20px;">
                                    <div class="card-body" style="padding: 50px;">
                                        
                                            @csrf
                                            <input type="hidden" name="batch_id" value="{{$data_batch->id}}">
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">Nama</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">WhatsApp</label>
                                                <input type="number" name="phone" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">NIK</label>
                                                <input type="number" name="nik" class="form-control" required>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-md-3 mb-3">
                                                    <label class="align-self-center form-label" for="status">Status</label>
                                                    <select class="form-control status" required>
                                                        <option value="" disabled selected>- Pilih status -</option>
                                                        <option value="nim{{$data_batch->id}}">NIM</option>
                                                        <option value="no_seleksi{{$data_batch->id}}">No. Seleksi</option>
                                                        {{--<option value="nik{{$data_batch->id}}">NIK</option>--}}
                                                    </select>
                                                </div>
                                                <div class="col-md-9 mb-3 jenis-status" data-id="attention{{$data_batch->id}}">
                                                    <label class="form-label mt-8 mb-0"><span class="text-danger">*</span> Pilih status terlebih dahulu</label>
                                                </div>
                                                <div class="col-md-9 mb-3 jenis-status" data-id="nim{{$data_batch->id}}" style="display: none;">
                                                    <label class="align-self-center form-label">NIM</label>
                                                    <input type="number" name="nim" class="form-control" required disabled>
                                                </div>
                                                <div class="col-md-9 mb-3 jenis-status" data-id="no_seleksi{{$data_batch->id}}" style="display: none;">
                                                    <label class="align-self-center form-label">No. Seleksi</label>
                                                    <input type="number" name="no_seleksi" class="form-control" required disabled>
                                                </div>
                                                <div class="col-md-9 mb-3 jenis-status" data-id="nik{{$data_batch->id}}" style="display: none;">
                                                    <label class="align-self-center form-label">NIK</label>
                                                    <input type="number" name="nik" class="form-control" required disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <p class="fw-bold text-danger mb-0">*Mahasiswa ITB Harus Masukin NIM</p>
                                                <p class="fw-bold text-danger mb-0">*Pelamar ITB Harus Masukin No Seleksi</p>
                                                <p class="fw-bold text-danger mb-0">*Umum  Harus Masukin NIK</p>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">Strata</label>
                                                <select name="strata" class="form-control" required>
                                                    <option value="" selected disabled>- Pilih strata -</option>
                                                    <option value="Magister">Magister</option>
                                                    <option value="Doktor">Doktor</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">Fakultas</label>
                                                <select name="fakultas" class="form-control" required>
                                                    <option value="" selected disabled>- Pilih fakultas -</option>
                                                    @foreach($fakultas as $data_fakultas)
                                                        <option value="{{$data_fakultas->id}}">{{$data_fakultas->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">
                                                    Pas Foto Wajah
                                                    <span style="font-size: 12px; line-height: 1;">(Image JPEG, JPG, PNG)</span>
                                                </label>
                                                <input type="file" name="foto" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="align-self-center form-label">
                                                    Keikutsertaan UPDA
                                                </label>
                                                @foreach($previous_batches as $batch_data)
                                                    <label class="d-block">
                                                        <input type="checkbox" name="batchs[]" value="{{$batch_data->id}}">
                                                        {{$batch_data->name}} ({{$batch_data->date}})
                                                    </label>
                                                @endforeach
                                                <label class="d-block">    
                                                    <input type="checkbox" name="batchs[]" value="0">
                                                    Belum Pernah
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="periodeFull" class="col-md-10 mx-auto" style="display: none;">
                                <div class="card" style="border: none; border-radius: 20px;">
                                    <div class="card-body" style="padding: 50px;">
                                        <div class="text-center">
                                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_s9lvjg2e.json"  background="transparent"  speed="1"  style="width: 100%; height: 300px; margin-top: -100px; margin-bottom: 10px;"  loop  autoplay></lottie-player>
                                            <h1 class="text-dark fs-1 fw-bolder mb-0">Pendaftaran untuk batch ini sudah penuh</h1>
                                            <p class="text-muted mb-0">Mohon daftar pada batch yang lainnya.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <section style="padding: 50px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card" style="border: none; border-radius: 20px;">
                            <div class="card-body" style="padding: 50px;">
                                <div class="text-center">
                                    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_s9lvjg2e.json"  background="transparent"  speed="1"  style="width: 100%; height: 300px; margin-top: -100px; margin-bottom: 10px;"  loop  autoplay></lottie-player>
                                    <h1 class="text-dark fs-1 fw-bolder mb-0">Pendaftaran belum dibuka</h1>
                                    <p class="text-muted mb-0">Mohon menunggu pendaftaran UPDA ITB periode selanjutnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        $('input[type="checkbox"][name="batchs[]"]').on('change', function() {
            if( $(this).prop('checked') == true && $(this).val() == 0 ) {
                $('input[type="checkbox"][name="batchs[]"]').prop('disabled', true)
                $('input[type="checkbox"][name="batchs[]"]').prop('checked', false)
                $(this).prop('disabled', false)
                $(this).prop('checked', true)
            } else if( $(this).prop('checked') == false && $(this).val() == 0 ) {
                $('input[type="checkbox"][name="batchs[]"]').prop('disabled', false)
            }
        })
    </script>
    <script>
        $('#periodeSelect').change(function() {
            var batch_id = $(this).val();
            var batas_pendaftar = 400;

            //variable penampung data answer
            res = '';
            //variable penampung data answer

                $.ajax({
                    url : "/check-pendaftar/" + batch_id,
                    type : "GET",
                    data : {
                    batch_id : batch_id,
                    },
                    success : function(res){
                        count_pendaftar = res;
                        if(count_pendaftar >= batas_pendaftar)
                        {
                            $('#periodeNull').hide();
                            $('.periodeWrap[data-id]').hide();
                            $('#periodeFull').show();
                        }

                        else
                        {
                            $('#periodeNull').hide();
                            $('#periodeFull').hide();
                            $('.periodeWrap[data-id]').hide();
                            $('.periodeWrap[data-id="'+ batch_id +'"]').show();
                            $('.periodeWrap[data-id="'+ batch_id +'"]').css({'opacity': 0,'margin-top': '50px'});
                            $('.periodeWrap[data-id="'+ batch_id +'"]').animate({'opacity': 1,'margin-top': 0}, 500);
                        }
                    },

                    error : function(){
                        console.log('error');
                    }
                });
        });

        $('.status').change(function() {
            var status = $(this).val();

            $('.jenis-status[data-id]').hide();
            $('.jenis-status[data-id]').find('input').attr('disabled', true);
            $('.jenis-status[data-id="'+ status +'"]').fadeIn();
            $('.jenis-status[data-id="'+ status +'"]').find('input').attr('disabled', false);
        });
    </script>
@endpush
