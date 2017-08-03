@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title">
			Tambah Obat
		</div>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'obat.store'])!!}
		@include('obat._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection