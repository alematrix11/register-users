<?php 

    //Cada vez que utilices sesiones se debe declarar el siguiente metodo
    session_start();

    //Se establece un metodo para cerrar todas la sesiones del sitio web
    //Destruir todas las variables de sesión
    $_SESSION = array();
    
    //Se confirma que se va a cerrar las sesiones con el siguiente metodo
    session_destroy();
    
    //Se estable que luego de cerrar la sesion, se actualiza con la pagina de index
    header('location:registro.php');

?>