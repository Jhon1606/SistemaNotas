<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <section>  
        <h1 style="text-align: center">Inicio de sesión</h1>
        <div class="parte">
            <form action="proyecto/Usuarios/Controlador/login.php" method="POST">
                <label for="Usuario" class="labels">Usuario</label>
                <input type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario" class="entrada">
                <label for="Contrasena" class="labels">Contraseña</label>
                <input type="password" name="Contrasena" required="" autocomplete="off" placeholder="Contraseña" class="entrada">
                <input type="submit" value="Iniciar Sesión" class="boton2">
            </form>
        </div>
    </section>
</body>
</html>