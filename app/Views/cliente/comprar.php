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
    <h1></h1>
    <div class="form-container">
    <form action="<?= base_url('cliente/insertarCompra'); ?>" method="POST"> <!--Ruta del mètodo del controlador-->
    <!---Se establece un formulario con los campos que se almacenan en la base para realizar la compra-->
            <div class="form-group">
                <label for="numeroTarjeta">Numero de tarjeta:</label>
                <input type="number" id="numeroTarjeta" name="numeroTarjeta" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="number" id="cvv" name="cvv" required>
            </div>
            <div class="form-group">
                <label for="monto">Monto:</label>
                <input type="text" id="monto" name="monto" required>
            </div>
            <div class="form-group">
                <label for="cobertura">Cobertura:</label>
                <input type="text" id="cobertura" name="cobertura" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Comprar"> <!---Este es el botòn para comprar--->
            </div>
        </form>
    </div>
</body>
</html>
