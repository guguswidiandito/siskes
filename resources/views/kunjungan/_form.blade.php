<table class="table table-bordered">
	<tbody>
		<tr>
			<th width="200px">No Kunjungan</th>
			<td>
				{!! Form::text('no_kunjungan', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'No Kunjungan']) !!}
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
		<td colspan="2">
			{!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-primary']) !!}
			<a href="{{ route('kunjungan.index') }}" class="btn btn-default">Kembali</a>
		</td>
	</tr>
</tbody>
</table>