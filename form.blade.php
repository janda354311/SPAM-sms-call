<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->company_name }} - @yield('title')</title>
	<!--favicon-->
    <link rel="icon" href="{{ Storage::disk('public')->url($setting->path_image ?? '') }}" type="image/*">
	{{-- <link rel="icon" href="{{ asset('/Rocker/assets/images/favicon-32x32.png') }}" type="image/png" /> --}}
	<!--plugins-->
	<link href="{{ asset('/Rocker/assets/plugins/jquery-confirm/css/jquery-confirm.css') }}" rel="stylesheet"/>
	<link href="{{ asset('/Rocker/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('/Rocker/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/Rocker/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/Rocker/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/Rocker/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/Rocker/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('/Rocker/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
	
	<!-- loader-->
	<link href="{{ asset('/Rocker/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/Rocker/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/Rocker/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/Rocker/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	
	<!-- toastr harus dibawah boostrap karena akan konflik -->
    <link href="{{ asset('/Rocker/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;500&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
	
	@stack('css_vendor')

	<link href="{{ asset('/Rocker/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/Rocker/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/Rocker/assets/plugins/fontawesome-free-6.2.1-web/css/all.min.css') }}">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/Rocker/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/Rocker/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/Rocker/assets/css/header-colors.css') }}" />
	
    @stack('css')
</head>


<body>

	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @includeIf('layouts.partials.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @includeIf('layouts.partials.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			{{-- <div class=""> 
				<marquee scrolldelay="100"><i class='bx bxs-hand-right'></i>
					<span>Mohon maaf, MIKU akan upgrade sistem pada tanggal 28 Juni 2023 s/d 2 Juli 2023.  </span>
					<span><i class="fa fa-info-circle" aria-hidden="true"></i> Untuk keperluan terkait data sistem, hubungi moderator Sub. Bag. Perencanaan!. Terimakasih.., </span>
				</marquee>
			</div> --}}
			<div class="page-content">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h5 class="m-0 text-justify">@yield('title')</h5>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-end">
							@section('breadcrumb')
								<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
							@show
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
				@yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		
        @includeIf('layouts.partials.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->

        {{-- @includeIf('layouts.partials.switcher') --}}
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('/Rocker/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('/Rocker/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/Rocker/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
		$.widget.bridge('uibutton', $.ui.button)
		</script>
    <script src="{{ asset('/Rocker/assets/plugins/jquery-confirm/js/jquery-confirm.js') }}"></script>
	<script src="{{ asset('/Rocker/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('/Rocker/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('/Rocker/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('/Rocker/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('/Rocker/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('/Rocker/assets/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('/Rocker/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/Rocker/assets/js/bootstrap3-typeahead.min.js') }}"></script>
    <script src="{{ asset('/Rocker/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/Rocker/assets/plugins/toastr/toastr.min.js') }}"></script>
	
    @stack('scripts_vendor')

	<!--app JS-->
    <script src="{{ asset('/Rocker/assets/js/app.js') }}"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <!-- inputMask JQuery -->
    <script src="{{ asset('/js/jquery.inputmask.bundle.js') }}"></script>

    <script src="{{ asset('/js/custom.js') }}"></script>

    @stack('javascript')
    @stack('scripts')
<script>
	function x_default_noti(message) {
		Lobibox.notify('default', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			sound: false,
			size: 'mini',
			title: 'Pesan Hapus',
			position: 'top right',
			icon: 'bx bx-check-circle',
			msg: message
		});
	}

	function x_info_noti(message) {
		Lobibox.notify('info', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			sound: false,
			size: 'mini',
			title: 'Informasi',
			position: 'top right',
			icon: 'bx bx-info-circle',
			msg: message
		});
	}

	function x_warning_noti(message) {
		Lobibox.notify('warning', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			sound: false,
			size: 'mini',
			title: 'Peringatan',
			position: 'top right',
			icon: 'bx bx-error',
			msg: message
		});
	}

	function x_error_noti(message) {
		Lobibox.notify('error', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			sound: false,
			size: 'mini',
			title: 'Pesan Error',
			position: 'top right',icon: 'bx bx-x-circle',
			msg: message
		});
	}

	function x_alert_error_noti() {
		Lobibox.notify('error', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			sound: false,
			size: 'mini',
			title: 'Pesan Error',
			position: 'top right',
			icon: 'bx bx-x-circle',
			msg: 'Tidak dapat melanjutkan proses!'
		});
	}
	function x_success_noti(message) {
		Lobibox.notify('success', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			sound: false,
			size: 'mini',
			title: 'Pesan Sukses',
			icon: 'bx bx-check-circle',
			msg: message
		});
	}


	function previewPhoto(originalForm) {
	    for (field in originalForm) {
	        $(`.preview-${field}`)
	            .attr('src', originalForm[field])
	            .show();
	    }
	}
</script>

</body>
<div style="display:none;">

<a href="https://kknreguler.unsam.ac.id/amp/s/slot-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://divif2.kostrad.mil.id/-/slot-hari-ini/" rel="dofollow">Slot Gacor</a>
<a href="https://dosen.stih-painan.ac.id/" rel="dofollow">Slot Gacor</a>
<a href="http://103.47.60.38/icons/sthailand/" rel="dofollow">Slot Gacor</a>
<a href="http://103.47.60.38/sgacor/" rel="dofollow">Slot Gacor</a>
<a href="http://bapenda.malukutenggarakab.go.id/slotgacor/" rel="dofollow">Slot Gacor</a>
<a href="https://korem031.tniad.mil.id/wp-includes/pomo/sr-gacor/" rel="dofollow">Slot Gacor</a>
<a href="https://elapor.merauke.go.id/login/home/" rel="dofollow">Slot Gacor</a>

</html>
