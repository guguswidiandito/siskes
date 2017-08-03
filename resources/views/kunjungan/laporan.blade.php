@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Laporan Kunjungan</h3>
	</div>
	<div class="panel-body">
		{!! Form::open(['url' => route('laporan.kunjungan.post'), 'method' => 'post', 'target'=>'_blank']) !!}
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Dari</th>
					<td>
						{!! Form::date('awal', null, ['class'=>'form-control', 'required', 'autofocus']) !!}
						{!! $errors->first('awal', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th>Sampai</th>
					<td>
						{!! Form::date('akhir', null, ['class'=>'form-control', 'required']) !!}
						{!! $errors->first('akhir', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{!! Form::submit('Download', ['class'=>'btn btn-primary']) !!}
					</td>
				</tr>
			</tbody>
		</table>
		{!! Form::close() !!}
	</div>
</div>
@endsection