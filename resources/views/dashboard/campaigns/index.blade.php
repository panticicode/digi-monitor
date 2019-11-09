@extends('layouts.dashboard')
@section('main')
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
			<li class="breadcrumb-item">
				<a href="{{ route('dashboard.index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Campaigns</li>
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
                                        <th>Name Template</th>
                                        <th>Type Template</th>
                                        <th>Group</th>
                                        <th>Now</th>
                                        <th>Send</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($campaigns as $campaign)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ strtoupper($campaign->getTemplate->name) }}</td>
                                            <td>{{ strtoupper($campaign->getTemplate->type) }}</td>
                                            <td>{{ $campaign->getGroup->name }}</td>
                                            <td>{{ $campaign->now }}</td>
                                            <td>{{ $campaign->is_send ? 'Send' : 'Waiting' }}</td>
                                            <td>
                                                <form action="{{ route('dashboard.campaigns.destroy', $campaign) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $campaigns->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection