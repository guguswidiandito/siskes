<table class="table table-bordered">
	<tbody>
		<tr>
			<th width="200px">No Resep</th>
			<td>
				{!! Form::text('no_resep', null, ['class'=>'form-control','autofocus','required', 'placeholder'=>'No Resep']) !!}
				{!! $errors->first('no_resep', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th width="200px">Tanggal</th>
			<td>
				{!! Form::date('tgl_resep', null, ['class'=>'form-control','required']) !!}
				{!! $errors->first('tgl_resep', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th width="200px">No Rekam Medis</th>
			<td>
				{!! Form::select('rekam_id', $rekam, null, ['class'=>'form-control','required', 'placeholder'=>'Pilih no rekam medis']) !!}
				{!! $errors->first('rekam_id', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		{{--  <tr>
			<th width="200px">Obat</th>
			<td>
				{!! Form::select('obat_id', $obat, null, ['class'=>'form-control','required', 'placeholder'=>'Pilih obat']) !!}
				{!! $errors->first('obat_id', '<p class="help-block">:message</p>') !!}
			</td>
		</tr>
		<tr>
			<th width="200px">Jumlah</th>
			<td>
				{!! Form::number('jumlah', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Jumlah']) !!}
				{!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
			</div>
		</td>
	</tr>
	<tr>
		<th width="200px">Aturan Pakai</th>
		<td>
			{!! Form::text('aturan_pakai', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Aturan Pakai']) !!}
			{!! $errors->first('aturan_pakai', '<p class="help-block">:message</p>') !!}
		</div>
	</td>
</tr>--}}
<tr>
	<td colspan="2">
		{!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-primary']) !!}
		<a href="{{ route('resep.index') }}" class="btn btn-default">Kembali</a>
	</td>
</tr>
</tbody>
</table>