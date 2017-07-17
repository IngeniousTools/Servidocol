<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error 401</title>
    <link rel="shortcut icon" href="{{Asset('images/logo3.png')}}" type="image/png" />
    <link rel="stylesheet" href="{{Asset('css/app.css')}}">
    <link rel="stylesheet" href="{{Asset('css/style.css')}}">
    <link rel="stylesheet" href="{{Asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <script src="{{Asset('js/app.js')}}" type="Text/JavaScript"></script>

    <style media="screen">
      body{
        padding-top: 120px;
        padding-left: 120px;
        background-color: rgb(75, 133, 232);
      }

      .img-position{
        display: block;
        background-color: transparent;
        align-items: center;
        width: 400px;
        height: 400px;
      }

      .error-message{
        font-size: 80px;
        color: #FFF;
      }
    </style>
  </head>
  <body>
    <a href="{{url('/')}}">
    <div class="col-md-5">
        <img src="{{Asset('images/logo3.png')}}" class="img-position" alt="Servidocol">
    </div>
    <div class="col-md-7">
      <div class="error-message" >
        <label>Error 401 <i class="fa fa-bug fa-6" aria-hidden="true"></i></label>
        <label>Acceso no autorizado</label>
      </div>
    </a>
    </div>
  </body>
</html>
