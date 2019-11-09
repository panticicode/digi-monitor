@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Groups</li>
			</ol>
		</nav>
	</div>
	<div class="form-group">
      <a href="{{ route('dashboard.groups.create') }}" class="btn btn-outline-primary "><i class="fas fa-plus-square"></i></a>
    </div>
	<div class="content-viewport">
		<div class="row">
			<div class="col-lg-12">
				<div class="grid">
					<div class="grid-body">
						<div class="item-wrapper">
							<div class="table-responsive">
								<table id="sample-data-table" class="data-table table table-striped">
									<thead>
										<tr>
											<th>Group Name</th>
											<th>Description</th>
											<th>Number Of Member</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($groups as $group)
											<tr>
												<td>{{ $group->name }}</td>
												<td>{{ $group->description }}</td>
												<td>{{ count($group->members) }}</td>
												<td>
													<a href="{{ route('dashboard.groups.edit', $group) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
													<form action="{{ route('dashboard.groups.destroy', $group) }}" method="post" class="d-inline">
														@csrf
														@method('DELETE')
														<button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
													</form>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
								{{ $groups->appends($_GET)->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection