<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
{{--   <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
  window.Laravel = <?php echo json_encode([
  'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</head>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        @if (Auth::guest())
        <li>
          <a href="{{ url('/login') }}">Login</a>
        </li>
        @else
        <li>
          <a>{{ Auth::user()->name }}</a>
        </li>
        @endif
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="{{ url('/') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
          </li>
          @if (Auth::check() && Auth::user()->hak_akses == 'admin')
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-th-list"></i> Data <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
              <li>
                <a href="{{ route('pasien.index') }}">Pasien</a>
              </li>
              <li>
                <a href="{{ route('dokter.index') }}">Dokter</a>
              </li>
              <li>
                <a href="{{ route('kunjungan.index') }}">Kunjungan</a>
              </li>
              <li>
                <a href="{{ route('obat.index') }}">Obat</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-file"></i> Laporan <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo1" class="collapse">
              <li>
                <a href="{{ route('laporan.kunjungan') }}">Kunjungan</a>
              </li>
              <li>
                <a href="{{ route('laporan.obat') }}">Pengeluaran Obat</a>
              </li>
              <li>
                <a href="{{ route('laporan.tindakan') }}">Tindakan</a>
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::check() && Auth::user()->hak_akses == 'pemeriksaan' )
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-th-list"></i> Data <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
              <li>
                <a href="{{ route('medis.index') }}">Rekam Medis</a>
              </li>
              <li>
                <a href="{{ route('resep.index') }}">Resep</a>
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::check() && Auth::user()->hak_akses == 'pendaftaran' )
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-th-list"></i> Data <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
              <li>
                <a href="{{ route('pasien.index') }}">Pasien</a>
              </li>
              <li>
                <a href="{{ route('medis.index') }}">Rekam Medis</a>
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::check() && Auth::user()->hak_akses == 'apotek')
          <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-th-list"></i> Data <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
              <li>
                <a href="{{ route('obat.index') }}">Obat</a>
              </li>
              <li>
                <a href="{{ route('resep.index') }}">Resep</a>
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::check())
          <li>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
          @endif
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
      <div class="container-fluid">
        <br>
        @include('layouts._modal')
        @include('layouts._flash')
        @yield('content')
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{ asset('js/jquery.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script>
$('select').select2({
theme: "bootstrap"
});
</script>
<script>
$.fn.select2.defaults.set( "theme", "bootstrap" );
</script>
@yield('scripts')
<script>
$('table[data-form="deleteForm"]').on('click', '.form-delete', function (e) {
e.preventDefault();
var $form = $(this);
$('#confirm').modal({backdrop: 'static', keyboard: false}).on('click', '#delete-btn', function () {
$form.submit();
});
});
</script>
</body>
</html>