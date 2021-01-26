@extends('auth.master_auth')

@section('title', 'Login Aliim Indonesia')
@section('content')
	
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('login') }}">
				@csrf
				<span class="login100-form-title">
					Aliim Indonesia
				</span>

				{{-- Seleksi Msg --}}
				@if (session('msg'))
					<p class="alert alert-info">{{session('msg')}}</p>
				@endif

				{{-- Seleksi Error --}}
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						<p class="alert alert-danger">{{$error}}</p>
					@endforeach
				@endif
				
				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
					<input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter password">
					<input class="input100" type="password" name="password" placeholder="Password"  required autocomplete="current-password">
					<span class="focus-input100"></span>
				</div>

				<div class="text-right p-t-13 p-b-23">
					<span class="txt1">Lupa</span>
					<a href="{{ route('password.request') }}"class="txt2">Password?</a>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">Masuk</button>
				</div>

				<div class="flex-col-c p-t-20 p-b-20">
					<span class="txt1 p-b-9">Belum Memiliki Akun ?</span>
					<a href="/register" class="txt3">Daftar Sekarang</a>
				</div>
			</form>
		</div>
	</div>
</div>
	
@endsection
