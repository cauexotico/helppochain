@extends('layouts.master')

@section('title')
	New Block
@endsection

@section('content')
	
	<form action="#" method="POST">
		@csrf
		<input type="number" name="id" placeholder="id">
		<input type="number" name="blockchain_id" placeholder="blockchain_id">
		<input type="number" name="nonce" placeholder="nonce">
		<input type="text" name="data" placeholder="data">
		<input type="text" name="previous_hash" placeholder="previous_hash">
		<input type="text" name="hash" placeholder="hash">

		<input type="submit">
	</form>

@endsection

