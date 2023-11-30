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
    <h1>Actualizar cobertura</h1>
    <form action="<?= base_url('admin/updateCobertura'); ?>" method="POST"> <!---Se establece la ruta del mètodo del controlador-->
    <?= csrf_field() ?>
    <input type="hidden" name ="id" value="<?= $cobertura->id ?>" /> <!---Se toma el id del usuario que se va a editar su informaciòn-->
    <h1></h1>
        <!---Se estblece el formulario jalando la variable establecida en el controlador para obtener los datos de las coberturas-->
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $cobertura->nombre ?>" placeholder="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?= $cobertura->descripcion ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?= $cobertura->status ?>" required>
            </div>
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="text" id="costo" name="costo" value="<?= $cobertura->costo ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar"> <!-- Este es el botòn para enviar la informaciòn-->
            </div>
        </form>
    </div>
</body>
</html>
