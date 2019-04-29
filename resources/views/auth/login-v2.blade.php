<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="{{ asset('assets/app/custom/login/login-v4.demo2.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="{{ asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
		<link href="{{ asset('assets/demo/demo2/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="{{ asset('assets/demo/demo2/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->


		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body  class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading"  >

            <!-- begin::Page loader -->

<!-- end::Page Loader -->        
 <!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
 <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}});">
 <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
     <div class="kt-login__container">
         <div class="kt-login__logo">
             <a href="#">
                 <img src="{{asset('assets/media/logos/logo-5.png')}}">  	
             </a>
         </div>
         <div class="kt-login__signin">
             <div class="kt-login__head">
                 <h3 class="kt-login__title">{{_('Sign In')}}</h3>
             </div>
             <form class="kt-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                     <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off" required>
                     @if ($errors->has('email'))
                     <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $errors->first('email') }}</strong>
                                                         </span> @endif
                    </div>
                 <div class="input-group">
                     <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" required>
                     @if ($errors->has('password'))
                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('password') }}</strong>
                                                     </span> @endif
                    </div>
                 <div class="row kt-login__extra">
                     <div class="col">
                         <label class="kt-checkbox">
                             <input type="checkbox" is="remember" name="remember" {{ old( 'remember') ? 'checked' : '' }}>  {{ __('Remember Me') }}
                             <span></span>
                         </label>
                     </div>
                     <div class="col kt-align-right">
                         <a href="javascript:;" id="kt_login_forgot" class="kt-login__link"> {{ __('Forgot Your Password?') }}</a>
                     </div>
                 </div>
                 <div class="kt-login__actions">
                     <button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">{{__('Sign In')}}</button>
                 </div>
             </form>
         </div>
     
         <div class="kt-login__forgot">
             <div class="kt-login__head">
                 <h3 class="kt-login__title">Forgotten Password ?</h3>
                 <div class="kt-login__desc">Enter your email to reset your password:</div>
             </div>
             <form class="kt-form" action="{{ route('password.update') }}" method="POST">
                
                 <div class="input-group">
                     <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                     @if ($errors->has('email'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                 @endif 
                </div>
                 <div class="kt-login__actions">
                     <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                     <button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
                 </div>
             </form>
         </div>
        
     </div>	
 </div>
</div>
</div>	
</div>


		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
                var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
            </script>

        <!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/demo/demo2/base/scripts.bundle.js') }}" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->
        
         <!--begin::Page Scripts(used by this page) -->
         <script src="{{ asset('assets/app/custom/login/login-general.js') }}" type="text/javascript"></script>
         <!--end::Page Scripts -->

		<!--begin::Global App Bundle(used by all pages) -->
		<script src="{{ asset('assets/app/bundle/app.bundle.js') }}" type="text/javascript"></script>

		<!--end::Global App Bundle -->
	</body>

	<!-- end::Body -->
</html>