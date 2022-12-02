<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white; border-bottom: thick double #a3cd3b;  height: 6em;">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="{{'storage/logo.jpg'}}" alt="" style="width: 4em">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/home"><!--HOME-->
                                    INICIO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/clases"><!--GRUPOS-->
                                    GRUPOS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/alumnos"><!--ALUMNOS-->
                                    ALUMNAS
                                </a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
        </nav>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agrega Clase
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agrega una clase</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/agregarClase" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="input-group input-group-lg mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Instructor</span>
                                            <select  name="instructor" class="form-select" aria-label="Default select example">
                                                                <option disabled selected>Instructores...</option>
                                                                @foreach($instructores as $instructor)
                                                                    <option value="{{$instructor->id}}">{{$instructor->nombre}}</option>
                                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group input-group-lg mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Hora de inicio</span>
                                            <input name="h_inicial" type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-lg mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Hora de Termino</span>
                                            <input name="h_final" type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" value="Enviar" class="btn btn-primary">Guardar Clase</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6">    

                </div>
            </div>
            <br>
            <div class="accordion accordion-flush" id="accordionFlushExample">

                @foreach($clases as $clase)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$clase->id}}" aria-expanded="false" aria-controls="flush-collapse{{$clase->id}}">
                                Clase {{$clase->h_inicial}} - {{$clase->h_final}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$clase->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-4"><h4>Instructor: {{$clase->nombre}}</h4></div>
                                    <div class="col-4">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Agregar Alumna
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Alumna</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/inscribirAlumno" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="horaClase" value="{{$clase->id}}">
                                                    <div class="modal-body">
                                                        <!--<form class="d-flex" role="search">
                                                            <input class="form-control me-2" type="search" placeholder="Nombre de Alumna..." aria-label="Search">
                                                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                                                        </form>-->
                                                        <select name="alumno" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                                <option disabled selected>Elige una alumna</option>
                                                                @foreach($alumnos as $alumno)
                                                                    <option value="{{$alumno->id}}">{{$alumno->nombre}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$clase->id}}">
                                            Eliminar clase
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{$clase->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar clase</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estas seguro que deseas eliminar esta clase?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <form action="/eliminarClase" method="POST"><!--ELIMINAR-->
                                                        @csrf 
                                                        <input type="hidden" name="clase" value="{{$clase->id}}">
                                                        <button type="submit" class="btn btn-danger" value="Eliminar">Eliminar</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                                <ul class="list-group list-group-flush">
                                    @foreach($inscripciones as $inscrito)
                                        @if($inscrito->clase == $clase->id)
                                            <li class="list-group-item">
                                                {{$inscrito->nombre}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn-close float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar clase</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estas seguro que deseas quitar a {{$inscrito->alumno}} esta clase?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <form action="/eliminarAlumnoDeClase" method="POST"><!--ELIMINAR-->
                                                                @csrf 
                                                                <input type="hidden" name="inscripcion" value="{{$inscrito->id}}">
                                                                <button type="submit" class="btn btn-danger" value="Eliminar">Eliminar</button>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>