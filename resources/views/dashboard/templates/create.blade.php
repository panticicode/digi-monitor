@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.hr.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Create Templates</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div id="temp" class="grid">
				<p class="grid-header">Create Templates</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<form action="{{ route('dashboard.templates.store') }}" method="post">
							@csrf
							<div class="row mb-12">
								<div class="col-md-12 mx-auto">
									<div class="form-group row showcase_row_area">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType12">Type</label>
										</div>
										<div class="col-md-5 showcase_content_area">
											<select name="type" id="inputType2" class="selectType form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
												<option value="email" {{ old('type') == 'email' ? 'selected' : ''  }}>Email</option>
												<option value="sms" {{ old('type') == 'sms' ? 'selected' : ''  }}>Sms</option>
											</select>
											@if($errors->has('type'))
												<div class="invalid-feedback">
													{{ $errors->first('type') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area showSubject">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType1">Subject</label>
										</div>
										<div class="col-md-5 showcase_content_area">
											<input type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('subject') }}">
											@if($errors->has('subject'))
												<div class="invalid-feedback">
													{{ $errors->first('subject') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area">
										<div class="col-md-2 showcase_text_area">
											<label for="inputType121">Name</label>
										</div>
										<div class="col-md-5 showcase_content_area">
											<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputType121" value="{{ old('name') }}">
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
										<div class="col-md-8 showcase_content_area showSms" style="display:none">
											<input type="text" name="content" class="contentSms form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" value="{{ old('content') }}">
											@if($errors->has('content'))
												<div class="invalid-feedback">
													{{ $errors->first('content') }}
												</div>
											@endif
										</div>
										<div class="col-md-8 showcase_content_area showEmail">
											<textarea name="content" id="simpleMde" class="contentEmail form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>
											@if($errors->has('content'))
												<div class="invalid-feedback">
													{{ $errors->first('content') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_text_area text-right">
										<div class="col-md-6"> 
											<button class="btn btn-success col-md-6">Create</button>
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
@section('pageJS')
<script>
(() => {
	if($('.selectType').val() == 'sms') {
		$('.showSms').css('display', 'block')
		$('.showSubject').css('display', 'none')
		$('textarea').prop('disabled', true)
		$('.showEmail').css('display', 'none')
	}
	if($('.selectType').val() == 'email') {
		$('.showSms').css('display', 'none')
		$('.showEmail').css('display', 'block')
	}

	$('.selectType').change(function() {
		if($(this).val() == 'sms') {
			$('.showSms').css('display', 'block')
			$('textarea').prop('disabled', true)
			$('.showSubject').css('display', 'none')
			$('.showEmail').css('display', 'none')
		}
		if($(this).val() == 'email') {
			$('.showSms').css('display', 'none')
			$('.showSubject').css('display', '')
			$('input[name="content"]').prop('disabled', true)
			$('.showEmail').css('display', 'block')
		}
	})
})()
</script>
@endsection