<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>{{$title}}</title>
        <link rel="shortcut icon" href="{{Asset('images/logo3.png')}}" type="image/png" />
        <link rel="stylesheet" href="{{Asset('css/app.css')}}">
        <link rel="stylesheet" href="{{Asset('css/style.css')}}">
        <link rel="stylesheet" href="{{Asset('plugins/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{Asset('plugins/sweetalert2/dist/sweetalert2.min.css')}}">
        @yield('styles')
        <script src="{{Asset('js/app.js')}}" type="Text/JavaScript"></script>
        <script src="{{Asset('plugins/sweetalert2/dist/sweetalert2.min.js')}}" type="Text/JavaScript"></script>
        <script src="{{Asset('plugins/validation/dist/jquery.validate.min.js')}}" type="Text/JavaScript"></script>
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
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Inventario  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('element/stock/create')}}">
                        <button type="submit" class="btn btn-navbar-custom">Crear elementos del inventario</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('element/stock/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Listar elementos del inventario</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('element/stock/report')}}">
                        <button type="submit" class="btn btn-navbar-custom">Reportes del inventario</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Elementos  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a class="btn btn-navbar-custom text-left" href="#">Categoria<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu" style="background-color:#4B85E8;">
                        <li>
                          <a href="{{url('element/category/create')}}">
                            <button type="submit" class="btn btn-navbar-custom">Crear categorias</button>
                          </a>
                        </li>
                        <li>
                          <a href="{{url('element/category/list')}}">
                            <button type="submit" class="btn btn-navbar-custom">Ver categorias</button>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu">
                      <a class="btn btn-navbar-custom" href="#">Marca<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu" style="background-color:#4B85E8;">
                        <li>
                          <a href="{{url('element/brand/create')}}">
                            <button type="submit" class="btn btn-navbar-custom">Crear marca</button>
                          </a>
                        </li>
                        <li>
                          <a href="{{url('element/brand/list')}}">
                            <button type="submit" class="btn btn-navbar-custom">Ver marcas</button>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu">
                      <a class="btn btn-navbar-custom" href="#">Elementos<i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu" style="background-color:#4B85E8;">
                        <li>
                          <a href="{{url('element/create')}}">
                            <button type="submit" class="btn btn-navbar-custom">Crear elementos</button>
                          </a>
                        </li>
                        <li>
                          <a href="{{url('element/list')}}">
                            <button type="submit" class="btn btn-navbar-custom">Ver elementos</button>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>

              <ul class="nav navbar-nav">
                <li>
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Incidencias  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('incident/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Ver incidencias</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('incident/search')}}">
                        <button type="submit" class="btn btn-navbar-custom">Buscar incidencias</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

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
                    <li>
                      <a href="{{url('user/restoreuserpassword')}}">
                        <button type="submit" class="btn btn-navbar-custom">Restablecer contraseña</button>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Incidencias  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('incident/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Ver incidencias</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('incident/search')}}">
                        <button type="submit" class="btn btn-navbar-custom">Buscar incidencias</button>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Incidencias  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('incident/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Ver incidencias</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('incident/search')}}">
                        <button type="submit" class="btn btn-navbar-custom">Buscar incidencias</button>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
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
                  <a href="#" data-toggle="dropdown"> <button class="btn btn-navbar-custom" type="button">Incidencias  <i class="fa fa-sort-desc" aria-hidden="true"></i></button></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('incident/create')}}">
                        <button type="submit" class="btn btn-navbar-custom">Crear incidencias</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('incident/list')}}">
                        <button type="submit" class="btn btn-navbar-custom">Ver incidencias</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('incident/search')}}">
                        <button type="submit" class="btn btn-navbar-custom">Buscar incidencias</button>
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
                      <a href="{{url('user/restore')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cambiar contraseña</button>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('logout')}}">
                        <button type="submit" class="btn btn-navbar-custom">Cerrar sesión</button>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              @elseif(empty(session('rol')))
                <a href="{{url('incident/create')}}" class="navbar-link">
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
    <script>
    $(document).ready(function(){
      $('.dropdown-submenu a.btn').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
    </script>
</html>
