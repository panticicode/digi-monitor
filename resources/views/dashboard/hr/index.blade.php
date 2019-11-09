@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Human Resources</li>
			</ol>
		</nav>
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
											<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Birth Date</th>
											<th>Send Mail</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($members as $member)
										<tr>
											<td>{{ $loop->index+1 }}</td>
											<td>{{ $member->name }}</td>
											<td>{{ $member->email }}</td>
											<td>{{ $member->phone }}</td>
											<td>{{ $member->birth_date }}</td>
											<td><a href="" class="btn btn-success btn-sm"><i class="far fa-share-square"></i></a></td>
											<td>
												<a href="{{ route('dashboard.hr.edit', $member) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
												<form action="{{ route('dashboard.hr.destroy', $member) }}" method="post" class="d-inline">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{ $members->appends($_GET)->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection