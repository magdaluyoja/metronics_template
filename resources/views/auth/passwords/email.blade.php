<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>PAD | Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="Jay-R A. Magdaluyo" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/css/admin/pages/login.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> 
    </head>

    <body class=" login">
        <div class="logo">
            <a href="index.html">
                <img src="/assets/admin/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <div class="content">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="forget-form" action="{{ route('password.email') }}" method="post" style="display: block;">
                {{ csrf_field() }}
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"  value="{{ old('email') }}"/> 
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions">
                    <a href="{{ URL::previous() }}" id="back-btn" class="btn red btn-outline">Back </a>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
                <p> Click
                        <a href="{{ route('login') }}"> here </a> to login. 
                </p>
            </form>
        </div>
        <div class="copyright"> {{date('Y')}} &copy; PAD. </div>
        <!--[if lt IE 9]>
            <script src="/assets/admin/global/plugins/respond.min.js"></script>
            <script src="/assets/admin/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="/js/admin/pages/login.min.js" type="text/javascript"></script>
    </body>
</html>