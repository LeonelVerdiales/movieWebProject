<?php

session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$usuarioAdmin = "admin";
$passwordAdmin = "admin";

$_SESSION['usuario'] = $usuario;

$server= "localhost";
$user= "root";
$pass= "";
$bd= "tiendapeliculas";

$con=new mysqli($server,$user,$pass,$bd);

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
}

$sql="SELECT * FROM usuario WHERE username='$usuario' AND password='$password'";
$retval=(mysqli_query($con,$sql));

if($usuario == $usuarioAdmin && $password == $passwordAdmin){
    header("Location: indexadminloged.php");
}else if(mysqli_num_rows($retval)>0){
    if(mysqli_num_rows($retval)>0){
        header("Location: indexuserloged.php");
    }else{
        echo "Usuario o contraseña invalida";
    }
}else{
    echo "Usuario o contraseña incorrecta";
}

mysqli_close($con);

?>