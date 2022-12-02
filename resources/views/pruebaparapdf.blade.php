<html>
  <head>
    <style>
      body{
        font-family: sans-serif;
      }
      @page {
        margin: 160px 50px;
      }
      header { position: fixed;
        left: 0px;
        top: -160px;
        right: 0px;
        height: 100px;
        background-color: #ddd;
        text-align: center;
      }
      header h1{
        margin: 10px 0;
      }
      header h2{
        margin: 0 0 10px 0;
      }
      footer {
        position: fixed;
        left: 0px;
        bottom: -50px;
        right: 0px;
        height: 40px;
        border-bottom: 2px solid #ddd;
      }
      footer .page:after {
        content: counter(page);
      }
      footer table {
        width: 100%;
      }
      footer p {
        text-align: right;
      }
      footer .izq {
        text-align: left;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <h1>Pilates Studio</h1>
      <h2>Lista de Alumnas</h2>
    </header>
    <footer>
      <table>
        <tr>
          <td>
              <p class="izq">
                Pilates Studio
              </p>
          </td>
          <td>
            <p class="page">
              Página
            </p>
          </td>
        </tr>
      </table>
    </footer>
    <div id="content">
      <p>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Cumpleaños</th>
              <th>Teléfono</th>
              <th>Padecimiento(s)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($alumnos as $alumno)
              <tr>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->cumpleaños}}</td>
                <td>{{$alumno->telefono}}</td>
                <td>{{$alumno->padecimiento}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </p>
      <p>
        Vestibulum pharetra fermentum fringilla...
      </p>

      <p style="page-break-before: always;">
        Pagina 2 jaja
      </p>
      </p>
      <p>
        No mas la dejo para no olvidar como agregar paginas :p
      </p>
    </div>
  </body>
</html>