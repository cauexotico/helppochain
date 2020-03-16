@extends('layouts.master')

@section('content')

	<h4>Project</h4>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Blockchain ID</th>
			<th>Name</th>
			<th>Type</th>
			<th>Api Key</th>
			<th>Start Version</th>
			<th>Current Version</th>
		</tr>
		@foreach($projects as $project)
			<tr>
				<td>{{ $project->id }}</td>
				<td>{{ $project->blockchain_id }}</td>
				<td>{{ $project->name }}</td>
				<td>{{ $project->type }}</td>
				<td>{{ $project->api_key }}</td>
				<td>{{ $project->start_version }}</td>
				<td>{{ $project->current_version }}</td>
			</tr>
		@endforeach
	</table>

@endsection