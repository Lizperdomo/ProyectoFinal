<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cliente</title>
    <style>
        body {
            font-family: "Lucida Sans";
            background-color: #f0f0f0;
            text-align: center;
            padding: 0px;
            font-size: 20px;
        }

        h1 {
            color: #333;
        }

        .form-container {
            width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-weight: bold;
            display: block;
            text-align: center;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc; 
            border-radius: 3px;
        }

        h1 {
            color: #333;
            margin-top: 40px; 
        }

        input[type="submit"] {
            width: 100%; 
            padding: 10px 0; 
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Comprar cobertura</h1>
    <div class="form-container">
    <?php
        // Recupera los parámetros de la URL
        $nombreCobertura = urldecode($_GET['nombre']);
        $montoCobertura = urldecode($_GET['monto']);
    ?>
    <form action="<?= base_url('cliente/insertarCompra'); ?>" method="POST">
                 <?= csrf_field() ?>
            <div class="form-group">
                <label for="numeroTarjeta">Numero de tarjeta:</label>
                <input type="number" id="numeroTarjeta" name="numeroTarjeta" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="number" id="cvv" name="cvv" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombreCobertura); ?>" readonly> <!---Se toma el nombre de la cobertura que se seleccione--->
            </div>
            <div class="form-group">
                <label for="monto">Monto:</label>
                <input type="text" id="monto" name="monto" value="<?= htmlspecialchars($montoCobertura); ?>" readonly> <!---Se toma el monto de la cobertura que se seleccione--->
            </div>
            <?php
            // Establece la zona horaria a 'America/Mexico_City'
                date_default_timezone_set('America/Mexico_City');

            // Obtiene la fecha actual con la zona horaria configurada
                  $fechaActual = date('Y-m-d');
                ?>
            <input type="hidden" name="created_at" value="<?= $fechaActual ?>"> <!---toma la fecha actual--->
            <div class="form-group">
                <input type="submit" value="Comprar">
            </div>
        </form>
    </div>
</body>
</html>
