<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1>Agregar cobertura</h1>
    <h1></h1>
    <div class="form-container">
        <form action="<?= base_url('admin/insertCobertura'); ?>" method="POST"> <!--Se coloca la ruta del mètodo del controlador-->
         
                <!--Como tal aqui se establece el formulario para agregar a una cobertura tomando los campos que almacena la base de datos -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="number" id="costo" name="costo" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar"> <!-- Este es el botòn para enviar la informaciòn-->
            </div>
        </form>
    </div>
</body>
</html>
