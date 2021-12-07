<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
</head>
<body>
    <div>
      <img src="{{asset('img/banner_sup.jpg')}}" alt="holas" width="100%" />
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('img/logo.png')}}" alt="Logo" width="90" height="40" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
              </li>

              <!-- <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle" 
                    href="#" 
                    id="navbarDropdown1" 
                    role="button" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false"
                    >Nosotros</a
                >
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-link text-dark">
                        <a href="{{ url('vision-mision') }}">Misión y Visión</a>
                    </li>
                    <li class="nav-link text-dark">
                        <a href="{{ url('quienes-somos') }}">Quienes Somos</a>
                    </li>
                    <li>
                </ul>
              </li> -->
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
      <div id="app">
        <principal-component></principal-component>
      <!-- fixed-bottom  -->
      <div class="footer bg-dark text-white text-center">
        <div class="container pt-4">
            <section class="mb-4">
            <!-- Facebook -->
            <a
                class="btn btn-outline-light btn-floating text-white m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a
                class="btn btn-outline-light btn-floating text-white m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-twitter"></i
            ></a>

            <!-- Google -->
            <a
                class="btn btn-outline-light btn-floating text-white m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-google"></i
            ></a>

            <!-- Instagram -->
            <a
                class="btn btn-outline-light btn-floating text-white m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a
                class="btn btn-outline-light btn-floating text-white m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-linkedin"></i
            ></a>
            </section>
        </div>
        <div class="p-3">
        <p>&copy;TRABAJO REALIZADO POR: IVAN FLORES FLORES</p>
        </div>
    </div>
</body>
</html>
 