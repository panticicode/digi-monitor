@extends('layouts.auth')

@section('content')
<div class="authentication-theme auth-style_1">
	@include('layouts.auth.partials.alert')
	<div class="row">
		<div class="col-12 logo-section">
			<a href="#" class="logo">
				<h3 class="text-logo">DIGI-MONITOR</h3>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
			<div class="styleLogin">
				<div class=>
					<div class="row">
						<div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
						<form action="{{ route('login') }}" method="post">
								@csrf
								<div class="form-group input-rounded styleformLogin">
									<div class="row box-email">
										<div class="col-md-4 ">
											<label for="" class="mt-2 ">Email: </label>
										</div>
										<div class="col">
											<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" name="email" value="{{ old('email') }}" placeholder="Email" />
										</div>
									</div>
									@if($errors->has('email'))
									<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
							</div>
							<div class="form-group input-rounded styleformLogin">
									<div class="row box-password">
										<div class="col-md-4">
											<label for="" class="mt-2 label-password">Password: </label>
										</div>
										<div class="col">
											<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Password" />
											@if($errors->has('password'))
											<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
											@endif
										</div>
									</div>
							</div>
							<div class="form-inline">
									<div class="checkbox">
									<label>
											<input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}/>Remember me <i class="input-frame"></i>
									</label>
									</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="auth_footer">
		<h3>
			<p class="text-muted text-center">© Digi-Monitor Inc 2019</p>
		</h3>
	</div>
</div>
@endsection