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
    <h1>Buscar cobertura</h1>
    <div class="search-container">
        <form method="GET" action="<?= base_url('admin/buscarCobertura'); ?>"> <!---Se establece la ruta del mètodo del controlador-->
                <!--Se establecen los campos por los cuales se realizarà la bùsqueda-->
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <label for="status">Status:</label>
            <input type="text" name="status">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <!--Se inicia una condiciòn para realizar la bùsqueda-->
    <?php if (isset($coberturas) && !empty($coberturas)) : ?>
        <table>
            <thead>
                <tr>
                    <!---Se establecen los campos que contendrà la tabla a mostrar-->
                    <th>Nombre</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!--Se inicia un ciclo para obtener los datos del modelo-->
                <?php foreach ($coberturas as $cobertura) : ?>
                    <tr>
                        <!---Se toma la variable declarada para obtener los datos almacenados en la base--->
                        <td><?= $cobertura->nombre ?></td>
                        <td><?= $cobertura->status ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No se encontraron resultados.</p> <!---En caso de no encontrarse datos colocados en la bùsqueda mostrarà este mensaje-->
    <?php endif ?>
</body>
</html>
