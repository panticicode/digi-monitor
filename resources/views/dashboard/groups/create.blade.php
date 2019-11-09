@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.groups.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Groups</li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
			<div class="col-lg-12">
				<div class="grid">
					<p class="grid-header">Create Groups</p>
					<div class="grid-body">
						<div class="item-wrapper">
							<div class="row mb-3">
								<div class="col-md-12 mx-auto">
									<form class="form" action="{{ route('dashboard.groups.store') }}" method="post">
									@csrf	
										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area">
												<label for="inputType1">Name</label>
											</div>
											<div class="col-md-3 showcase_content_area">
												<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
												@if($errors->has('name'))
													<div class="invalid-feedback">
														{{ $errors->first('name') }}
													</div>
												@endif
											</div>
										</div>
										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area">
												<label for="inputType1">Description</label>
											</div>
											<div class="col-md-3 showcase_content_area">
												<input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') }}">
												@if($errors->has('description'))
													<div class="invalid-feedback">
														{{ $errors->first('description') }}
													</div>
												@endif
											</div>
										</div>
										<div id="temp" class="row"><div class="col-sm-12">
											<table id="sample-data-table" class="data-table table table-striped dataTable" role="grid" aria-describedby="sample-data-table_info">
												<thead>
													<tr role="row">
														<th class="" rowspan="1" colspan="1" style="width: 124px;">Name</th>
														<th class="" rowspan="1" colspan="1" style="width: 210px;">SurName</th>
														<th class="" rowspan="1" colspan="1" style="width: 90px;">Gender</th>
														<th class="" rowspan="1" colspan="1" style="width: 42px;">Email</th>
														<th class="" rowspan="1" colspan="1" style="width: 42px;">Date Of Birth</th>
														<th class="" rowspan="1" colspan="1" style="width: 42px;">Address</th>
														<th class="" rowspan="1" colspan="1" style="width: 42px;">Location</th>
														<th class="" rowspan="1" colspan="1" style="width: 86px;">Action</th>
													</tr>
												</thead>
												<tbody class="content-table">
													<tr>
														<td colspan="2">
															<select name="" id="" class="form-control">
																<option value="">-- Select --</option>
																@foreach($members as $member)
																<option value="{{ $member->id }}">{{ $member->full_name }}</option>
																@endforeach
															</select>
														</td>
														<td colspan="2">
															<button type="button" class="btn btn-block btn-sm btn-info selectUser">Add</button>
														</td>
														<td colspan="2"></td>
													</tr>
												</tbody>
											</table>
											<div class="col-md-3 form-group row showcase_row_area">
												
											</div>
											<div class="form-group row showcase_text_area text-right">
												<div class="col-md-2"> 
													<button type="button" class="btn btn-success col-md-6 create">Create</button>
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
@section('pageJS')
<script>
(() => {
	$(document).ready(function() {
		if($('select').val()) {
			$('.selectUser').prop('disabled', false)
		} else {
			$('.selectUser').prop('disabled', true)
		}
	})

	$('select').change(function() {
		if($(this).val()) {
			$('.selectUser').prop('disabled', false)
		} else {
			$('.selectUser').prop('disabled', true)
		}
	})

	$('.selectUser').click(function() {
		let bool = true
		$('tr').each(function (index, el) {
			if ($(this).find('input').val() ==  $('option:selected').val()) {
				bool = false
			}
		})
		if (bool && $('option:selected').val()) {
			let id = $('option:selected').val()
			$.ajax({
				url: '{{ route('dashboard.groups.getUser') }}',
				method: 'GET',
				data: {	
					id: id
				},
				success: (res) => {
					$('.content-table').prepend(res)
				} 
			})
		}
	})

	$('body').on('click', '.deleteRow', function() {
		$(this).parents('tr').remove()
	})

	$('.create').click(function() {
		if ($('body table .content-table tr').length > 1) {
			$('.form').submit()
		} else {
			alert('Table not have user')
		}
	})
})()
</script>
@endsection