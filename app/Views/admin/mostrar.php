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
    <h1>Administrar clientes</h1>
    <h1></h1>
    <table>
        <thead>
            <!---Se establecen los campos que contrenda la tabla--->
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Fecha de nacimeinto</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>Municipio</th>
                <th>Estado</th>                
                <th>Ciudad</th>
                <th>CURP</th>
                <th>RFC</th>
                <th>Telefono</th>
                <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            <!---Se coloca un ciclo para jalar los datos de los usuarios-->
        <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <!--Se jala la variable establecida anteriormente la cual contiene los datos de los usuarios--->
                        <td><?=$usuario->nombre ?></td>
                        <td><?=$usuario->apellidoP ?></td>
                        <td><?=$usuario->apellidoM ?></td>
                        <td><?=$usuario->fechaNac ?></td>
                        <td><?=$usuario->calle ?></td>
                        <td><?=$usuario->colonia ?></td>
                        <td><?=$usuario->municipio ?></td>
                        <td><?=$usuario->estado ?></td>
                        <td><?=$usuario->ciudad ?></td>
                        <td><?=$usuario->CURP ?></td>
                        <td><?=$usuario->RFC ?></td>
                        <td><?=$usuario->telefono ?></td>
                        <td>    
                            <a href="<?=base_url('admin/delete/'. $usuario->id);?>">Eliminar</a> <!--Se jala la ruta para eliminar a un cliente por medio de su id-->
                            <a href="<?=base_url('admin/editar/'. $usuario->id);?>">Editar</a> <!--Se jala la ruta para editar un cliente por medio de su id-->
                        </td>
                    </tr>
                    <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
