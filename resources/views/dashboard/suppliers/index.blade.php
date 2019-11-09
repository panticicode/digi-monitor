@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Suppliers</li>
			</ol>
		</nav>
	</div>
    <div class="form-group">
      <a href="{{ route('dashboard.suppliers.create') }}" class="btn btn-primary "><i class="fas fa-plus-square"></i></a>
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
											<th>Contact Person</th>
											<th>Land Line Number</th>
											<th>Cell Number</th>
											<th>Email</th>
											<th>Physical Address</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($suppliers as $supplier)
										<tr>
											<td>{{ $loop->index+1 }}</td>
											<td>{{ $supplier->name }}</td>
											<td>{{ $supplier->contact_person }}</td>
											<td>{{ $supplier->land_line }}</td>
											<td>{{ $supplier->cell }}</td>
											<td>{{ $supplier->email }}</td>
											<td>{{ $supplier->physical_address }}</td>
											<td>
												<a href="{{ route('dashboard.suppliers.edit', $supplier) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
												<form action="{{ route('dashboard.suppliers.destroy', $supplier) }}" method="post" class="d-inline">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{ $suppliers->appends($_GET)->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection