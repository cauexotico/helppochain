@extends('layouts.master')

@section('content')
	{{ dump($blockchain) }}
	{{ dump($blockchain->blocks) }}
	{{ dump($blockchain->blocks()->first()->transactions)}}
	{{ dd($blockchain->projects)}}
@endsection