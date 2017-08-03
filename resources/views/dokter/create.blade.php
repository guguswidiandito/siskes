@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title">
			Tambah Dokter
		</div>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'dokter.store'])!!}
		@include('dokter._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection