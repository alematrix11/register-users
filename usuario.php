<?php 

    //Archivo que recibe los datos del usuario y usa el hash para las contraseñas
    echo password_hash("crista", PASSWORD_DEFAULT)."\n";

    //Se establece una variable que recibe los datos de nombre del formulario
    $nombreUsuario = $_POST['nombreUsuario'];

    //Se establece una variable que recibe los datos de la contraseña del formulario
    $passUsuario = $_POST['passUsuario'];

    //Se establece una variable que recibe los datos de la verificacion de la contraseña del formulario
    $pass2Usuario = $_POST['pass2Usuario'];

//    echo '<pre>';
//        var_dump($nombreUsuario);
//        var_dump($passUsuario);
//        var_dump($pass2Usuario);
//    echo '<pre>';

    //Se procede a verificar que el usuario escribio correctamente las contraseña y la verificacion de la contraseña
    $passUsuario = password_hash($passUsuario, PASSWORD_DEFAULT);

    //Bucle para verificar que la contraseñas ingresadas coinciden
    if(password_verify($pass2Usuario, $passUsuario)){
        echo '<br> Las contraseña ingresadas coinciden';
    
    //Una vez que la verificacion de contraseñas resulto correcta se llama a la base de datos
    include_once '../proyecto-php-mysql/conexion.php';
    
        //Se establece una sentencia para agregar datos a la variable sobre la tabla
        //Se debe espicificar nombre de la tabla de la base de datos y los nombres de los campos de la tabla, y luego los datos que se envian con PHP
        $agregaUsers = 'INSERT INTO usuarios (nombre, contrasena) VALUES (?, ?)';

        //Se debe preparar la consulta, se llama a la conexion de la base de datos y se le pasa la variable SQL
        $agregandoUsers = $conex->prepare($agregaUsers);
            
            //Importante realizar una vericacion
            //Podemos usar un if para verificar que se agrego correctamente
            if($agregandoUsers->execute(array($nombreUsuario, $passUsuario))){
                echo 'El usuario ha sido agregado con exito';
            }else{
                echo 'El usuario no se logro agregar';
            }
        
        //Una vez preparada la consulta, procedemos a ejecutarla, estableciendo los datos que se guardaron de los nuevos usuarios que se registran
        //La sentencia se envia para la vericacion y no hace falta agragarla nuevamente
        //$agregandoUsers->execute(array($nombreUsuario, $passUsuario));
        
        //Para finalizar siempre se cierra conexion
        $agregandoUsers = null;
        $conex = null;
        
        //Actualizamos a la pagina principal
        header('location: registro.php');
        
    }

    else{
        echo '<br> Las contraseña ingresadas no coinciden';
    }
