<?php 

    //Se realiza la llamada a la base datos en primer lugar, para luego poder comprobar si el usuario nuevo no coincide con un usuario agregado
    include_once '../proyecto-php-mysql/conexion.php';

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

    
    //Se agrega una sentencia para verificar que el usuario que se desea agregar no este ya almacenado en la base de datos
    //Lo que va hacer la sentencia es recorrer en la tabla colores el campo nombre
    $verificacionUsers = 'SELECT * FROM usuarios WHERE nombre = ?';
    //Se procede a preparar la sentencia
    $verificandoUser = $conex->prepare($verificacionUsers);
    //Se procede a ejecutar la sentencia, donde se compara con el nombre de usuario que se ingreso
    $verificandoUser -> execute(array($nombreUsuario));
    //Se obtiene un resultado luego de la verificacion
    //Se le establece un fetch para obtener un verdadero o falso
    $verificacionResult = $verificandoUser->fetch();
    
    //Establecemos un condicional para dar acciones diferentes segun sea verdadero o falso
    if ($verificacionResult){
        
        echo '<br> El resultado es verdadero, se debe ingresar otro nombre de usuario';
        
        //Se dirige a una pagina que espesifica un mensaje para que el usuario realize el registro nuevamente
        header('location: usuarioNoValido.php');
        
        //Se establece el metodo die para finalizar la operacion
        die();
        
    }

    //var_dump($verificacionResult);
    
        
    //Se procede a verificar que el usuario escribio correctamente las contraseña y la verificacion de la contraseña
    $passUsuario = password_hash($passUsuario, PASSWORD_DEFAULT);

    //Bucle para verificar que la contraseñas ingresadas coinciden
    if(password_verify($pass2Usuario, $passUsuario)){
        echo '<br> Las contraseña ingresadas coinciden';
    
        //Se establece una sentencia para agregar datos a la variable sobre la tabla
        //Se debe espicificar nombre de la tabla de la base de datos y los nombres de los campos de la tabla, y luego los datos que se envian con PHP
        $agregaUsers = 'INSERT INTO usuarios (nombre, contrasena) VALUES (?, ?)';

        //Se debe preparar la consulta, se llama a la conexion de la base de datos y se le pasa la variable SQL
        $agregandoUsers = $conex->prepare($agregaUsers);
            
            //Importante realizar una vericacion
            //Podemos usar un if para verificar que se agrego correctamente
            if($agregandoUsers->execute(array($nombreUsuario, $passUsuario))){
                echo '<br> El usuario ha sido agregado con exito';
            }else{
                echo '<br> El usuario no se logro agregar';
            }
        
        //Una vez preparada la consulta, procedemos a ejecutarla, estableciendo los datos que se guardaron de los nuevos usuarios que se registran
        //La sentencia se envia para la vericacion y no hace falta agragarla nuevamente
        //$agregandoUsers->execute(array($nombreUsuario, $passUsuario));
        
        //Para finalizar siempre se cierra conexion
        $agregandoUsers = null;
        $conex = null;
        
        //Actualizamos a la pagina principal
        header('location: usuarioValido.php');
        
    }

    else{
        echo '<br> Las contraseña ingresadas no coinciden';
    }
