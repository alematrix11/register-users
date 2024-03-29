<!DOCTYPE html>

<html lang="es">

<head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registro de usuarios</title>
      
</head>
    
<body>
    
    <h1 class="mb-4">Registro de usuarios</h1>
    
    <form action="usuario.php" method="POST">
    
        <label for="nombre"></label>
        <input class="ml-3" type="text" name="nombreUsuario" id="nombre" size="34" placeholder="Ingresa tu nombre">
        <br><br>
        <label for="pass"></label>
        <input class="ml-3" type="password" name="passUsuario" id="pass" size="34" placeholder="Ingresa tu contraseña">
        <br><br>
        <label for="pass2"></label>
        <input class="ml-3" type="password" name="pass2Usuario" id="pass2" size="34" placeholder="Nuevamente tu contraseña">
        <br><br>
        <button class="ml-4" type="submit">Guardar</button>
        
    </form>
    
    <br><br>
    
    <h1 class="mb-4">Iniciar sesión</h1>
    
    <form action="iniciarSesion.php" method="POST">
    
        <label for="nombre"></label>
        <input class="ml-3" type="text" name="nombreUsuario" id="nombre" size="34" placeholder="Ingresa tu nombre">
        <br><br>
        <label for="pass"></label>
        <input class="ml-3" type="password" name="passUsuario" id="pass" size="34" placeholder="Ingresa tu contraseña">
        <br><br>
        <button class="ml-4" type="submit">Iniciar</button>
        
    </form>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
    
</html>