@extends('layouts.app')
@section('content')
{!! Form::model($dokter, ['route' => ['dokter.update', $dokter], 'method' =>'patch'])!!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edit <strong>{{ $dokter->nama_dokter }}</strong></h3>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th width="200px">No Dokter</th>
					<td>
						{!! Form::text('no_dokter', null, ['class'=>'form-control','disabled','required', 'placeholder'=>'No Dokter']) !!}
						{!! $errors->first('no_dokter', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Nama</th>
					<td>
						{!! Form::text('nama_dokter', null, ['class'=>'form-control','required', 'placeholder'=>'Nama']) !!}
						{!! $errors->first('nama_dokter', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">No Telepon</th>
					<td>
						{!! Form::number('no_telepon', null, ['class'=>'form-control','required', 'placeholder'=>'No Telepon']) !!}
						{!! $errors->first('no_telepon', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Alamat</th>
					<td>
						{!! Form::textarea('alamat_dokter', null, ['class'=>'form-control','required', 'placeholder'=>'Alamat']) !!}
						{!! $errors->first('alamat_dokter', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<th width="200px">Jenis Kelamin</th>
					<td>
						{!! Form::select('poli', ['Gigi'=>'Gigi', 'Umum'=>'Umum'], null, ['class'=>'form-control','required', 'placeholder'=>'Pilih poli']) !!}
						{!! $errors->first('poli', '<p class="help-block">:message</p>') !!}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
						<a href="{{ route('dokter.index') }}" class="btn btn-default">Kembali</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
{!! Form::close() !!}
@endsection