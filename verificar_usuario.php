<?php
        $usuariov = $_POST['usuariov'];
        $clavev = $_POST['clavev'];

        $conexion = mysqli_connect("localhost", "root", "", "fm_inventario");

$consulta = "SELECT * FROM fm_registro_usuario WHERE usuario = '$usuariov' and clave = '$clavev'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
        if($filas > 0){
            header("location:index.html");
        }else{
            echo "Error en la autenticacion";
        }
        mysqli_free_result($resultado);
        mysqli_close($conexion);

