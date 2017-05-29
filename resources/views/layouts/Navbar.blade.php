<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>{{$title}}</title>
        <link rel="shortcut icon" href="{{Asset('images/logo3.png')}}" type="image/png" />
        <link rel="stylesheet" href="{{Asset('css/app.css')}}">
        <link rel="stylesheet" href="{{Asset('css/style.css')}}">
        <link rel="stylesheet" href="{{Asset('plugins/font-awesome/css/font-awesome.min.css')}}">
        @yield('styles')
        <script src="{{Asset('js/app.js')}}" type="Text/JavaScript"></script>
        @yield('scripts')
    </head>
    <body>

      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}">
              <img class="logo" alt="Logo" src="{{Asset('/images/logo3.png')}}">
            </a>
          </div>
          <div class="col-md-10 col-md-offset-1">
            <div class="navbar-text navbar-right">

              @if(session('rol') === 1)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Empleados  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('employee/create')}}">
                        <button type="submit" class="btn btn-navbar-custom">Registrar empleado</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('employee/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Ver empleados</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Usuarios  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('user/create')}}">
                        <button type="submit" class="btn btn-navbar-custom">Registrar usuario</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('user/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Ver usuarios</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              @elseif(session('rol') === 2)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(session('rol') === 3)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(session('rol') === 4)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(session('rol') === 5)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(session('rol') === 6)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(session('rol') === 7)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(session('rol') === 8)

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">{{session('name')}}  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(empty(session('rol')))
                <a href="#" class="navbar-link">
                  <button type="submit" class="btn btn-navbar-custom">Registrar indencia</button>
                </a>
                @if($title != "Login Servidocol")
                <a href="{{url('login')}}" class="navbar-link">
                  <button type="submit" class="btn btn-navbar-custom">Iniciar sesión</button>
                </a>
                @endif
              @endif


            </div>
          </div>
        </div>
      </nav>

      @yield('content')

    </body>
</html>
