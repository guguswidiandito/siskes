@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>{{ $resep->no_resep }}</strong></h3>
  </div>
  <div class="panel-body">
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td rowspan="6">
            <tr>
              <th>No Resep</th>
              <td>{{ $resep->no_resep }}</td>
            </tr>
            <tr>
              <th>Nama Pasien</th>
              <td>{{ $resep->pasien->nama_pasien }}</td>
            </tr>
            <tr>
              <th>Keluhan</th>
              <td>{{ $resep->rekam->keluhan }}</td>
            </tr>
            <tr>
              <th>Diagnosa</th>
              <td>{{ $resep->rekam->diagnosa }}</td>
            </tr>
            <tr>
              <th>Therapy</th>
              <td>{{ $resep->rekam->theraphy }}</td>
            </tr>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-6">
    {!! Form::open(array('url'=>'resep/obat')) !!}
    {!! Form::hidden('resep_id', $resep->id) !!}
      <table class="table table-bordered table-condensed">
        <tr>
          <th width="200px">Obat</th>
          <td>
            {!! Form::select('obat_id', $obat, null, ['class'=>'form-control','required', 'placeholder'=>'Pilih obat']) !!}
            {!! $errors->first('obat_id', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Jumlah</th>
          <td>
            {!! Form::number('jumlah', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Jumlah', 'min' => 1]) !!}
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
    </tr>
    <tr>
      <td colspan="2">
        <button type="submit" class="btn btn-success">Simpan</button>
      </td>
    </tr>
  </table>
  {!! Form::close() !!}
</div>
<div class="col-md-12">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="6">Daftar Obat Pasien</th>
      </tr>
      <tr>
        <th class="text-center">#</th>
        <th>Kode Obat</th>
        <th>Nama Obat</th>
        <th>Jumlah</th>
        <th>Kekurangan</th>
        <th>Aturan Pakai</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no=1;
      @endphp
      @forelse ($detailreseps as $detailresep)
      <tr>
        <td class="text-center">{{ $no++ }}</td>
        <td>{{ $detailresep->obat->kd_obat }}</td>
        <td>{{ $detailresep->obat->nama_obat }}</td>
        <td>{{ $detailresep->obat->jumlah }}</td>
        <td>{{ $detailresep->kekurangan }}</td>
        <td>{{ $detailresep->aturan_pakai }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="6">Tidak ada data</td>
      </tr>
      @endforelse
      <tr>
        <td colspan="6">
          {!! Form::open(['url' => '/resep/cetak/'.$resep->id, 'method' => 'get', 'target'=>'_blank']) !!}
          <button type="submit" class="btn btn-danger">Kekurangan</button>
          <a href="{{ route('resep.index') }}" class="btn btn-info">Kembali</a>
          {!! Form::close() !!}
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
@endsection