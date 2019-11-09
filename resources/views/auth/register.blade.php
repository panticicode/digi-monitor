@extends('layouts.app')

@section('content')
<div class="authentication-theme auth-style_1">
	<div class="row">
		<div class="col-12 logo-section">
			<h2 class="logo">Digi-Monitor</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
			<div class="grid">
				<div class="grid-body">
					<div class="row">
						<div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
							<form action="{{ route('register') }}" method="post">
								@csrf
								@if(request()->ref)
									<input type="hidden" name="ref" value="{{ request()->ref }}">
								@endif
								<div class="form-group input-rounded">
									<input type="name" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" name="name" value="{{ old('name') }}" placeholder="Name" />

									@if($errors->has('name'))
									<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>

								<div class="form-group input-rounded">
									<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" name="email" value="{{ old('email') }}" placeholder="Email" />

									@if($errors->has('email'))
									<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
								</div>
								<div class="form-group input-rounded">
										<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="" placeholder="Password" />
								
										@if($errors->has('password'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
								</div>
								<div class="form-group input-rounded">
										<input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" value="" placeholder="Password Confirmation" />
								
										@if($errors->has('password_confirmation'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
										@endif
								</div>
								
								<button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="auth_footer">
		<p class="text-muted text-center">© Ripple Inc 2019</p>
	</div>
</div>
@endsection
