<!DOCTYPE html>
<html lang="en" class="root-text-">
<head>
	<meta charset="utf-8">
	<title>{{ env('APP_NAME') }}</title>
	<meta name="csrf" content="{{ csrf_token() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="msapplication-tap-highlight" content="no">
	<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('assets/css/vendors.bundle.css') }}?v={{ env('APP_VERSION') }}">
	<link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('assets/css/app.bundle.css') }}?v={{ env('APP_VERSION') }}">
	<link id="mytheme" rel="stylesheet" media="screen, print" href="{{ asset('assets/css/themes/cust-theme-7.css') }}?v={{ env('APP_VERSION') }}">
	<link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('assets/css/skins/skin-master.css') }}?v={{ env('APP_VERSION') }}">

	<link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/datagrid/datatables/datatables.bundle.css') }}?v={{ env('APP_VERSION') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/notifications/sweetalert2/sweetalert2.bundle.css') }}?v={{ env('APP_VERSION') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/formplugins/select2/select2.bundle.css') }}?v={{ env('APP_VERSION') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}?v={{ env('APP_VERSION') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/formplugins/summernote/summernote.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('assets/css/notifications/toastr/toastr.css') }}">

	<style type="text/css">
	    .wd-30 { width: 30px !important; }
	    .wd-50 { width: 50px !important; }
	    .wd-80 { width: 80px !important; }
	    .wd-90 { width: 90px !important; }
	    .wd-100 { width: 100px !important; }
	    .wd-110 { width: 110px !important; }
	    .wd-120 { width: 120px !important; }
	    .wd-140 { width: 140px !important; }
	    .wd-150 { width: 150px !important; }
	    .wd-160 { width: 160px !important; }
	    .wd-180 { width: 180px !important; }
	    .wd-200 { width: 200px !important; }
	    .wd-250 { width: 250px !important; }
	    .wd-300 { width: 300px !important; }
	    .wd-350 { width: 350px !important; }
	    .wd-400 { width: 400px !important; }
	    .no-padding { padding: 0px !important; }
	    .no-margin { margin: 0px !important; }
	    .padding-5 { padding: 5px !important; }
	    .color-white { color: white !important; }
	    .vertical-baseline { vertical-align: baseline !important; }
	    .f-8 { font-size: 8px; }
	    .f-10 { font-size: 10px; }
	    .f-11 { font-size: 11px; }
	    .f-12 { font-size: 12px; }
	    .f-14 { font-size: 14px; }
	    .f-18 { font-size: 18px; }
	    .f-20 { font-size: 20px; }
	    .f-22 { font-size: 22px; }
	    .f-24 { font-size: 24px; }
	    .act-col {
	        padding: 8px !important;
	        text-align: center;
	    }
	    .nav-menu li a {
	        padding: 12px 25px;
	    }
	    .page-logo {
	        padding: 0 15px;
	    }
	    .nav-function-fixed:not(.nav-function-top) .page-sidebar .slimScrollDiv {
	        height: calc(100%)!important;
	    }
	    .nav-title {
	        margin-top: 10px;
	        margin-bottom: -5px;
	    }
	    .info-card {
	        height: 6rem;
	        padding: 0 1rem;
	    }
	    .panel-toolbar {
	        display: none;
	    }
	    .dataTables_empty {
	        color: #56636d;
	        font-size: 18px;
	    }
	    .disabled-none {
	    	display: none;
	    }
        .note-toolbar .note-dropdown-menu.note-check a i
        {
            visibility:inherit;
            color:black
        }

        i.note-icon-menu-check {
             color: white;
        }

        .deleteIcon{
            color: #ff0303!important;
        }
    </style>

	<script>
        var classHolder = document.getElementsByTagName("BODY")[0];
	</script>

	@yield('extra_style')

</head>
<body class="mod-bg-1 mod-nav-link header-function-fixed nav-function-fixed">
	<div loading-area style="display:none;width: 100vw;height: 100vh;position: fixed;z-index: 9999999999999;background-color: #7676768a;">
		<div style="text-align: center;left: 51%;top: 35%;position: absolute;">
			<div class="spinner-border text-light" role="status">
				<span class="sr-only">Yükleniyor...</span>
			</div>
			<h4 class="mt-2 text-light">Yükleniyor</h4>
		</div>
	</div>

	<div class="page-wrapper">
		<div class="page-inner">
			<aside class="page-sidebar">
				<div class="page-logo">
						<span class="page-logo-text" style="margin-left: -8px;text-align: center;">Laravel
                        </span>
						<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
				</div>
				<nav id="js-primary-nav" class="primary-nav" role="navigation">
					<div class="info-card">
						<img src="{{ Gravatar::src(Auth::user()->email ?? 'test@test.com') }}" class="profile-image rounded-circle">
						<div class="info-card-text">
							<a href="{{ route('panel.profile') }}" class="d-flex align-items-center text-white">
								<span class="text-truncate text-truncate-sm d-inline-block">
									{{ Auth::user()->name ?? "-" }} {{ Auth::user()->surname ?? "-" }}
								</span>
							</a>
							<span class="d-inline-block text-truncate text-truncate-md">
								{{ @Auth::user()->title ?? "-" }}
							</span>
						</div>
						<img src="{{ asset('assets/img/card-backgrounds/cover-3-lg.png') }}" class="cover" alt="cover">
					</div>
					<ul id="js-nav-menu" class="nav-menu">

						<li class="{{ in_array(Route::currentRouteName(), ['panel.index']) ? 'active' : '' }}">
							<a href="{{ route('panel.index') }}" title="Ana Sayfa" data-filter-tags="Ana Sayfa">
								<i class="fal fa-desktop"></i>
								<span class="nav-link-text" data-i18n="nav.dashboard">Anasayfa</span>
							</a>
						</li>
                        <li class="{{ Helpers::activeMenu(['team']) }}">
                            <a href="{{ route('panel.team_list') }}" data-filter-tags="Ekibimiz">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Ekibimiz</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['appointment']) }}">
                            <a href="{{ route('panel.appointment_list') }}" data-filter-tags="Randevular">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Randevular</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['appointment_request']) }}">
                            <a href="{{ route('panel.appointment_request_list') }}" data-filter-tags="Talepler">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Talepler</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['article']) }}">
                            <a href="{{ route('panel.article_list') }}" data-filter-tags="Makaleler">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Makaleler</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['article_category']) }}">
                            <a href="{{ route('panel.article_category_list') }}" data-filter-tags="Makale Kategorileri">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Makale Kategorileri</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['blog']) }}">
                            <a href="{{ route('panel.blog_list') }}" data-filter-tags="Bloglar">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Bloglar</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['blog']) }}">
                            <a href="{{ route('panel.blog_category_list') }}" data-filter-tags="Blog Kategorileri">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Blog Kategorileri</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['services']) }}">
                            <a href="{{ route('panel.services_list') }}" data-filter-tags="Hizmetler">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Hizmetler</span>
                            </a>
                        </li>
                         <li class="{{ Helpers::activeMenu(['comment']) }}">
                            <a href="{{ route('panel.comment_list') }}" data-filter-tags="Müşteri Yorumları">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Müşteri Yorumları</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['sss']) }}">
                            <a href="{{ route('panel.sss_list') }}" data-filter-tags="Sıkça Sorulan Sorular">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Sıkça Sorulan Sorular</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['admin']) }}">
                            <a href="{{ route('panel.admin_list') }}" data-filter-tags="Yöneticiler">
                                <i class="fal fa-chess-king"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components_buttons">Yöneticiler</span>
                            </a>
                        </li>
                        <li class="{{ Helpers::activeMenu(['settings']) }}">
							<a href="{{ route('panel.settings_form', ['unique' => 1]) }} " title="Ayarlar" data-filter-tags="Ayarlar">
								<i class="fal fa-cog"></i>
								<span class="nav-link-text" data-i18n="nav.dashboard">Ayarlar</span>
							</a>
						</li>
					</ul>
					<div class="filter-message js-filter-message bg-success-600"></div>
				</nav>
			</aside>

			<div class="page-content-wrapper">
				<header class="page-header" role="banner">
					<div class="page-logo">
						<a href="{{ route('panel.index') }}" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
							<span class="page-logo-text">Laravel</span>
							<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
							<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
						</a>
					</div>
					<div class="hidden-md-down dropdown-icon-menu position-relative">
						<a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
							<i class="ni ni-menu"></i>
						</a>
						<ul>
							<li>
								<a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
									<i class="ni ni-minify-nav"></i>
								</a>
							</li>
							<li>
								<a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
									<i class="ni ni-lock-nav"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="hidden-lg-up">
						<a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
						</a>
					</div>
					<div class="ml-auto d-flex">

						<div class="hidden-sm-up">
							<a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Ara" style="cursor: pointer;">
								<i class="fal fa-search"></i>
							</a>
						</div>

						<!-- app fullscreen -->
						<div class="hidden-md-down">
							<a href="#" class="header-icon" data-action="app-fullscreen" style="cursor: pointer;">
								<i class="fal fa-expand"></i>
							</a>
						</div>

						<!-- app user menu -->
						<div>
							<a href="#" data-toggle="dropdown" title="{{ Auth::user()->email ?? 'test@test.com' }}" class="header-icon d-flex align-items-center justify-content-center ml-2">
								<img src="{{ Gravatar::src(Auth::user()->email ?? 'test@test.com') }}" class="profile-image rounded-circle">
							</a>
							<div class="dropdown-menu dropdown-menu-animated dropdown-lg">
								<div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
									<div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
										<span class="mr-2">
											<img src="{{ Gravatar::src(Auth::user()->email ?? 'test@test.com') }}" class="rounded-circle profile-image">
										</span>
										<div class="info-card-text">
											<div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name ?? "-" }} {{ Auth::user()->surname ?? "-" }}</div>
											<span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email ?? 'test@test.com' }}</span>
										</div>
									</div>
								</div>
								<a href="{{ route('panel.profile') }}" href="javascript:void(0)" class="dropdown-item">
									<span data-i18n="drpdwn.settings">Profilim</span>
								</a>
								<div class="dropdown-divider m-0"></div>
								<a class="dropdown-item pt-3 pb-3" href="{{ route('panel.logout') }}">
									<span data-i18n="drpdwn.page-logout">Çıkış Yap</span>
								</a>
							</div>
						</div>
					</div>
				</header>

				<main id="js-page-content" role="main" class="page-content">

					@yield('breadcrumb')
					@yield('subheader')
					@yield('content')

				</main>

				<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
				<footer class="page-footer" role="contentinfo" style="display: none;">
					<div class="d-flex align-items-center flex-1 text-muted">
						<span class="hidden-md-down fw-700">2023 © {{ env('APP_COPR') }}</span>
					</div>
					<div>
						<ul class="list-table m-0">
							<li class="pl-3 fs-xl">
								<a href="#" class="text-secondary" target="_blank">
									<i class="fal fa-question-circle" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
				</footer>
				<p id="js-color-profile" class="d-none">
					<span class="color-primary-50"></span>
					<span class="color-primary-100"></span>
					<span class="color-primary-200"></span>
					<span class="color-primary-300"></span>
					<span class="color-primary-400"></span>
					<span class="color-primary-500"></span>
					<span class="color-primary-600"></span>
					<span class="color-primary-700"></span>
					<span class="color-primary-800"></span>
					<span class="color-primary-900"></span>
					<span class="color-info-50"></span>
					<span class="color-info-100"></span>
					<span class="color-info-200"></span>
					<span class="color-info-300"></span>
					<span class="color-info-400"></span>
					<span class="color-info-500"></span>
					<span class="color-info-600"></span>
					<span class="color-info-700"></span>
					<span class="color-info-800"></span>
					<span class="color-info-900"></span>
					<span class="color-danger-50"></span>
					<span class="color-danger-100"></span>
					<span class="color-danger-200"></span>
					<span class="color-danger-300"></span>
					<span class="color-danger-400"></span>
					<span class="color-danger-500"></span>
					<span class="color-danger-600"></span>
					<span class="color-danger-700"></span>
					<span class="color-danger-800"></span>
					<span class="color-danger-900"></span>
					<span class="color-warning-50"></span>
					<span class="color-warning-100"></span>
					<span class="color-warning-200"></span>
					<span class="color-warning-300"></span>
					<span class="color-warning-400"></span>
					<span class="color-warning-500"></span>
					<span class="color-warning-600"></span>
					<span class="color-warning-700"></span>
					<span class="color-warning-800"></span>
					<span class="color-warning-900"></span>
					<span class="color-success-50"></span>
					<span class="color-success-100"></span>
					<span class="color-success-200"></span>
					<span class="color-success-300"></span>
					<span class="color-success-400"></span>
					<span class="color-success-500"></span>
					<span class="color-success-600"></span>
					<span class="color-success-700"></span>
					<span class="color-success-800"></span>
					<span class="color-success-900"></span>
					<span class="color-fusion-50"></span>
					<span class="color-fusion-100"></span>
					<span class="color-fusion-200"></span>
					<span class="color-fusion-300"></span>
					<span class="color-fusion-400"></span>
					<span class="color-fusion-500"></span>
					<span class="color-fusion-600"></span>
					<span class="color-fusion-700"></span>
					<span class="color-fusion-800"></span>
					<span class="color-fusion-900"></span>
				</p>
			</div>

		</div>
	</div>

	<script src="{{ asset('assets/js/vendors.bundle.js') }}?v={{ env('APP_VERSION') }}"></script>
	<script src="{{ asset('assets/js/custom/route.js') }}?v={{ env('APP_VERSION') }}"></script>
	<script src="{{ asset('assets/js/app.bundle.js') }}?v={{ env('APP_VERSION') }}"></script>
	<script type="text/javascript">
		$('#js-page-content').smartPanel();
	</script>

	<script src="{{ asset('assets/js/datagrid/datatables/datatables.bundle.js') }}?v={{ env('APP_VERSION') }}"></script>
	<script src="{{ asset('assets/js/notifications/sweetalert2/sweetalert2.bundle.js') }}?v={{ env('APP_VERSION') }}"></script>
	<script src="{{ asset('assets/js/formplugins/select2/select2.bundle.js') }}?v={{ env('APP_VERSION') }}"></script>
	<script src="{{ asset('assets/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('assets/js/formplugins/summernote/summernote.js') }}"></script>
    <script src="{{asset('assets/js/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('assets/js/notifications/toastr/toastr.js') }}"></script>

	<script type="text/javascript">
		$.fn.datepicker.dates.tr={days:["Pazar","Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi"],daysShort:["Pz","Pzt","Sal","Çrş","Prş","Cu","Cts"],daysMin:["Pz","Pzt","Sa","Çr","Pr","Cu","Ct"],months:["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık"],monthsShort:["Oca","Şub","Mar","Nis","May","Haz","Tem","Ağu","Eyl","Eki","Kas","Ara"],today:"Bugün",clear:"Temizle",weekStart:1,format:"dd.mm.yyyy"};
	</script>

	<!-- extra module -->
	<script src="https://unpkg.com/wavesurfer.js"></script>

	<!-- numeric -->
	<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>

	<!-- custom js -->
	<script src="{{ asset('assets/js/custom/basecrud.js') }}?v={{ env('APP_VERSION') }}"></script>

	<script type="text/javascript">
	    @if(Session::has('success'))
	        Swal.fire('','{{ session('success') }}','success');
	    @elseif(Session::has('error'))
	        Swal.fire('','{{ session('error') }}','error');
	    @elseif(Session::has('warning'))
	        Swal.fire('','{{ session('warning') }}','warning');
	    @elseif(Session::has('info'))
	        Swal.fire('','{{ session('info') }}','info');
	    @endif

	    $('.select2').select2();

	    $('[money-format]').each(function() {
			new AutoNumeric(this, { digitGroupSeparator: '.', decimalCharacter: ',' });
		});
		$('[number-format]').each(function() {
			new AutoNumeric(this, { digitGroupSeparator: '.', decimalCharacter: ',', decimalPlaces: 0 });
		});

	    $('[datepicker]').datepicker({
	    	todayHighlight: true,
            todayBtn: "linked",
            format: 'dd.mm.yyyy',
            language: 'tr',
        });

        $('[daterange]').datepicker({
            weekStart: 1,
            format: 'dd.mm.yyyy',
            todayHighlight: true,
            language: 'tr',
            templates: {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }
        });

	    $('[data-filter-tags]').click(function(){
	        $('#js-nav-menu li.active').removeClass('active');
	        $(this).parent().addClass('active');
	    });

	    function cardChange()
	    {
	    	$('[cardno]').val(window.location.hash.replace('#cardno=', ''));

	    	$(window).on('hashchange', function(e){
	            $('[cardno]').val(window.location.hash.replace('#cardno=', ''));
	        });
	    }
	    cardChange();
	</script>

    <script src="{{ asset('assets/js/formplugins/summernote/lang/summernote-tr.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            //init default
            $('.js-summernote').summernote(
            {
                height: 200,
                tabsize: 2,
                placeholder: "Detay...",
                dialogsFade: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                lang: "tr-TR",
            });
        });

    </script>

    <script>
        @if(Session::has('error'))
            toastr.error("{{session()->get('error')}}")
        @endif
        @if(Session::has('message'))
            toastr.success("{{session()->get('message')}}")
        @endif
    </script>


	@yield('extra_script')

</body>
</html>
