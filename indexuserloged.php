<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
    <title>MoviesWebSite</title>
</head>
<body>
    <!--Barra de navegacion bootstrap-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><i class="fas fa-film"></i>   OnlineMovies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="indexuserloged.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mis películas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Cerrar sesión</a>
            </li>
          </ul>
          <span class="navbar-text">
              <p>Bienvenido: <?php echo $_SESSION['usuario'] ?></p>
          </span>
        </div>
      </nav>

      <!--Muestra de las películas-->
      <?php
        include("conexion.php");

        $sentencia = "SELECT nombre, imagen_pelicula, genero, duracion, sinopsis, costo FROM peliculas";

        $resultado = $conexion -> query($sentencia);
        
        while($row = mysqli_fetch_array($resultado)){
      ?>
      <br><br>
      <div class = "movieContainer">
        <table>
        <div class="movieImage">
          <td>
          <?php echo "<img src= 'img/".$row['imagen_pelicula']."' height='300' width='300'/>" ?>
          </td>
        </div>
        <div class = "movieData">
          <td style="margin:auto;">
        <ul>
          <li><p><?php echo "Título: ", $row['nombre'];?><p></li>
          <li><?php echo "Género: ", $row['genero'];?></li> 
          <li><?php echo "Duración: ", $row['duracion']," minutos"; ?></li>
          <li><?php echo "Sinopsis: ", $row['sinopsis'];?></li>
          <li><?php echo "Costo: $", $row['costo']; ?></li>
          <br> 
          <button type="button" class="btn btn-primary btn-lg">Comprar</button>
        </ul>
        </td>
        </div>
        </table>
      </div>
      <?php
        }
      ?> 
    </body>
</html>