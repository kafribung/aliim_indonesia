@extends('auth.master_auth')

@section('title', 'Register Aliim Indonesia')
@section('content')

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('register') }}" novalidate>
				@csrf
				<span class="login100-form-title">
					Daftar Aliim Indonesia
				</span>
				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required autocomplete="name" autofocus>
					@error('name')
						<p class="alert alert-danger" style="color:#d9534f">{{ $message }}</p>
					@enderror
				</div>
				
				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
					@error('email')
						<p class="alert alert-danger" style="color:#d9534f">{{ $message }}</p>
					@enderror
				</div>

				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="text" name="date_birth" placeholder="Tanggal Lahir" onfocus="(this.type='date')" value="{{ old('date_birth') }}" required >
					@error('date_birth')
						<p class="alert alert-danger" style="color:#d9534f">{{ $message }}</p>
					@enderror
				</div>

				<div class="wrap-input100 validate-input m-b-16">
					<select name="gender" id="gender" class="form-control input100" style="padding: 5px" required>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
					@error('gender')
						<p class="alert alert-danger" style="color:#d9534f">{{ $message }}</p>
					@enderror
				</div>

				<div id="app">
					<district-component/>
					@error('district')
						<p class="alert alert-danger" style="color:#d9534f">{{ $message }}</p>
					@enderror
				</div>
				
				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="password" name="password" placeholder="Password"  required autocomplete="new-password">
					@error('password')
						<p class="alert alert-danger" style="color:#d9534f">{{ $message }}</p>
					@enderror
				</div>
				
				<div class="wrap-input100 validate-input m-b-16">
					<input class="input100" type="password"  name="password_confirmation"  placeholder="Confirmation" required autocomplete="new-password">
				</div>
				
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">Daftar</button>
				</div>
				<div class="flex-col-c p-t-20">
					<span class="txt1 p-b-9">Sudah Punya Akun ?</span>
					<a href="/login" class="txt3">Login Disini</a>
				</div>

				<div class=" m-b-16" data-validate = "Please enter captcha">
					{!! RecaptchaV3::initJs() !!}
					{!! RecaptchaV3::field('register') !!}
				</div>
			</form>
		</div>
	</div>
</div>

@push('after_css')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
@endsection



	

	
	