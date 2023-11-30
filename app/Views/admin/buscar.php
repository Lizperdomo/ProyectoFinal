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
            margin-top: 40px; 
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .search-container {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <h1>Buscar clientes</h1>
    <div class="search-container">
        <form method="GET" action="<?= base_url('admin/buscar/'); ?>"> <!---Se establece la ruta del mètodo del controlador-->
        <!--Se establecen los campos por los cuales se realizarà la bùsqueda-->
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <label for="apellidoM">Apellido Materno:</label>
            <input type="text" name="apellidoM">
            <input type="submit" value="Buscar">
        </form>
    </div>

    <!--Se inicia una condiciòn para realizar la bùsqueda-->
    <?php if (isset($usuarios) && !empty($usuarios)) : ?>
    <table>
        <thead>
            <tr>
                <!---Se establecen los campos que contendrà la tabla a mostrar-->
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Fecha de nacimiento</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Municipio</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>CURP</th>
                <th>RFC</th>
                <th>Teléfono</th>                
            </tr>
        </thead>
        <tbody>
            <!--Se inicia un ciclo para obtener los datos del modelo-->
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <!---Se toma la variable declarada para obtener los datos almacenados en la base--->
                    <td><?= $usuario->nombre ?></td>
                    <td><?= $usuario->apellidoP ?></td>
                    <td><?= $usuario->apellidoM ?></td>
                    <td><?= $usuario->fechaNac ?></td>
                    <td><?= $usuario->ciudad ?></td>
                    <td><?= $usuario->estado ?></td>
                    <td><?= $usuario->municipio ?></td>
                    <td><?= $usuario->calle ?></td>
                    <td><?= $usuario->colonia ?></td>
                    <td><?= $usuario->CURP ?></td>
                    <td><?= $usuario->RFC ?></td>
                    <td><?= $usuario->telefono ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No se encontraron resultados.</p> <!---En caso de no encontrarse datos colocados en la bùsqueda mostrarà este mensaje-->
<?php endif ?>
</body>
</html>
