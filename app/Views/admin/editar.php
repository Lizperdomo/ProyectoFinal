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
    <h1>Actualizar información</h1>
    <form action="<?= base_url('admin/update'); ?>" method="POST"> <!---Se establece la ruta del mètodo del controlador-->
    <?= csrf_field() ?>
    <input type="hidden" name ="id" value="<?= $usuario->id ?>" /> <!---Se toma el id del usuario que se va a editar su informaciòn-->
    <h1></h1>
    <!---Se estblece el formulario jalando la variable establecida en el controlador para obtener los datos del cliente-->
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $usuario->nombre ?>" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="apellidoP">Apellido Paterno:</label>
                <input type="text" id="apellidoP" name="apellidoP" value="<?= $usuario->apellidoP ?>" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="apellidoM">Apellido Materno:</label>
                <input type="text" id="apellidoM" name="apellidoM" value="<?= $usuario->apellidoM ?>" required>
            </div>
            <div class="form-group">
                <label for="fechaNac">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNac" name="fechaNac" value="<?= $usuario->fechaNac ?>" required>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" value="<?= $usuario->ciudad ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?= $usuario->estado ?>" required>
            </div>
            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input type="text" id="municipio" name="municipio" value="<?= $usuario->municipio ?>" required>
            </div>
            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" value="<?= $usuario->calle ?>" required>
            </div>
            <div class="form-group">
                <label for="colonia">Colonia:</label>
                <input type="text" id="colonia" name="colonia" value="<?= $usuario->colonia ?>" required>
            </div>
            <div class="form-group">
                <label for="CURP">CURP:</label>
                <input type="text" id="CURP" name="CURP" value="<?= $usuario->CURP ?>" required>
            </div>
            <div class="form-group">
                <label for="RFC">RFC:</label>
                <input type="text" id="RFC" name="RFC" value="<?= $usuario->RFC ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?= $usuario->telefono ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar"> <!-- Este es el botòn para enviar la informaciòn-->
            </div>
        </form>
    </div>
</body>
</html>
