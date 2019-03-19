<?php
    $idAEliminar = $_POST['id'];
    $con = mysqli_connect("localhost","root","","tiendapeliculas");

    $sentencia = "DELETE FROM peliculas WHERE id_pelicula = '$idAEliminar'";

    $result = mysqli_query($con,$sentencia);

    if($result){
        header("Location: indexadminloged.php");
    }else{
        echo "No se pudo eliminar";
    }

    mysqli_close($con);

?>