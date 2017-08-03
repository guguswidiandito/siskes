@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <div class="pull-left">
      <a href="{{ route('medis.create') }}" class="btn btn-primary">Tambah Rekam</a>
    </div>
    <div class="pull-right">
      {!! Form::open(['method' => 'get', 'url' => '/medis', 'class'=>'form-inline']) !!}
      <div class="input-group{{ $errors->has('q') ? ' has-error' : '' }}">
        {!! Form::text('q', isset($q), ['class' => 'form-control', 'required', 'placeholder'=>'No Rekam']) !!}
        <small class="text-danger">{{ $errors->first('q') }}</small>
        <div class="input-group-btn">
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-condensed table-bordered" data-form="deleteForm">
        <thead>
          <th class="text-center">#</th>
          <th>No rekam</th>
          <th>Tanggal</th>
          <th>Dokter</th>
          <th>Pasien</th>
          <th>Poli</th>
          <th>Keluhan</th>
          <th>Diagnosa</th>
          <th>Therapy</th>
          <th>Biaya</th>
          <th>Aksi</th>
        </thead>
        @php $no = 1; @endphp @forelse ($rekams as $rekam)
        <tbody>
          <td class="text-center">{{ $no++ }}</td>
          <td>{{ $rekam->no_rekam }}</td>
          <td>{{ $rekam->tgl_rekam }}</td>
          <td>{{ $rekam->dokter->nama_dokter }}</td>
          <td>{{ $rekam->pasien->nama_pasien }}</td>
          <td>{{ $rekam->poli }}</td>
          <td>{{ $rekam->keluhan }}</td>
          <td>{{ $rekam->diagnosa }}</td>
          <td>{{ $rekam->theraphy }}</td>
          <td>Rp. {{ number_format($rekam->biaya) }}</td>
          <td>
            <div class="btn-group btn-group-vertical">
              <a href="{{ route('medis.edit', $rekam->id) }}" class="btn btn-default btn-sm">{{ trans('Edit') }}</a>
              {!! Form::model($rekam, ['route' => ['medis.destroy', $rekam], 'method' => 'delete', 'class'=>'form-delete'] ) !!}
              <button type="submit" name="delete_modal" class="btn btn-danger btn-sm">Hapus</button>
              {!! Form::close() !!}`
            </div>
          </td>
        </tbody>
        @empty
        <tr>
          <td colspan="11">Tidal ada data</td>
        </tr>
        @endforelse
      </table>
    </div>
    {{ $rekams->appends(compact('q'))->render() }}
  </div>
</div>
@endsection