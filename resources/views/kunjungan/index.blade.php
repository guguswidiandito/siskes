@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <div class="pull-left">
      <a href="{{ route('kunjungan.create') }}" class="btn btn-primary">Tambah Kunjungan</a>
    </div>
    <div class="pull-right">
      {!! Form::open(['method' => 'get', 'url' => '/kunjungan', 'class'=>'form-inline']) !!}
      <div class="input-group{{ $errors->has('q') ? ' has-error' : '' }}">
        {!! Form::text('q', isset($q), ['class' => 'form-control', 'required', 'placeholder'=>'No Kunjungan']) !!}
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
          <th>No Kunjungan</th>
          <th>Tanggal</th>
          <th>Dokter</th>
          <th>Pasien</th>
          <th>Poli</th>
          <th>Petugas</th>
          <th>Aksi</th>
        </thead>
        @php $no = 1; @endphp @forelse ($kunjungans as $kunjungan)
        <tbody>
          <td class="text-center">{{ $no++ }}</td>
          <td>{{ $kunjungan->no_kunjungan }}</td>
          <td>{{ $kunjungan->tgl_kunjungan }}</td>
          <td>{{ $kunjungan->dokter->nama_dokter }}</td>
          <td>{{ $kunjungan->pasien->nama_pasien }}</td>
          <td>{{ $kunjungan->poli }}</td>
          <td>{{ $kunjungan->user->name }}</td>
          <td>
            <div class="btn-group btn-group-vertical">
              <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-default btn-sm">{{ trans('Edit') }}</a>
              {!! Form::model($kunjungan, ['route' => ['kunjungan.destroy', $kunjungan], 'method' => 'delete', 'class'=>'form-delete'] ) !!}
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
    {{ $kunjungans->appends(compact('q'))->render() }}
  </div>
</div>
@endsection