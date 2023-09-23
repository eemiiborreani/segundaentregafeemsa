<?php
include('server.php');
$username = $_POST['username'];
$email = $_POST['email'];
$contrasena = $_POST['password_1'];
$contrasena2 = $_POST['password_2'];

if($contrasena == $contrasena2){
    if($contrasena == "camionero333"){
    $query = "INSERT INTO camionero(username, email, password) 
    VALUES('$username', '$email', '$contrasena')";
}else{
    echo'
    <script>
        alert("contraseña no habilitada");
        window.location = "loginRegisterCamioneroIndex.php";
    </script>
    ';
}}else{
    echo'
    <script>
        alert("no es la misma contraseña");
        window.location = "loginRegisterCamioneroIndex.php";
    </script>
    ';
    exit();
}




$verificar_correo = mysqli_query($conexion, "SELECT * FROM camionero WHERE email = '$email'");

if(mysqli_num_rows($verificar_correo) > 0){
    echo'
    <script>
        alert("Este correo ya esta registrado, prueba con otro diferente");
        window.location = "loginRegisterCamioneroIndex.php";
    </script>
    ';
    exit();
}
$verificar_usu = mysqli_query($conexion, "SELECT * FROM camionero WHERE username = '$username'");

if(mysqli_num_rows($verificar_usu) > 0){
    echo'
    <script>
        alert("Este usuario ya esta registrado, prueba con otro diferente");
        window.location = "loginRegisterCamioneroIndex.php";
    </script>
    ';
    exit();
}
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo'
    <script>
        alert("Usuario almacenado exitosamente");
        window.location = "loginRegisterCamioneroIndex.php";
    </script>
    ';
}else{
    echo'
    <script>
    alert("Intentalo denuevo, usuario    no almacenado");
    window.location = "loginRegisterCamioneroIndex.php";
    </script>
    ';
}
?>