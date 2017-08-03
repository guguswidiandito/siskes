@extends('layouts.app')
@section('content')
{!! Form::model($rekam, ['route' => ['medis.update', $rekam], 'method' =>'patch'])!!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edit <strong>{{$rekam->no_rekam }}</strong></h3>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th width="200px">No Rekam Medis</th>
					<td>
						{!! Form::text('no_rekam', null, ['class'=>'form-control','','required', 'placeholder'=>'No Rekam Medis']) !!}
						{!! $errors->first('no_rekam', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Tanggal</th>
					<td>
						{!! Form::date('tgl_rekam', null, ['class'=>'form-control','required']) !!}
						{!! $errors->first('tgl_rekam', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Dokter</th>
					<td>
						{!! Form::select('dokter_id', $dokter, null, ['class'=>'form-control','required', 'placeholder'=>'Pilih dokter']) !!}
						{!! $errors->first('dokter_id', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Pasien</th>
					<td>
						{!! Form::select('pasien_id', $pasien, null, ['class'=>'form-control','required', 'placeholder'=>'Pilih pasien']) !!}
						{!! $errors->first('pasien_id', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Keluhan</th>
					<td>
						{!! Form::text('keluhan', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'Keluhan']) !!}
						{!! $errors->first('keluhan', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Diagnosa</th>
					<td>
						{!! Form::text('diagnosa', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'Diagnosa']) !!}
						{!! $errors->first('diagnosa', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Therapy</th>
					<td>
						{!! Form::text('theraphy', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'Therapy']) !!}
						{!! $errors->first('theraphy', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Biaya</th>
					<td>
						{!! Form::text('biaya', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'Biaya']) !!}
						{!! $errors->first('biaya', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<td colspan="2">
					{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
					<a href="{{ route('medis.index') }}" class="btn btn-default">Kembali</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
{!! Form::close() !!}
@endsection