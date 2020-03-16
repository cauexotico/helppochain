@extends('layouts.master')

@section('content')
	<h4>Blockchain</h4>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Version</th>
			<th>Difficulty</th>
			<th>Type</th>
		</tr>
		@foreach($blockchains as $blockchain)
			<tr>
				<td>{{ $blockchain->id }}</td>
				<td>{{ $blockchain->version }}</td>
				<td>{{ $blockchain->difficulty }}</td>
				<td>{{ $blockchain->type }}</td>
			</tr>
		@endforeach
	</table>
@endsection