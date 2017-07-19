@Extends('layouts.Navbar')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
  @include('layouts.Slider')

  @if(session('errorincident'))
    <script type="text/javascript">
        swal({
          title: 'Error',
          type: 'error',
          html:
            'No hay incidentes registrados.',
          showCloseButton: true,
          confirmButtonText: '<i class="fa fa-times"></i> Cerrar',
        }).catch(swal.noop)

    </script>
  @endif

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <center><h2 class="center">Misión.</h2></center>
      <p>SERVIDOCOL LTDA es una empresa que nace de una necesidad concreta en el sector comercial y residencial, como es la falta de satisfacción en los canales de acceso; la empresa busca brindar tranquilidad y protección a instalaciones, bienes y personas en su vida cotidiana, haciendo crecer profesional, personal y laboralmente a nuestros colaboradores, para un altivo desarrollo del mercado y la sociedad.</p>

      <center><h2 class="center">Visión.</h2></center>
      <p>Nos hemos propuesto alcanzar reconocimiento y preferencia en la prestación de nuestros servicios de portería, aseo y mantenimiento en empresas públicas y privadas del área urbana, con el propósito de hacerlo extenso en otras ciudades de nuestro país y a largo plazo proyectarnos internacionalmente, manteniendo la calidad y los procesos, renovación de servicios y el mejoramiento humano, tecnológico y económico.</p>

    </div>
  </div>
</div>
@endsection
