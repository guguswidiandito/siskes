<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="{{ asset('/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/signin.css')}}" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="{{ asset('/js/ie-emulation-modes-warning.js')}}"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
        window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
        </script>
    </head>
    <body style="background-color: #1c6109;">
        <div class="container-fluid">
            <img src="{{ asset('/images/LOGO DEPKES - BAKTI HUSADA.png') }}" class="center-block img-responsive" width="140px">
            <form class="form-signin" method="post" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <h2 class="form-signin-heading" style="color: white;">Silahkan login</h2>
                <label for="inputUsername" class="sr-only">Username</label>
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username"  required autofocus>
                @if ($errors->has('username'))
                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                @endif
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                @if ($errors->has('password'))
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                @endif
                <button class="btn btn-lg btn-default btn-block" type="submit">Masuk</button>
            </form>
        </div>
    </body>
    <script src="{{ asset('/js/ie10-viewport-bug-workaround.js')}}"></script>
</html>