<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous">
        </script>
    </head>
  <body>
        @if(Auth::user()->hasRole('Admin'))
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white; border-bottom: thick double #a3cd3b; height: 6em;">
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
                                <a class="nav-link" href="/clases"><!--GRUPOS-->
                                    GRUPOS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  active" href="/alumnos"><!--ALUMNOS-->
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
            <div class="container">
                <br>
                <div class="col-6">
                    <!--Agregar Alumno Bomnito--><!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar Alumno
                    </button>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Alumno</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/agregarAlumno" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Foto</span>
                                            <input name="foto" type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                                            <input name="nombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Cumpleaños</span>
                                            <input name="cumpleaños" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Teléfono</span>
                                            <input name ="telefono" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Padecimiento(s)</span>
                                            <input name="padecimiento" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" value="Enviar" class="btn btn-primary">Guardar Alumno</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Alumno</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/agregarAlumno" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Foto</span>
                                            <input name="foto" type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                                            <input name="nombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Cumpleaños</span>
                                            <input name="cumpleaños" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Teléfono</span>
                                            <input name ="telefono" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Padecimiento(s)</span>
                                            <input name="padecimiento" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" value="Enviar" class="btn btn-primary">Guardar Alumno</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-responsive table-striped">
                    <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Cumpleaños</th>
                                <th>Teléfono</th>
                                <th>Padecimiento(s)</th>
                                <th></th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td><img src="{{'/storage/'.$alumno->name}}" alt="..." width="50" height="50"></td>
                                    <td>{{$alumno->nombre}}</td>
                                    <td>{{$alumno->cumpleaños}}</td>
                                    <td>{{$alumno->telefono}}</td>
                                    <td>{{$alumno->padecimiento}}</td>
                                    <td>                                 
                                        <button data-id="{{$alumno->id}}" data-foto="{{$alumno->foto}}" data-nombre="{{$alumno->nombre}}" data-cumpleaños="{{$alumno->cumpleaños}}" data-telefono="{{$alumno->telefono}}" data-padecimiento="{{$alumno->padecimiento}}" type="button" class="btn btn-warning" value="Editar" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</button>
                                    </td>
                                    <td>
                                        <form action="/eliminarAlumno" method="POST"><!--ELIMINAR-->
                                            @csrf 
                                            <input type="hidden" name="alumno" value="{{$alumno->id}}">
                                            <button type="submit" class="btn btn-danger" value="Eliminar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!--MODAL EDICION-->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Alumno</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/almacenar1" method="post" enctype="multipart/form-data"> <!--CUERPO Y PIE DEL MOODAL DE EDICION-->
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$alumno->id}}">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Foto</span>
                                                        <input id="foto" name="foto" type="file" value="{{$alumno->foto}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    </div>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                                                        <input id="nombre" name="nombre" type="text" value="{{$alumno->nombre}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    </div>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Cumpleaños</span>
                                                        <input  id="cumpleaños" name="cumpleaños" type="date" value="{{$alumno->cumpleaños}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    </div>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Teléfono</span>
                                                        <input id="telefono" name ="telefono" type="text" value="{{$alumno->telefono}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    </div>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Padecimiento(s)</span>
                                                        <input id="padecimiento" name="padecimiento" type="text" value="{{$alumno->padecimiento}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <h1>NO ERES ADMIN :(</h1>
        @endif

        <script>
        $( document ).ready(function() {
             console.log( "ready!" );
        });

            $(document).ready(function(){
                $('.btn-warning').click(function()
                {
                    var id=$(this).attr('data-id');
                    var foto=$(this).attr('data-foto');
                    var nombre=$(this).attr('data-nombre');
                    var cumpleaños=$(this).attr('data-cumpleaños');
                    var telefono=$(this).attr('data-telefono');
                    var padecimeinto=$(this).attr('data-padecimiento');

                    $('#id').val(id);
                    $('#foto').val(foto);
                    $('#nombre').val(nombre);
                    $('#cumpleaños').val(cumpleaños);
                    $('#telefono').val(telefono);
                    $('#padecimiento').val(padecimeinto);

                    //$("html, body").animate({ scrollTop: 0 }, "fast");
                    //$('#staticBackdrop').modal('show');
                    

                })
            });
        </script>
    </body>
</html>