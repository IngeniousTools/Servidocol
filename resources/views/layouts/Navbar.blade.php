<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>{{$title}}</title>
        <link rel="stylesheet" href="{{Asset('css/app.css')}}">
        <link rel="stylesheet" href="{{Asset('css/vendor.css')}}">
        <link rel="stylesheet" href="{{Asset('css/style.css')}}">
        @yield('styles')
        <script src="{{Asset('js/app.js')}}" type="Text/JavaScript"></script>
        @yield('scripts')
    </head>
    <body>

      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}">
              <img alt="Logo" src="...">
            </a>
          </div>
          <div class="col-md-10 col-md-offset-1">
            <div class="navbar-text navbar-right">
              <a href="#" class="navbar-link">
                <button type="submit" class="btn btn-navbar-custom">Registrar indencia</button>
              </a>
              <a href="{{url('login')}}" class="navbar-link">
                <button type="submit" class="btn btn-navbar-custom">Iniciar sesión</button>
              </a>
            </div>
          </div>
        </div>
      </nav>

      @yield('content')

    </body>
</html>
