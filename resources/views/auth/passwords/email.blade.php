@extends('auth.master_auth')

@section('title', 'Reset Password Aliim Indonesia')
@section('content')
	
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('password.email') }}">
                @csrf
				<span class="login100-form-title">
					Aliim Indonesia
				</span>

				{{-- Seleksi Msg --}}
				@if (session('status'))
					<p class="alert alert-info">{{session('status')}}</p>
				@endif

				{{-- Seleksi Error --}}
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						<p class="alert alert-danger">{{$error}}</p>
					@endforeach
				@endif
				
				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
					<input class="input100" type="email" name="email" placeholder="masukkan email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
					<span class="focus-input100"></span>
                </div>
                
				<div class="container-login100-form-btn m-b-16">
					<button type="submit" class="login100-form-btn">
						Reset Link Password
					</button>
				</div>

			</form>
		</div>
	</div>
</div>
	
@endsection
