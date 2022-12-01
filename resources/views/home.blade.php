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
                                <a class="nav-link  active" aria-current="page" href="/home"><!--HOME-->
                                    INICIO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/clases"><!--GRUPOS-->
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
        <div class="container text-center">
            <div class="row justify-content-around">
                <div class="col-12 shadow p-3 mb-5 bg-body rounded">
                    <h3>Instructores</h3>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success float-start" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        Agregar Instructora
                    </button>
                    <br>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Instructor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/agregarInstructor" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                                                <input name="nombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Turno</span>
                                                <select  name="turno" class="form-select" aria-label="Default select example">
                                                                    <option selected>Turno...</option>
                                                                    <option value="Matutino">Matutino</option>
                                                                    <option value="Vespertino">Vespertino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" value="Enviar" class="btn btn-primary">Guardar Instructor</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($instructores as $instructor)
                                <tr>
                                    <td>{{$instructor->nombre}}</td>
                                    <td>{{$instructor->turno}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" data-id="{{$instructor->id}}" data-nombre="{{$instructor->nombre}}" data-turno="{{$instructor->turno}}" value="Editar" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$instructor->id}}">
                                            Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{$instructor->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Instructor</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="/almacenar" method="post"> <!--CUERPO Y PIE DEL MOODAL DE EDICION-->
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{$instructor->id}}">
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                                                                <input id="nombre" name="nombre" type="text" value="{{$instructor->nombre}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                            </div>
                                                            <div class="input-group input-group-sm mb-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Turno</span>
                                                                <select  id="turno" name="turno" value="{{$instructor->turno}}" class="form-select" aria-label="Default select example">
                                                                    <option selected>{{$instructor->turno}}</option>
                                                                    <option value="Matutino">Matutino</option>
                                                                    <option value="Vespertino">Vespertino</option>
                                                                </select>
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
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$instructor->id}}">
                                            Eliminar
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{$instructor->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar clase</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estas seguro que deseas eliminar este Instrcutor?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <form action="/eliminarInstructor" method="POST"><!--ELIMINAR-->
                                                        @csrf 
                                                        <input type="hidden" name="instructor" value="{{$instructor->id}}">
                                                        <button type="submit" class="btn btn-danger" value="Eliminar">Eliminar</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--<div class="col-6 shadow p-3 mb-5 bg-body rounded">
                    Clases muestra
                    <br><br>
                    
                    <button type="button" class="btn btn-success float-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Agendar Clase Muestra
                    </button>

                    
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Clase Muestra</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <script>
            $( document ).ready(function() {
                console.log( "ready!" );
            });

            $(document).ready(function(){
                $('.btn-warning').click(function()
                {
                    var id=$(this).attr('data-id');
                    var nombre=$(this).attr('data-nombre');
                    var turno=$(this).attr('data-turno');

                    $('#id').val(id);
                    $('#nombre').val(nombre);
                    $('#turno').val(turno);

                    //$("html, body").animate({ scrollTop: 0 }, "fast");
                    //$('#staticBackdrop').modal('show');
                })
            });
        </script>
    </body>
</html>