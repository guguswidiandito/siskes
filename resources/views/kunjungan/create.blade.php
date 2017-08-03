@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title">
			Tambah Kunjungan
		</div>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'kunjungan.store'])!!}
		@include('kunjungan._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection