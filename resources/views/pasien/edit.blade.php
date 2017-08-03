@extends('layouts.app')
@section('content')
{!! Form::model($pasien, ['route' => ['pasien.update', $pasien], 'method' =>'patch'])!!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit <strong>{{ $pasien->nama_pasien }}</strong></h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th width="200px">No Pasien</th>
          <td>
            {!! Form::text('no_pasien', null, ['class'=>'form-control','autofocus', 'disabled', 'placeholder'=>'No Pasien']) !!}
            {!! $errors->first('no_pasien', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Nama</th>
          <td>
            {!! Form::text('nama_pasien', null, ['class'=>'form-control','required', 'placeholder'=>'Nama']) !!}
            {!! $errors->first('nama_pasien', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Alamat</th>
          <td>
            {!! Form::textarea('alamat_pasien', null, ['class'=>'form-control','required', 'placeholder'=>'Alamat']) !!}
            {!! $errors->first('alamat_pasien', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Tempat Lahir</th>
          <td>
            {!! Form::text('tempat_lahir', null, ['class'=>'form-control','required', 'placeholder'=>'Tempat Lahir']) !!}
            {!! $errors->first('tempat_lahir', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Tanggal Lahir</th>
          <td>
            {!! Form::date('tanggal_lahir', null, ['class'=>'form-control','required']) !!}
            {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Jenis Kelamin</th>
          <td>
            {!! Form::select('jenis_kelamin', ['Laki-laki'=>'Laki-laki', 'Perempuan'=>'Perempuan'], null, ['class'=>'form-control','required', 'placeholder'=>'Pilih jenis kelamin']) !!}
            {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Status</th>
          <td>
            {!! Form::select('status', ['Umum'=>'Umum', 'BPJS'=>'BPJS'], null, ['class'=>'form-control','required', 'placeholder'=>'Pilih status']) !!}
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Golongan Darah</th>
          <td>
            {!! Form::select('gol_darah', ['A'=>'A', 'B'=>'B', 'O'=>'O', 'AB'=>'AB'], null, ['class'=>'form-control','required', 'placeholder'=>'Pilih golongan darah']) !!}
            {!! $errors->first('gol_darah', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <th width="200px">Agama</th>
          <td>
            {!! Form::select('agama', ['Islam'=>'Islam', 'Kristen'=>'Kristen', 'Hindu'=>'Hindu', 'Buddha'=>'Buddha'], null, ['class'=>'form-control', 'required', 'placeholder'=>'Pilih agama']) !!}
            {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('pasien.index') }}" class="btn btn-default">Kembali</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
{!! Form::close() !!}
@endsection