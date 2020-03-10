
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>{{__('Admin Login')}}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="https://colorlib.com/polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/icon/themify-icons/themify-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/icon/icofont/css/icofont.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/css/style.css')}}">
</head>
<body class="fix-menu">
<!-- Loader -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>

    <section class="login-block">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                        <div class="text-center">
                            <img src="{{asset('adminty/files/assets/images/logo-fooover.png')}}" width="300px" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                {{ Form::open(array('url' => 'admin/login', 'method' => 'POST')) }}
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">{{__('Log In')}}</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    {{ Form::email('email', '',array('class' => 'form-control','placeholder'=>'Enter Email','required')) }}
                                    @if ($message = Session::get('login_error'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @endif
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                                <div class="form-group form-primary">
                                    {{ Form::password('password',array('class' => 'form-control','placeholder'=>'Enter Passssword')) }}
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        {{ Form::submit('Log In', array('class'=>'btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20')) }}
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>

                </div>

            </div>

        </div>

    </section>


    <script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <script type="text/javascript" src="{{asset('adminty/files/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

    <script type="text/javascript" src="{{asset('adminty/files/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty/files/assets/js/common-pages.js')}}"></script>
    
</body>
</html>
