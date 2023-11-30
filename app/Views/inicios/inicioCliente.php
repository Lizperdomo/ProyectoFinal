<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Simple</title>
    <style>
        body {
            font-family: "Lucida Sans";
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db; 
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .box {
            width: 350px;
            height: 400px;
            margin: 150px; 
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            font-size: 14px;
        }

        .box img {
            max-width: 50%; 
            max-height: 200%; 
            margin-bottom: 30px; 
        }

        .box a {
            color: black; 
            text-decoration: none;
            font-weight: bold;
            font-size: 25px; 
        }
    </style>
</head>
<body>
    <header>
    <img src="<?= base_url('img/logo.png'); ?>" width="200" height="40"> <!--ruta de la imagen del logo--->
    
    </header>

    <div class="container">
        <div class="box"> <!--cuadro que funciona como botòn para redirigir a una vista--->
            <img src="<?= base_url('img/info.png'); ?>"> <!--ruta de la imagen--->
            <a href="<?= base_url('cliente/mostrar'); ?>">Información personal</a> <!--se establece la ruta a la que va enviar la caja de texto--->
        </div>
        <div class="box"> <!--cuadro que funciona como botòn para redirigir a una vista--->
            <img src="<?= base_url('img/seguro.png'); ?>"><!--ruta de la imagen--->
            <a href="<?= base_url('cliente/seguro'); ?>">Seguro de vida</a><!--se establece la ruta a la que va enviar la caja de texto--->
        </div>
        <div class="box"> <!--cuadro que funciona como botòn para redirigir a una vista--->
            <img src="<?= base_url('img/coberturas.png'); ?>"><!--ruta de la imagen--->
            <a href="<?= base_url('cliente/coberturas'); ?>">Coberturas</a><!--se establece la ruta a la que va enviar la caja de texto--->
        </div>
    </div>
</body>
</html>
