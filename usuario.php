<?php 

    //Archivo que recibe los datos del usuario y usa el hash para las contraseñas
    echo password_hash("crista", PASSWORD_DEFAULT)."\n";

    //Se establece una variable que recibe los datos de nombre del formulario
    $nombreUsuario = $_POST['nombreUsuario'];

    //Se establece una variable que recibe los datos de la contraseña del formulario
    $passUsuario = $_POST['passUsuario'];

    //Se establece una variable que recibe los datos de la verificacion de la contraseña del formulario
    $pass2Usuario = $_POST['pass2Usuario'];

    /*echo '<pre>';
        var_dump($nombreUsuario);
        var_dump($passUsuario);
        var_dump($pass2Usuario);
    echo '<pre>';*/

    //Se procede a verificar que el usuario escribio correctamente las contraseña y la verificacion de la contraseña

    $passUsuario = password_hash($passUsuario, PASSWORD_DEFAULT);

    //Bucle para verificar que la contraseñas ingresadas coinciden
    if(password_verify($pass2Usuario, $passUsuario)){
        echo 'Las contraseña ingresadas coinciden';
    }
    else{
        echo 'Las contraseña ingresadas no coinciden';
    }