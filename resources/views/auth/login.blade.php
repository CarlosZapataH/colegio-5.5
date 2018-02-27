<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <div class="form-group ">
            <input type="email" name="email" id="inputEmail"
                   class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{ old('email') }}"
                   placeholder="Email address">
            {!! $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <input type="password" name="password" id="inputPassword"
                   class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Password">
            {!! $errors->first('password','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
