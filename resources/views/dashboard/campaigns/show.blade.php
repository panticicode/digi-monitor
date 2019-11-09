@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Send Sms or Email For Group</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div class="grid">
				<p class="grid-header">Sms or Email</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-8 mx-auto">
								<form action="{{ route('dashboard.campaigns.send') }}" method="post">
									@csrf	
									<div class="form-group row showcase_row_area">
										<div class="col-md-3 showcase_text_area">
											<label for="a1">Type</label>
										</div>
										<div class="col-md-6 showcase_content_area">
											<select name="type" id="" class="template form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
												<option {{ old('type') == 'sms' ? 'selected' : '' }} value="sms">SMS</option>
												<option {{ old('type') == 'email' ? 'selected' : '' }} value="email">EMAIL</option>
											</select>
											@if($errors->has('type'))
												<div class="invalid-feedback">
													{{ $errors->first('type') }}
												</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area showTemplate">
										
									</div>
									<div class="form-group row showcase_row_area showGroup">
										<div class="col-md-3 showcase_text_area">
											<label for="a3">Group For Admin</label>
										</div>
										<div class="col-md-6 showcase_content_area">
											<select name="group_id" id="" class="form-control {{ $errors->has('group_id') ? 'is-invalid' : '' }}">
												<option value="">-- Select --</option>
												@foreach($groups as $group)
													@if(old('group_id') == $group->id)
													<option value="{{ $group->id }}" selected>{{ $group->name }}</option>
													@else
													<option value="{{ $group->id }}">{{ $group->name }}</option>
													@endif
												@endforeach
											</select>
											@if($errors->has('group_id'))
											<div class="invalid-feedback">
												{{ $errors->first('group_id') }}
											</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_row_area showTime">
										<div class="col-md-6 showcase_text_area current">
											<input type="radio" value="now" name="current" checked>
											<label for="a3">Now  </label>
											<input type="radio" value="later" name="current">
											<label for="a3">  Later</label>
										</div>
									</div>
									<div class="form-group row showcase_row_area showFormtime" style="display:none">
										<div class="col-md-3 showcase_text_area">
											<label for="a3">Date</label>
										</div>
										<div class="col-md-3 showcase_content_area">
											<input type="date" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" value="{{ old('date') }}">
											@if($errors->has('date'))
											<div class="invalid-feedback">
												{{ $errors->first('date') }}
											</div>
											@endif
										</div>
										<div class="col-md-1 showcase_text_area">
											<label for="a3">Time</label>
										</div>
										<div class="col-md-3 showcase_content_area">
											<input type="time" name="time" class="form-control {{ $errors->has('time') ? 'is-invalid' : '' }}" value="now">
											@if($errors->has('time'))
											<div class="invalid-feedback">
												{{ $errors->first('time') }}
											</div>
											@endif
										</div>
									</div>
									<div class="form-group row showcase_text_area text-right">
										<div class="col-md-6"> 
											<button class="btn btn-success col-md-6">Send</button>
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
@section('pageJS')
<script>
(() => {
	$(function(){     
		var d = new Date(),        
			h = d.getHours(),
			m = d.getMinutes();
		if(h < 10) h = '0' + h; 
		if(m < 10) m = '0' + m; 
		$('input[type="time"][value="now"]').each(function(){ 
			$(this).attr({'value': h + ':' + m});
		});
	});
	$.ajax({
		url:"{{ route('dashboard.campaigns.getTemplate') }}",
		data: {'type': $('.template').val()},
		success: (res) => {
			$('.showTemplate div').remove()
			$('.showTemplate').prepend(res)
		}
	})

	if ($('input[name="current"]').val() == 'now') {
		$('.showFormtime').css('display', 'none')
	}
	if ($('input[name="current"]').val() == 'later') {
		$('.showFormtime').css('display', '')
	}
	$('.template').change(function() {
		if($(this).val()) {
			$.ajax({
				url:"{{ route('dashboard.campaigns.getTemplate') }}",
				data: {'type': $(this).val()},
				success: (res) => {
					$('.showTemplate div').remove()
					$('.showTemplate').prepend(res)
				}
			})
		}
	})
	$('input[name="current"]').change(function() {
		if ($(this).val() == 'now') {
			$('.showFormtime').css('display', 'none')
		}
		if ($(this).val() == 'later') {
			$('.showFormtime').css('display', '')
		}
	})
})()
</script>
@endsection