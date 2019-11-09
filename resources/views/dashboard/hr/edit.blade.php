@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.hr.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Human Resources</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div class="grid">
				<p class="grid-header">Edit Info Member</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-8 mx-auto">
								<form action="{{ route('dashboard.hr.update', $member) }}" method="post">
								@csrf	
								@method('PUT')
								<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType1">Name</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $member->name) }}">
											@if($errors->has('name'))
												<div class="invalid-feedback">
													{{ $errors->first('name') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType12">Email</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="email" class="form-control" id="inputType2" value="{{ $member->email }}" disabled>
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType13">Phone</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="phone" id="inputType13" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone', $member->phone) }}">
											@if($errors->has('phone'))
												<div class="invalid-feedback">
													{{ $errors->first('phone') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType14">Birth Date</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="date" name="birth_date" id="inputType14" class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" value="{{ old('birth_date', $member->birth_date) }}">
											@if($errors->has('birth_date'))
												<div class="invalid-feedback">
													{{ $errors->first('birth_date') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_text_area text-right">
										<div class="col-md-9"> 
											<button class="btn btn-success col-md-6">Update</button>
										</div>
									</div>
								</form>

								<form action="{{ route('dashboard.hr.changePW', $member) }}" method="post">
									@csrf
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType15">Old Password</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="password" name="old_password" id="inputType15" class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}" value="" placeholder="Old Password">
											@if($errors->has('old_password'))
												<div class="invalid-feedback">
													{{ $errors->first('old_password') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType16">New Password</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="password" name="password" id="inputType16" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="" placeholder="New Password">
											@if($errors->has('password'))
												<div class="invalid-feedback">
													{{ $errors->first('password') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType17">Confirm Password</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="password" name="password_confirmation" id="inputType17" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" value="">
											@if($errors->has('password_confirmation'))
												<div class="invalid-feedback">
													{{ $errors->first('password_confirmation') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_text_area text-right">
										<div class="col-md-9"> 
											<button class="btn btn-success col-md-6">Change Password</button>
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