@extends('layouts.app')
@section('content')
{!! Form::model($obat, ['route' => ['obat.update', $obat], 'method' =>'patch'])!!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit <strong>{{ $obat->nama_obat }}</strong></h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th>Kode Dokter</th>
          <td>
            {!! Form::text('kd_obat', null, ['class'=>'form-control','disabled', 'placeholder'=>'Kode Obat']) !!}
            {!! $errors->first('kd_obat', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th>Nama Obat</th>
          <td>
            {!! Form::text('nama_obat', null, ['class'=>'form-control', 'disabled', 'placeholder'=>'Nama Obat']) !!}
            {!! $errors->first('nama_obat', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th>Satuan</th>
          <td>
            {!! Form::text('satuan', null, ['class'=>'form-control','disabled', 'placeholder'=>'Satuan']) !!}
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
            @if ($obat->stock >=1 )
            <td>
              {!! Form::number('jumlah', null, ['class'=>'form-control', 'disabled', 'placeholder'=>'Jumlah', 'min'=>1]) !!}
              {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
            </td>
            @else
            <td>
              {!! Form::number('jumlah', 0, ['class'=>'form-control', 'required', 'placeholder'=>'Jumlah', 'min'=>1]) !!}
              {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
            </td>
            @endif
          </tr>
          <tr>
            <td colspan="2">
              @if ($obat->stock >=1)
              {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
              <a href="{{ route('obat.index') }}" class="btn btn-default">Kembali</a>
              @else
              {!! Form::submit('Update Stok', ['class'=>'btn btn-primary']) !!}
              <a href="{{ route('obat.index') }}" class="btn btn-default">Kembali</a>
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection