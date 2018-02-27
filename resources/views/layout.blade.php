<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="School">
    <meta name="author" content="Carlos Zapata H.">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    @yield('head')
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Colegio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('alumnos.index')}}">Alumnos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('alumnos.create')}}">Matricula </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Asistencia</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{route('asistencias.index')}}">Asistencia de Alumnos</a>
                            <a class="dropdown-item" href="{{route('asistencias.reporte')}}">Reporte</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{auth()->user()->name}} </a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0" method="POST" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">Practicando ando...</span>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('script')
</body>
</html>
