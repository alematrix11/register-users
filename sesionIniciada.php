<?php
    
    //En todos los archivos que se utilizan sesiones debemos establecer el metodo session_start
    session_start();
    
    echo 'Usted ha iniciada sesion con su usuario';
    
    //Establecemos una accion para cada condicion de la sesion
    
    //Si recibimos datos verificados de la conexion se muestra un mensaje de bienvenido
    if(isset($_SESSION['admin'])){
        
        //Se muestra el mensaje de bienvenido
        echo '<br>Bienvenido a nuestro sitio '.$_SESSION['admin'].'!';
        
        echo '<br><a href="cerrarSesion.php">Finalizar sesion</a>';
    }
    
    else{
        
        //Si la sesion no es valida se actualiza con la pagina del index
        header('location:registro.php');
        
    }

?>