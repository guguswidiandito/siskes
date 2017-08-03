@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title">
			Tambah Rekam Medis
		</div>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'medis.store'])!!}
		@include('medis._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection