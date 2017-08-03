@extends('layouts.app')
@section('content')
{!! Form::model($resep, ['route' => ['resep.update', $resep], 'method' =>'patch'])!!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>{{ $resep->no_resep }}</strong></h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <th width="200px">No Resep</th>
          <td>
            {!! Form::text('no_resep', null, ['class'=>'form-control','required', 'placeholder'=>'No Resep']) !!}
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
            {!! Form::select('rekam_id', $rekam, null, ['class'=>'form-control','disabled', 'placeholder'=>'Pilih no rekam medis']) !!}
            {!! $errors->first('rekam_id', '<p class="help-block">:message</p>') !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            {!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('resep.index') }}" class="btn btn-default">Kembali</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  {!! Form::close() !!}
</div>
@endsection