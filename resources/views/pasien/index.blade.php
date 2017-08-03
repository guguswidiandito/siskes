@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <div class="pull-left">
      <a href="{{ route('pasien.create') }}" class="btn btn-primary">Tambah Pasien</a>
    </div>
    <div class="pull-right">
      {!! Form::open(['method' => 'get', 'url' => '/pasien', 'class'=>'form-inline']) !!}
      <div class="input-group{{ $errors->has('q') ? ' has-error' : '' }}">
        {!! Form::text('q', isset($q), ['class' => 'form-control', 'required', 'placeholder'=>'Nama / No Pasien']) !!}
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
          <th>No Pasien</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Status</th>
          <th>Agama</th>
          <th>Aksi</th>
        </thead>
        @php $no = 1; @endphp @forelse ($pasien as $pas)
        <tbody>
          <td class="text-center">{{ $no++ }}</td>
          <td>{{ $pas->no_pasien }}</td>
          <td>{{ $pas->nama_pasien }}</td>
          <td>{{ $pas->alamat_pasien }}</td>
          <td>{{ $pas->tanggal_lahir }}</td>
          <td>{{ $pas->jenis_kelamin }}</td>
          <td>{{ $pas->status }}</td>
          <td>{{ $pas->agama }}</td>
          <td>
            <div class="">
              <a href="{{ route('pasien.edit', $pas->id) }}" class="btn btn-default btn-sm">{{ trans('Edit') }}</a>
              {!! Form::model($pas, ['route' => ['pasien.destroy', $pas], 'method' => 'delete', 'class'=>'form-delete'] ) !!}
              <button type="submit" name="delete_modal" class="btn btn-danger btn-sm">Hapus</button>
              {!! Form::close() !!}
              @if (Auth::check() && Auth::user()->hak_akses == 'pendaftaran')
              {!! Form::open(['url' => '/pasien/kartu/'.$pas->id, 'method' => 'get', 'target'=>'_blank']) !!}
              <button type="submit" class="btn btn-sm btn-success">Kartu Pasien</button>
              {!! Form::close() !!}
              @endif
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
    {{ $pasien->appends(compact('q'))->render() }}
  </div>
</div>
@endsection