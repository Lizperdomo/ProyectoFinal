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

    </style>
</head>
<body>
    <h1>Administrar coberturas</h1>
    <h1></h1>
    <table>
        <thead>
            <!---Se establecen los campos que contrenda la tabla--->
                <th>Nombre</th>
                <th>Descripción </th>
                <th>Status</th>
                <th>Costo</th>
                <th colspan="2">Acciones</th>
        </thead>
        <tbody>
        <!---Se coloca un ciclo para jalar los datos de las coberturas-->
        <?php foreach($coberturas as $cobertura): ?>
                    <tr>
                        <!--Se jala la variable establecida anteriormente la cual contiene los datos de las coberturas--->
                        <td><?=$cobertura->nombre ?></td>
                        <td><?=$cobertura->descripcion ?></td>
                        <td><?=$cobertura->status ?></td>
                        <td><?=$cobertura->costo ?></td>
                        <td>    
                            <a href="<?=base_url('admin/deleteCobertura/'. $cobertura->id);?>">Eliminar</a> <!--Se jala la ruta para eliminar una cobertura por medio de su id-->
                            <a href="<?=base_url('admin/editarCobertura/'. $cobertura->id);?>">Editar</a> <!--Se jala la ruta para editar una cobertura por medio de su id-->
                        </td>
                    </tr>
                    <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
