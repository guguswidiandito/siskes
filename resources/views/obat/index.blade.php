@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <div class="pull-left">
      <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
    </div>
    <div class="pull-right">
      {!! Form::open(['method' => 'get', 'url' => '/obat', 'class'=>'form-inline']) !!}
      <div class="input-group{{ $errors->has('q') ? ' has-error' : '' }}">
        {!! Form::text('q', isset($q), ['class' => 'form-control', 'required', 'placeholder'=>'Kode Obat / Nama']) !!}
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
          <th>Kode obat</th>
          <th>Nama</th>
          <th>Satuan</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Kadaluarsa</th>
          <th>Jumlah</th>
          <th>Stok</th>
          <th>Aksi</th>
        </thead>
        @php $no = 1; @endphp
        @forelse ($obats as $obat)
        <tbody>
          <td class="text-center">{{ $no++ }}</td>
          <td>{{ $obat->kd_obat }}</td>
          <td>{{ $obat->nama_obat }}</td>
          <td>{{ $obat->satuan }}</td>
          <td>{{ $obat->tgl_masuk }}</td>
          <td>{{ $obat->tgl_keluar }}</td>
          <td class="text-center">{{ $obat->jumlah }}</td>
          <td class="text-center">{{ $obat->stock }}</td>
          <td>
            <div class="">
              @if ($obat->stock <= 0)
              <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-success btn-sm">{{ trans('Update Stok') }}</a>
              @endif
              {!! Form::model($obat, ['route' => ['obat.destroy', $obat], 'method' => 'delete', 'class'=>'form-delete'] ) !!}
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
    {{ $obats->appends(compact('q'))->render() }}
  </div>
</div>
@endsection