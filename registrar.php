<?php

    /*//////////  CONECCION A BBDD ////////////*/

     $conexion = mysqli_connect("localhost", "root", "", "fm_inventario");
     if(!$conexion){
         echo "Error de conexion";
     }else{
         echo "Buena conexion";
     }

     /*//////// ASIGNACION VALORES INPUT A VARIABLES ///////////*/
     

    $nombre = $_POST["nombre"];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pasword = $_POST['clave'];

/*////////////// REGISTRO INFORMACION USUARIO ////////////*/

    $insertar = "INSERT INTO fm_registro_usuario (nombre, apellido, telefono, correo, usuario, clave) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$usuario', '$pasword')";

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM fm_registro_usuario WHERE usuario = '$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '<script>
               alert("el usuario ya se encuentra registrado");
                window.history.go(-1);
               </script>';        
        exit;
    }
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM fm_registro_usuario WHERE correo = '$correo'");
        if(mysqli_num_rows($verificar_correo) > 0){
            echo '<script> 
                    alert("El correo ya esta registrado");
                    window.history.go(-1);
                 </script>';        
                 exit;                
        }

    $enviar = mysqli_query($conexion, $insertar);
        if(!enviar){
            echo "error al registrarse";
        }else{
            echo '<script> 
                alert("el registro ha sido exitoso");
               </script>';
        }


    mysqli_close($conexion);

        






?>



