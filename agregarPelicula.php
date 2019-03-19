<?php

if(isset($_POST['submitButton'])){
    $target = "img/".basename($_FILES['imagen']['name']);
    $conexion=mysqli_connect("localhost", "root", "", "tiendapeliculas");

    $image = $_FILES['imagen']['name'];
    $pelicula_id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $sinopsis = $_POST['sinopsis'];
    $duracion = $_POST['duracion'];
    $existencia = $_POST['existencia'];
    $costo = $_POST['costo'];

    $consulta = ("INSERT INTO peliculas (id_pelicula, nombre, imagen_pelicula, genero, sinopsis, duracion, existencia, costo) 
    VALUES('$pelicula_id', '$titulo', '$image', '$genero', '$sinopsis', '$duracion', '$existencia', '$costo');");
    
    $resultado=mysqli_query($conexion, $consulta);

    if($resultado){
        header("Location: indexadminloged.php");
      }
      else{
        echo "No se pudo insertar";
      }
      
      mysqli_close($conexion);
}
?>