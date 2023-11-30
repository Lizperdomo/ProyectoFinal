<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            margin: 50;
            padding: 50;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #3498db; /* Color de fondo azul */
        }
        
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background-color: #fff;
            padding: 100px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            text-align: center; /* Centra el contenido */
        }

        .login-box h2 {
            text-align: center;
            color: #333;
        }

        .login-box form {
            text-align: center;
        }

        .login-box img {
            max-width: 200px; /* Cambia el valor para ajustar el tamaño de la imagen */
            margin-bottom: 20px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 15px 0;
            border: 3px solid #ccc;
            border-radius: 5px;
        }

        .login-box input[type="submit"] {
            width: 80%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="login-box"> 
            <img src="<?= base_url('img/logo.png'); ?>" alt="Logo"/>
            <h2>Iniciar Sesión</h2>
            <form action="<?= base_url('usuario/login'); ?>" method="post">
                <input type="text" name="nombreUsuario" placeholder="Usuario" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </form> 
        </div>
    </div>
</body>
</html>
