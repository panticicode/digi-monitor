@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
 <ol class="breadcrumb has-arrow">
				<li class="breadcrumb-item">
					<a href="{{ route('dashboard.index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Members</li>
				
				<li id="ExportImport" class="breadcrumb-item">
					<a href="{{ route('export_xlsx') }}"><button class="btn btn-dark">Download Excel xlsx</button></a>
				</li>
				<li id="ExportImport" class="breadcrumb-item">
					<a href="{{ route('export_xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
				</li>
				<li id="ExportImport" class="breadcrumb-item">
					<a href="{{ route('export_csv') }}"><button class="btn btn-info">Download CSV</button></a>
				</li>
				
			</ol>
		</nav>
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            @csrf

            <input type="file" name="file" />
            <button class="btn btn-primary">Import File</button>
        </form>
	</div>
    <div class="form-group">
		<a href="{{ route('dashboard.members.create') }}" class="btn btn-outline-primary "><i class="fas fa-plus-square"></i></a>
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
											<th>Full Name:</th>
											<th>Birhtday:</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Nationality:</th>
											<th>Physical Address:</th>
											<th>Suburb</th>
											<th>Employment</th>
											<th>Occupation</th>
											<th>Tither:</th>
											<th>Weekly Tither:</th>
											<th>Monthly Tither:</th>
											<th>Marital Status:</th>
											<th>Weeding Date:</th>
											<th>Born Again:</th>
											<th>Baptized?</th>
											<th>Tongues?</th>
											<th>SUNDAY Attendance:</th>
											<th>BIBLE STUDY Attendance:</th>
											<th>Tuesday Service Attendance:</th>
											<th>FRIDAY PRAYERS</th>
											<th>NIGHT VIGIL</th>
											<th>Pregnant:</th>
											<th>Expected Delivery Date</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										@foreach($members as $member)
										
										<tr>
											<td>{{ $loop->index+1 }}</td>
											<td>{{ $member->full_name }}</td>
											<td>{{ $member->date_of_birth }}</td>
											<td>{{ $member->gender }}</td>
											<td>{{ $member->phone }}</td>
											<td>{{ $member->email }}</td>
											<td>{{ $member->address }}</td>
											<td>{{ $member->nationality }}</td>
											<td>{{ $member->suburb }}</td>
											<td>{{ $member->employment }}</td>
											<td>{{ $member->occupation }}</td>
											<td>{{ $member->tither }}</td>
											<td>{{ $member->weekly_tither }}</td>
											<td>{{ $member->monthly_tither }}</td>
											<td>{{ $member->marital_status }}</td>
											<td>{{ $member->weeding_date }}</td>
											<td>{{ $member->born_again }}</td>
											<td>{{ $member->baptized }}</td>
											<td>{{ $member->tongues }}</td>
											<td>{{ $member->sunday_attendance }}</td>
											<td>{{ $member->bible_study }}</td>
											<td>{{ $member->tuesday_service }}</td>
											<td>{{ $member->friday_prayers }}</td>
											<td>{{ $member->night_vigil }}</td>
											<td>{{ $member->pregnant }}</td>
											<td>{{ $member->delivery_date }}</td>
											<td>{{ $member->location }}</td>
											<td>
												<a href="{{ route('dashboard.members.edit', $member) }}" class="btn btn-outline-success btn-sm">Edit</a>
												<form action="{{ route('dashboard.members.destroy', $member) }}" method="post" class="d-inline">
													@csrf
													@method('DELETE')
													<button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
