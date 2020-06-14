@extends('auth.master_auth')

@section('title', 'Register Aliim Indonesia')
@section('content')

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('register') }}">
				@csrf
				<span class="login100-form-title">
					Daftar Aliim Indonesia
				</span>

				{{-- Seleksi Error --}}
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						<p class="alert alert-danger">{{$error}}</p>
					@endforeach
				@endif
				
				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
					<input class="input100" type="text" name="name" placeholder="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
					<input class="input100" type="email" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email">
					<span class="focus-input100"></span>
				</div>
				

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
					<input class="input100" type="password" name="password" placeholder="Password"  required autocomplete="new-password">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
					<input class="input100" type="password"  name="password_confirmation"  placeholder="Confirmation" required autocomplete="new-password">
					<span class="focus-input100"></span>
				</div>

				<div class=" m-b-16" data-validate = "Please enter captcha">
					{!! NoCaptcha::renderJs() !!}
					{!! NoCaptcha::display() !!}
				</div>


				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Daftar
					</button>
				</div>

				<div class="flex-col-c p-t-170 p-b-40">
					<span class="txt1 p-b-9">
						Sudah Punya Akun ?
					</span>

					<a href="/login" class="txt3">
						Login Disini
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
	
@endsection
	

	
	