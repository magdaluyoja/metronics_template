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
            <form class="login-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off"  placeholder="Email/Username" value="{{ old('email') }}" name="email" /> 
                        @if ($errors->has('email'))
                            <span class="help-block">
                               {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
                        @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/> Remember me 
                    </label>
                    <button type="submit" class="btn green pull-right"> Login </button>
                </div>
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p> no worries, click
                        <a href="{{ route('password.request') }}"> here </a> to reset your password. </p>
                </div>
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