@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<h3 class="panel-title">Tambah Pasien</h3>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'pasien.store'])!!}
		@include('pasien._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection