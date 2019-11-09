@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.hr.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Edit Templates</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div id="temp" class="grid">
				<p class="grid-header">Edit Templates</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<form action="{{ route('dashboard.templates.update', $template) }}" method="post">
							@csrf
							@method('PUT')
							<div class="row mb-12">
								<div class="col-md-12 mx-auto">
									<div class="form-group row showcase_row_area">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType12">Type</label>
										</div>
										<div class="col-md-5 showcase_content_area">
											<input type="text" name="type" class="form-control type" value="{{ $template->type }}" readonly>
										</div>
									</div>
									@if($template->type == 'email')
									<div class="form-group row showcase_row_area">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType1">Subject</label>
										</div>
										<div class="col-md-5 showcase_content_area">
											<input type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('subject', $template->subject) }}">
											@if($errors->has('subject'))
												<div class="invalid-feedback">
													{{ $errors->first('subject') }}
												</div>
											@endif
										</div>
									</div>
									@endif
									<div class="form-group row showcase_row_area">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType121">Name</label>
										</div>
										<div class="col-md-5 showcase_content_area">
											<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputType121" value="{{ old('name', $template->name) }}">
											@if($errors->has('name'))
												<div class="invalid-feedback">
													{{ $errors->first('name') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType14">Content</label>
										</div>
										@if($template->type == 'sms')
										<div class="col-md-8 showcase_content_area showSms">
											<input type="text" name="content" class="contentSms form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" value="{{ old('content', $template->content) }}">
											@if($errors->has('content'))
												<div class="invalid-feedback">
													{{ $errors->first('content') }}
												</div>
											@endif
										</div>
										@endif

										@if($template->type == 'email')
										<div class="col-md-8 showcase_content_area showEmail">
											<textarea name="content" id="simpleMde" class="contentEmail form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content', $template->content) }}</textarea>
											@if($errors->has('content'))
												<div class="invalid-feedback">
													{{ $errors->first('content') }}
												</div>
											@endif
										</div>
										@endif
									</div>
									<div class="form-group row showcase_text_area text-right">
										<div class="col-md-6"> 
											<button class="btn btn-success col-md-6">Update</button>
										</div>
									</div>
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
@endsection