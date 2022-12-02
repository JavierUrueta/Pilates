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
                <div class="row justify-content-between">
                    <div class="col-3">
                        <!--Agregar Alumno Bomnito--><!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Agregar Alumno
                        </button>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('alumnos.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="file" name="file" class="form-control">
                                    <button class="btn btn-outline-secondary float-end" style="background-color: #1D6F42;">
                                        Importar
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        </svg>
                                    </button>
                                </div>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="/exportarAlumnos">
                            <a class="btn btn-primary float-start" href="{{ route('alumnos.export') }}" style="background-color: #1D6F42;">
                                Exportar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                            </a>
                        </form>
                        <form action="/creaPdf" method="GET">
                            <button type="submit"class="btn btn-primary float-end" href="{{ env('APP_URL') }}/css/pdf/memorias.css" rel="stylesheet" style="background-color: #F40F02;">
                                PDF
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
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