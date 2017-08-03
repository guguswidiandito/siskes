@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    @if (Auth::check() && Auth::user()->hak_akses == 'pemeriksaan')
    <div class="pull-left">
      <a href="{{ route('resep.create') }}" class="btn btn-primary">Tambah Resep</a>
    </div>
    @endif
    @if (Auth::check() && Auth::user()->hak_akses == 'apotek')
    <div class="pull-left">
      @else
      <div class="pull-right">
        @endif
        {!! Form::open(['method' => 'get', 'url' => '/resep', 'class'=>'form-inline']) !!}
        <div class="input-group{{ $errors->has('q') ? ' has-error' : '' }}">
          {!! Form::text('q', isset($q), ['class' => 'form-control', 'required', 'placeholder'=>'No Resep']) !!}
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
            <th>No Resep</th>
            <th>Tanggal</th>
            <th>No Rekam Medis</th>
            <th>Pasien</th>
            <th>Dokter</th>
            {{--<th>Nama Obat</th>
            @if (Auth::check() && Auth::user()->hak_akses == 'apotek')
            <th>Jumlah</th>
            <th>Stok Terakhir</th>
            <th>Kekurangan</th> --}}
            {{-- @endif --}}
            <th>Aksi</th>
          </thead>
          @php $no = 1; @endphp @forelse ($reseps as $resep)
          <tbody>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $resep->no_resep }}</td>
            <td>{{ $resep->tgl_resep }}</td>
            <td>{{ $resep->rekam->no_rekam }}</td>
            <td>{{ $resep->pasien->nama_pasien }}</td>
            <td>{{ $resep->dokter->nama_dokter }}</td>
            {{-- <td>{{ $resep->obat->nama_obat }}</td>
            @if (Auth::check() && Auth::user()->hak_akses == 'apotek')
            <td class="text-center">{{ $resep->jumlah }}</td>
            <td class="text-center">{{ $resep->total_tersedia }}</td>
            <td class="text-center">{{ $resep->kekurangan }}</td>
            @endif --}}
            <td>
              <div class="">
                @if (Auth::check() && Auth::user()->hak_akses =='pemeriksaan')
                <a href="{{ route('resep.edit', $resep->id) }}" class="btn btn-default btn-sm">{{ trans('Edit') }}</a>
                {!! Form::model($resep, ['route' => ['resep.destroy', $resep], 'method' => 'delete', 'class'=>'form-delete'] ) !!}
                <button type="submit" name="delete_modal" class="btn btn-danger btn-sm">Hapus</button>
                {!! Form::close() !!}
                @endif
                @if (Auth::check() && Auth::user()->hak_akses =='apotek')
                <a href="{{ route('resep.show', $resep->id) }}" class="btn btn-sm btn-success">Tebus Resep</a>
                @endif
              </div>
            </td>
          </tbody>
          @empty
          <tr>
            <td colspan="13">Tidal ada data</td>
          </tr>
          @endforelse
        </table>
      </div>
      {{ $reseps->appends(compact('q'))->render() }}
    </div>
  </div>
</div>
@endsection