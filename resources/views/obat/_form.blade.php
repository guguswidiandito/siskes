<table class="table table-bordered">
	<tbody>
		<tr>
			<th>Kode Dokter</th>
			<td>
				{!! Form::text('kd_obat', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'Kode Obat']) !!}
				{!! $errors->first('kd_obat', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th>Nama Obat</th>
			<td>
				{!! Form::text('nama_obat', null, ['class'=>'form-control','required', 'placeholder'=>'Nama Obat']) !!}
				{!! $errors->first('nama_obat', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th>Satuan</th>
			<td>
				{!! Form::text('satuan', null, ['class'=>'form-control','required', 'placeholder'=>'Satuan']) !!}
				{!! $errors->first('satuan', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th>Tanggal Masuk</th>
			<td>
				{!! Form::date('tgl_masuk', null, ['class'=>'form-control','required']) !!}
				{!! $errors->first('tgl_masuk', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th>Tanggal Kadaluarsa</th>
			<td>
				{!! Form::date('tgl_keluar', null, ['class'=>'form-control','required']) !!}
				{!! $errors->first('tgl_keluar', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<tr>
				<th>Jumlah</th>
				<td>
					{!! Form::number('jumlah', null, ['class'=>'form-control','required', 'placeholder'=>'Jumlah']) !!}
					{!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
				</td>
			</tr>
				<td colspan="2">
					{!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-primary']) !!}
					<a href="{{ route('obat.index') }}" class="btn btn-default">Kembali</a>
				</td>
			</tr>
		</tbody>
	</table>