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
		<tr>
			<td>{{ $project->id }}</td>
			<td>{{ $project->blockchain_id }}</td>
			<td>{{ $project->name }}</td>
			<td>{{ $project->type }}</td>
			<td>{{ $project->api_key }}</td>
			<td>{{ $project->start_version }}</td>
			<td>{{ $project->current_version }}</td>
		</tr>
	</table>

	<h4>Blockchain</h4>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Version</th>
			<th>Difficulty</th>
			<th>Type</th>
		</tr>
		<tr>
			<td>{{ $project->blockchain->id }}</td>
			<td>{{ $project->blockchain->version }}</td>
			<td>{{ $project->blockchain->difficulty }}</td>
			<td>{{ $project->blockchain->type }}</td>
		</tr>
	</table>

	<h4>Blocks</h4>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Blockchain ID</th>
			<th>Nonce</th>
			<th>Height</th>
			<th>Previous Hash</th>
			<th>Hash</th>
		</tr>
		@foreach($project->blockchain->blocks as $block)
			<tr>
				<td>{{ $block->id }}</td>
				<td>{{ $block->blockchain_id }}</td>
				<td>{{ $block->nonce }}</td>
				<td>{{ $block->height }}</td>
				<td>{{ $block->previous_hash }}</td>
				<td>{{ $block->hash }}</td>
			</tr>
		@endforeach
	</table>
@endsection