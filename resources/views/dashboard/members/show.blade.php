@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Email to All Members</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
		<div class="col-lg-12">
			<div class="grid">
				<p class="grid-header">Email</p>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="row mb-3">
							<div class="col-md-8 mx-auto">
								<form action="{{ route('dashboard.members.send') }}" method="post">
									{{ @csrf_field() }}
									<div class="form-group col-md-12">
										<div class="col-md-3 showcase_text_area">
											<label for="inputType14">Template</label>
										</div>
										<div class="col-md-6 showcase_content_area selectTemplate">
											<select name="template_id" id="" class="form-control {{ count($templates) ? '' : 'is-invalid' }}">
												@foreach($templates as $template)
												<option value="{{ $template->id }}">{{ $template->name }}</option>
												@endforeach
											</select>
											@if(!count($templates))
											<div class="invalid-feedback">
												You don't have teample
											</div>
											@endif
										</div>
										<div class="send_all_temp showcase_content_area selectTemplate text-right">
											<div class="col-md-12"> 
												<button class="btn btn-success col-md-6">Send</button>
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
	</div>
</div>
@endsection










