<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Usuarios</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container">
            <div class="row"
                 <div class="col-12 text-center">
            <h2 class="mt-5 mb-5">Lista de Usuarios condominio Antupiren</h2>
                </div>
            </div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th >idd</th>
      <th >Nombre</th>
      <th>login</th>
      <th>direcion</th>
      <th>Pasword</th>
    </tr>
  </thead>
  <tbody>
      {{ $datos}}
      @foreach($datos as $usuario)
     <tr>
      <td>{{$usuario->id }}</th>
      <td>{{$usuario->nombre }}</td>
      <td>{{$usuario->login }}</td>
      <td>{{$usuario->UsuarioDato->direccion }}</td>
      <td>{{$usuario->password }}</td>
    </tr> 
      @endforeach


  </tbody>
</table>
        </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
