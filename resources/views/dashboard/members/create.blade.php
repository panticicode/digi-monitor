@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.members.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Create Members</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div id ="temp" class="grid">
				<p class="grid-header">Create Members</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-12 mx-auto">
								<form action="{{ route('dashboard.members.store') }}" method="post">
								@csrf	
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a1">Full Name</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="full_name" class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" id="a1" value="{{ old('full_name') }}">
										@if($errors->has('full_name'))
											<div class="invalid-feedback">
												{{ $errors->first('full_name') }}
											</div>
										@endif
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="inputType14">Birthday</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="date" name="date_of_birth" id="inputType14" class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" value="{{ old('date_of_birth') }}">
										@if($errors->has('date_of_birth'))
											<div class="invalid-feedback">
												{{ $errors->first('date_of_birth') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Gender</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<label for="">Male</label>
										<input type="radio" name="gender" value="male"  checked>
										<label for="">Female</label>
										<input type="radio" name="gender" value="female" >
									</div>
									<div class="col-md-3 showcase_text_area">
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
										<label for="inputType133">Location</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="location" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" id="inputType133" value="{{ old('location') }}">
										@if($errors->has('location'))
											<div class="invalid-feedback">
												{{ $errors->first('location') }}
											</div>
										@endif
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="inputType13">Physical Address:</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="inputType13" value="{{ old('address') }}">
										@if($errors->has('address'))
											<div class="invalid-feedback">
												{{ $errors->first('address') }}
											</div>
										@endif
									</div>
								</div>
								
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a2">Nationality</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="nationality" class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" id="a2" value="{{ old('nationality') }}">
										@if($errors->has('nationality'))
											<div class="invalid-feedback">
												{{ $errors->first('nationality') }}
											</div>
										@endif
									</div>
									
								</div>
								<div class="form-group row showcase_row_area">
									<div class="row">
										<div class="col-md-3">
											<div class=" showcase_text_area">
												<label for="inputType144">Phone</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="showcase_content_area">
												<select name="area_code" id="" class="form-control {{ $errors->has('area_code') ? 'is-invalid' : '' }}">
													@foreach($countries as $key => $country)
													<option value="{{ $key }}">{{ $country }}</option>
													@endforeach
												</select>
												@if($errors->has('area_code'))
													<div class="invalid-feedback">
														{{ $errors->first('area_code') }}
													</div>
												@endif
											</div>
										</div>
										<div class="col">
											<input type="phone" name="phone" id="inputType144" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}">
											@if($errors->has('phone'))
												<div class="invalid-feedback">
													{{ $errors->first('phone') }}
												</div>
											@endif
										</div>
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="inputType12">Suburb</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="suburb" class="form-control {{ $errors->has('suburb') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('suburb') }}" >
										@if($errors->has('suburb'))
											<div class="invalid-feedback">
												{{ $errors->first('suburb') }}
											</div>
										@endif
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="inputType12">Occupation</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="occupation" class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('occupation') }}" >
										@if($errors->has('occupation'))
											<div class="invalid-feedback">
												{{ $errors->first('occupation') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Tither</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="tither" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="tither" value="no" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="a3">Employment</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="employment" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="employment" value="no" >
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Weekly Tither</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="weekly_tither" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="weekly_tither" value="no" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="a3">Monthly Tither</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="monthly_tither" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="monthly_tither" value="no" >
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="inputType12">Weeding Date:</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="weeding_date" class="form-control {{ $errors->has('weeding_date') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('weeding_date') }}" >
										@if($errors->has('weeding_date'))
											<div class="invalid-feedback">
												{{ $errors->first('weeding_date') }}
											</div>
										@endif
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="inputType12">Marital Status:</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="text" name="marital_status" class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('marital_status') }}" >
										@if($errors->has('marital_status'))
											<div class="invalid-feedback">
												{{ $errors->first('marital_status') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Born Again</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="born_again" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="born_again" value="no" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="a3">Baptized?</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="baptized" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="baptized" value="no" >
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Tongues?</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="tongues" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="tongues" value="no" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="a3">SUNDAY Attendance</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="sunday_attendance" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="sunday_attendance" value="no" >
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">BIBLE STUDY Attendance</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="bible_study" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="bible_study" value="no" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="a3">Tuesday Service Attendance</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="tuesday_service" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="tuesday_service" value="no" >
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">FRIDAY PRAYERS Attendance</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="friday_prayers" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="friday_prayers" value="no" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="a3">Night Vigil</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="night_vigil" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="night_vigil" value="no" >
									</div>
								</div>
								<div class="form-group row showcase_row_area">
									<div class="col-md-1 showcase_text_area">
										<label for="a3">Pregnant:</label>
									</div>
									<div class="col-md-3 showcase_content_area"> &nbsp
										 &nbsp <label for="">Yes</label>
										<input type="radio" name="pregnant" value="yes"  checked>
										<label for="">No</label>
										<input type="radio" name="pregnant" value="no" >
										<label for="">N/A</label>
										<input type="radio" name="pregnant" value="n/a" >
									</div>
									<div class="col-md-3 showcase_text_area">
										<label for="inputType14">Excpected Delivery Date</label>
									</div>
									<div class="col-md-3 showcase_content_area">
										<input type="date" name="delivery_date" id="inputType14" class="form-control {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}" value="{{ old('delivery_date') }}">
										@if($errors->has('delivery_date'))
											<div class="invalid-feedback">
												{{ $errors->first('delivery_date') }}
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row showcase_text_area text-right">
									<div class="col-md-9"> 
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