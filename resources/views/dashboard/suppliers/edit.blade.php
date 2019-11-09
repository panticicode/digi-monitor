@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.hr.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Suppliers</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div class="grid">
				<p class="grid-header">Edit Info Suppliers</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-8 mx-auto">
								<form action="{{ route('dashboard.suppliers.update', $supplier) }}" method="post">
								@csrf	
								@method('PUT')
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType1">Name</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $supplier->name) }}">
											@if($errors->has('name'))
												<div class="invalid-feedback">
													{{ $errors->first('name') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType11">Contact Person</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<textarea name="contact_person" id="inputType11" class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" rows="10">{{ old('contact_person', $supplier->contact_person) }}</textarea>
											@if($errors->has('contact_person'))
												<div class="invalid-feedback">
													{{ $errors->first('contact_person') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType111">Land Line Number</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="land_line" id="inputType111" class="form-control {{ $errors->has('land_line') ? 'is-invalid' : '' }}" value="{{ old('land_line', $supplier->land_line) }}">
											@if($errors->has('land_line'))
												<div class="invalid-feedback">
													{{ $errors->first('land_line') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType111">Cell Number</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="cell" id="inputType111" class="form-control {{ $errors->has('cell') ? 'is-invalid' : '' }}" value="{{ old('cell', $supplier->cell) }}">
											@if($errors->has('cell'))
												<div class="invalid-feedback">
													{{ $errors->first('cell') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType12">Email</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('email', $supplier->email) }}">
											@if($errors->has('email'))
												<div class="invalid-feedback">
													{{ $errors->first('email') }}
												</div>
											@endif
                    </div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType14">Physical Address</label>
										</div>
										<div class="col-md-9 showcase_content_area">
											<input type="text" name="physical_address" id="inputType14" class="form-control {{ $errors->has('physical_address') ? 'is-invalid' : '' }}" value="{{ old('physical_address', $supplier->physical_address) }}">
											@if($errors->has('physical_address'))
												<div class="invalid-feedback">
													{{ $errors->first('physical_address') }}
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