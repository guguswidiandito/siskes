@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title">
			Tambah Resep
		</div>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'resep.store'])!!}
		@include('resep._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection