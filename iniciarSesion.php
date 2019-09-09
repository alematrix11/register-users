<?php 

//Empezamos capturando los datos del usuario que ingresa en el formulario de iniciar sesion
$usuarioSesion = $_POST ['nombreUsuario'];
$passSesion = $_POST ['passUsuario'];

echo '<pre>';

    echo 'La informacion sobre el nombre de usuario es: '.var_dump($usuarioSesion);
    echo 'La informacion sobre la contraseña de usuario es: '.var_dump($passSesion);

echo '</pre>';

//Nuevamente iniciamos la conexion con la base de datos
//Luego verificamos si existe el usuario con el cual se va iniciar sesión
include_once '../proyecto-php-mysql/conexion.php';

//Lo que va hacer la sentencia es recorrer en la tabla colores el campo nombre   
$verificacionUsers = 'SELECT * FROM usuarios WHERE nombre = ?';
//Se procede a preparar la sentencia
$verificandoUser = $conex->prepare($verificacionUsers);
//Se procede a ejecutar la sentencia, donde se compara con el nombre de usuario que se ingreso
$verificandoUser -> execute(array($usuarioSesion));
//Se obtiene un resultado luego de la verificacion
//Se le establece un fetch para obtener un verdadero o falso
$verificacionResult = $verificandoUser->fetch();

echo '<pre>';

    echo 'La informacion sobre el inicio de sesion es: '.var_dump($verificacionResult);

echo '</pre>';

//Se realiza la verificacion de usuario correcto
if(!$verificacionResult){
    
    //Si el usuario es falso, se finaliza la sesion y la operacion
    echo 'Su usuario no es valido';
    
    $conex = null;
    
    //Se establece el metodo die para finalizar la operacion
    die();
        
}

//Se verifica que la contraseña ingresada sea vallida
//Primero capturamos la contraseña del formulario que inicia sesión
//Segundo capturamos la contraseña que ya tenemos del usuario en la base de datos

//Usamos un var dump de los que proviene de $verificacionResult con el metodo de fetch
/*echo '<pre>';
    var_dump($verificacionResult['contrasena']);
echo '<pre>';*/

if(!password_verify($passSesion, $verificacionResult['contrasena'])){

    //Si el usuario es falso, se finaliza la sesion y la operacion
    echo 'Su usuario no es valido';
    
    $conex = null;
    
    //Se establece el metodo die para finalizar la operacion
    die();
    
}

//Si es usuario es verdadero continua con el codigo y se realiza la verificacion de la contraseña y luego se actualiza con la sesion iniciada
header('location:sesionIniciada.php');  
    
?>