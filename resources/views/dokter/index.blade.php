@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <div class="pull-left">
      <a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-condensed table-bordered" data-form="deleteForm">
        <thead>
          <th class="text-center">#</th>
          <th>No Dokter</th>
          <th>Nama</th>
          <th>No Telepon</th>
          <th>Alamat</th>
          <th>Poli</th>
          <th>Aksi</th>
        </thead>
        @php
        $no = 1;
        @endphp
        @forelse ($dokters as $dokter)
        <tbody>
          <td class="text-center">{{ $no++ }}</td>
          <td>{{ $dokter->no_dokter }}</td>
          <td>{{ $dokter->nama_dokter }}</td>
          <td>{{ $dokter->no_telepon }}</td>
          <td>{{ $dokter->alamat_dokter }}</td>
          <td>{{ $dokter->poli }}</td>
          <td>
            <div class="btn-group btn-group-vertical">
              <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-default btn-sm">{{ trans('Edit') }}</a>
              {!! Form::model($dokter, ['route' => ['dokter.destroy', $dokter], 'method' => 'delete', 'class'=>'form-delete'] ) !!}
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
    {{ $dokters->appends(compact('q'))->render() }}
  </div>
</div>
@endsection