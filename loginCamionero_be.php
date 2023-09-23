<?php
session_start();

include 'server.php';

$username = $_POST['username'];
$contrasena = $_POST['contrasena'];

$validar_login = mysqli_query($conexion, "SELECT * FROM camionero 
WHERE username='$username' and password='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuarioCamionero'] = $username;
    header("location: IndexCamionero.php");
    exit;
}else{
    echo'
    <script>
    window.location = "loginRegisterCamioneroIndex.php";
    alert("Camionero no existe, por favor verifique los datos introducidos");
    </script>
    ';
    exit;
}
?>