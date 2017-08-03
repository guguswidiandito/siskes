@extends('layouts.app')
@section('content')
{!! Form::model($kunjungan, ['route' => ['kunjungan.update', $kunjungan], 'method' =>'patch'])!!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edit <strong>{{ $kunjungan->no_kunjungan }}</strong></h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th width="200px">No Kunjungan</th>
						<td>
							{!! Form::text('no_kunjungan', null, ['class'=>'form-control','disabled','required', 'placeholder'=>'No Kunjungan']) !!}
							{!! $errors->first('no_kunjungan', '<p class="help-block">:message</p>') !!}
						</td>
					</tr>
					<tr>
						<th width="200px">Tanggal</th>
						<td>
							{!! Form::date('tgl_kunjungan', null, ['class'=>'form-control','required']) !!}
							{!! $errors->first('tgl_kunjungan', '<p class="help-block">:message</p>') !!}
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
						<td colspan="2">
							{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
							<a href="{{ route('kunjungan.index') }}" class="btn btn-default">Kembali</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection