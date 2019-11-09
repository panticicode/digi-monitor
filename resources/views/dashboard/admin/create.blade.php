@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.admin.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Create Admin</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div class="grid">
				<p class="grid-header">Create Admin</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-12 mx-auto">
								<form action="{{ route('dashboard.admin.store') }}" method="post">
								@csrf	
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a1">Name</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="a1" value="{{ old('name') }}">
										@if($errors->has('name'))
											<div class="invalid-feedback">
												{{ $errors->first('name') }}
											</div>
										@endif
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="inputType14">Birth Date</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="date" name="birth_date" id="inputType14" class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" value="{{ old('birth_date') }}">
										@if($errors->has('birth_date'))
											<div class="invalid-feedback">
												{{ $errors->first('birth_date') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="inputType12">Email</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('email') }}" >
										@if($errors->has('email'))
											<div class="invalid-feedback">
												{{ $errors->first('email') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Phone</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="a3" value="{{ old('phone') }}">
										@if($errors->has('phone'))
											<div class="invalid-feedback">
												{{ $errors->first('phone') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_text_area text-right">
									<div class="col-md-6"> 
										<button class="btn btn-success col-md-6">Create</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection