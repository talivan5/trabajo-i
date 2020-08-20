<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .footer {
           left: 0;
           bottom: 0;
           width: 100%;
           background-color: red;
           color: white;
           text-align: center;
        }
        .footer p{
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
        <a class="navbar-brand" href="{{ url('/') }}">PARADAS PROV</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#mision">Misión</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#vision">Visión</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#historia">Historia</a>
              </li>
          </ul>
          <div class="position-ref full-height navbar-nav">
            @if (Route::has('login'))
              @auth
                  <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
              @else
                  {{-- <a class="nav-link" href="{{ route('login') }}" data-toggle="modal" data-target="#login">Login</a> --}}
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#login">Iniciar</a>
                  @if (Route::has('register'))
                  {{-- <a class="nav-link" href="{{ route('register') }}" data-toggle="modal" data-target="#registrar">Registrar</a> --}}
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#registrar">Registrar</a>
                  @endif
              @endauth
            @endif
          </div>
        </div>
      </nav>
      <div class="modal fade" id="historia" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">HISTORIA</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p style="text-align: justify">
                    EL TRANSPORTE SIEMPRE HA JUGADO UN ROL IMPORTANTE COMO MEDIO ARTICULADOR DE LA SOCIEDAD. EL DESARROLLO DE LA ECONOMÍA EN GENERAL, GIRA EN TORNO A LA MOVILIDAD DE PERSONAS Y BIENES FÍSICOS, ADEMÁS LA ESPECIALIZACIÓN ECONÓMICA SE HA POTENCIADO GRACIAS AL TRANSPORTE. EXISTE EVIDENCIA SOBRE EL EFECTO DE LA PROVISIÓN DE SERVICIOS DE TRANSPORTE, SOBRE LA REDUCCIÓN DE LA POBREZA EN ALGUNAS REGIONES DEL MUNDO.
                    EN LAS ÚLTIMAS DÉCADAS, LA EXPANSIÓN DEMOGRÁFICA, EN LAS CIUDADES DEL PAÍS, HA GENERADO UN INCREMENTO SUSTANCIAL EN LA DEMANDA POR SERVICIOS BÁSICOS, ENTRE LOS QUE SE INCLUYE EL TRANSPORTE DE PASAJEROS. ESTE CRECIMIENTO, NO FUE ACOMPAÑADO POR UNA PLANIFICACIÓN, EN LO REFERIDO A PARQUE AUTOMOTOR, NI A INFRAESTRUCTURA VIAL.
                    EL CRECIMIENTO POBLACIONAL EN LA CIUDAD DE ORURO, FUE ACELERADO ENTRE 1980-1990, PROPICIADO POR FACTORES COMO LA RELOCALIZACIÓN DE LAS MINAS Y EL CRECIMIENTO VEGETATIVO NATURAL. EN ESTA ETAPA, EL SISTEMA DE TRANSPORTE, TAMBIÉN CAMBIA, AL SUSTITUIRSE EL PARQUE AUTOMOTOR PRINCIPALMENTE CONFORMADO POR BUSES, POR UNIDADES DE MENOR CAPACIDAD. LOS HITOS IDENTIFICADOS EN RELACIÓN AL SISTEMA DE TRANSPORTE, PRESENTA LAS CARACTERÍSTICAS ADELANTE DESCRITAS.
                </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="vision" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">VISIÓN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p style="text-align: justify">
                    NUESTRA APLICACIÓN FACILITARA EN EL DESARROLLO Y DESEMPEÑO DE NUESTRA CIUDAD YA QUE CON ELLA PODRÁN LLEGAR A UNA PARADA DE SALIDAS PROVINCIALES, CON UNA UBICACIÓN EN TIEMPO REAL YA QUE AHORA EXISTE LA TECNOLOGÍA INTERNET CELULARES, TABLET Y TAMBIÉN AYUDARA A LA CIUDAD EN LOS LUGARES TURÍSTICOS PORQUE EN LA ACTUALIDAD EXISTEN PROVINCIAS CON TURISMO.
                </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="mision" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">MISIÓN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p style="text-align: justify">
                    PROVEER A NUESTRA CIUDADANÍA LA APLICACIÓN WEB QUE IMPULSEN EL DESARROLLO COMPETITIVO Y PRODUCTIVO Y EFECTIVO PROPORCIONANDO, LA INFORMACIÓN NECESARIA PARA QUE PUEDAN ACCEDER Y VER LAS VENTAJAS DE LA PÁGINA WEB PARA PARADAS PROVINCIALES Y ASÍ SATISFACER LAS NECESIDADES DE NUESTRA CIUDADANÍA.
                </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="login" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">{{ __('Inicio de sesión') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordar Inicio') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Olvido su contraseña?') }}
                    </a>
                @endif
                <button type="submit" class="btn btn-primary">
                    {{ __('Ingresar') }}
                </button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="registrar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">{{ __('Registrarse') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      <!-- carrusel de imagenes parte superior -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/lugares1.jpg') }}" class="d-block w-100" style="height:400px;">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/oruro.jpg') }}" class="d-block w-100" style="height:400px;">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/unnamed.jpg') }}" class="d-block w-100" style="height:400px;">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/unnamed.jpg') }}" class="d-block w-100" style="height:400px;">
            <div class="carousel-caption d-none d-md-block">
                <h1 style="background-color: blue;"><a href="https://satellites.pro/Oruro_map" target="_blank">Satelite</a></h1>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- cars de imagenes y comentarios -->
      <br>
      <div id="app" class="container">
        <principal-component></principal-component><br>
        <div class="row">
            <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/capachos1.jpg') }}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">CAPACHOS</h5>
                        <p class="card-text" style="text-align: justify;">
                            El balneario de Capachos un lugar turístico de aguas termales cuya administración depende del Gobierno Municipal de Oruro, genera diariamente entre 800 y 1.050 bolivianos por la afluencia de gente que diariamente visita el lugar.
                        </p>
                        <a href="https://boliviaesturismo.com/balneario-de-capachos-oruro-boliviaesturismo/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/sabaya1.jpg') }}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">SABAYA</h5>
                        <p class="card-text" style="text-align: justify;">
                            Sabaya es una población y municipio rural de Bolivia, ubicado en la Provincia Sabaya del Departamento de Oruro.
                            El municipio está conformado por comunidades rurales,
                            durante la presidencia de Hernán Siles Suazo.
                        </p>
                        <a href="http://sabayabolivia.com/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/huachacalla1.jpg') }}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">HUACHACALLA</h5>
                        <p class="card-text" style="text-align: justify;">
                            Fue designada como capital de la nueva provincia Sur Carangas, por Ley de 11 de noviembre de 1950 durante el gobierno de Mamerto Urriolagoitia,3 al dividirse la antigua provincia de Carangas. Posteriormente.
                        </p>
                        <a href="http://sabayabolivia.com/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/corque2.jpg') }}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">CORQUE</h5>
                        <p class="card-text" style="text-align: justify;">
                            El municipio está conformado por comunidades rurales, incluyendo: Corque, Jancocala, Copacabana, Caracota, Pajoco, Villa Tarucachi, Pomata Ayte, San Antonio de Nor Cala, Opoqueri, San José de Kala, Villa Esperanza, Andapata Lupe, Laca Laca y San Pedro de Huaylloco.
                        </p>
                        <a href="https://boliviaesturismo.com/balneario-de-capachos-oruro-boliviaesturismo/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/pisiga1.jpg') }}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">PISIGA</h5>
                        <p class="card-text" style="text-align: justify;">
                            Pisiga Bolivar, o simplemente Pisiga, es un Distrito Municipal Urbano de Bolivia ubicado en la frontera con Chile, perteneciente al municipio de Sabaya en la Provincia de Sabaya del Departamento de Oruro.
                            Fue creado por Ley el 28 de julio de 1996, sobre la frontera internacional.
                        </p>
                        <a href="http://sabayabolivia.com/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/todossantos1.jpg') }}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">TODOS SANTOS</h5>
                            <p class="card-text" style="text-align: justify;">
                                Todos Santos es una localidad y municipio, segunda sección de la provincia Mejillones del Departamento de Oruro de Bolivia.
                                Fue designada como segunda sección de provincia por Ley 18 de febrero de 1993 durante el gobierno de Jaime Paz Zamora.
                            </p>
                        <a href="http://sabayabolivia.com/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <br>
      <p>
        <button class="btn btn-warning btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Ver más
        </button>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="container">
                <div class="row">
                    <div class="col col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/toledo1.jpg') }}" height="200px">
                            <div class="card-body">
                                <h5 class="card-title">TOLEDO</h5>
                                <p class="card-text" style="text-align: justify;">
                                    Toledo es una población y municipio de Bolivia, capital de la provincia de Saucarí en el departamento de Oruro. Fue designada como capital de provincia por Ley de 23 de noviembre de 1963 al crearse la provincia, durante el gobierno de Víctor Paz Estenssoro.
                                </p>
                                <a href="https://boliviaesturismo.com/balneario-de-capachos-oruro-boliviaesturismo/" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/challacollo1.jpg') }}" height="200px">
                            <div class="card-body">
                                <h5 class="card-title">CHALLACOLLO</h5>
                                <p class="card-text" style="text-align: justify;">
                                    La ubicación de Challacollo es la siguiente: Bolivia, Oruro, Oruro, Challacollo. ViaMichelin te ofrece la posibilidad de consultar los+ mapas detallados de Bolivia, Oruro, Oruro, Challacollo. A parte de la cartografía clásica, encontrarás allí los principales puntos de interés de la ciudad.
                                </p>
                                <a href="https://mapasamerica.dices.net/bolivia/mapa.php?nombre=Challacollo&id=29411" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/choro1.jpg') }}" height="200px">
                            <div class="card-body">
                                <h5 class="card-title">CHORO</h5>
                                <p class="card-text" style="text-align: justify;">
                                    El Choro es una población y municipio rural de Bolivia, ubicado en la Provincia de Cercado del Departamento de Oruro. Está situado al oeste del Río Desaguadero y al norte del Lago Poopó.
                                    El municipio cuenta con una población de 8.725 habitantes (según el Censo INE).
                                </p>
                                <a href="https://www.comunicacion.gob.bo/?q=20170204/23146" target="_blank" class="btn btn-success btn-lg btn-block">Su pagina</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <br><br><br>
      <div class="footer fixed-bottom">
        <p>&copy;TRABAJO REALIZADO POR: IRIS ASUNCION SERRUDO CONDORI Y ELMER FLORES MIRANDA</p>
      </div>
</body>
</html>
