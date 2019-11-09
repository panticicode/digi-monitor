@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
			<nav aria-label="breadcrumb">
					<ol class="breadcrumb has-arrow">
						<li class="breadcrumb-item">
								<a href="{{ route('dashboard.index') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Invite Member</li>
					</ol>
			</nav>
	</div>
	<div class="content-viewport">
		<div class="row">
			<div class="col-lg-12">
				<div class="grid">
					<p class="grid-header">Invite Member</p>
					<div class="grid-body">
						<div class="item-wrapper">
							<div class="row">
								<div class="col-md-8 mx-left">
									<form action="" method="post">
										<div class="form-group row showcase_row_area">
											<div class="col-md-3 showcase_text_area">
												<label for="inputType12">Url</label>
											</div>
											<div class="col-md-9 showcase_content_area">
												<input type="input" class="form-control form-control-lg" name="link" value="{{ $url }}" id="inputType12" value="Sara Watson">
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