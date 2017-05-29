<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="{{Asset('images/bg-screen6.jpg')}}" alt="Slider1">
            <div class="carousel-caption">
              Servicios de recepción.
            </div>
          </div>
          <div class="item">
            <img src="{{Asset('images/bg-screen5.jpg')}}" alt="Slider2">
            <div class="carousel-caption">
              Servicios de seguridad.
            </div>
          </div>
          <div class="item">
            <img src="{{Asset('images/bg-screen8.jpg')}}" alt="Slider2">
            <div class="carousel-caption">
              Servicios domesticos.
            </div>
          </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
