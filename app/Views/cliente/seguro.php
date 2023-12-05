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
    <h1>Información de seguro de vida</h1>
    <h1></h1>
    <table>
    <thead>
        <tr>
            <th>Cobertura</th>
            <th>Monto</th>
            <th>Fecha de Activación</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ventas as $venta): ?>
        <tr>
            <td><?= $venta->nombre_cobertura ?></td>
            <td>$<?= number_format($venta->monto, 2) ?></td>
            <td><?= $venta->created_at ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
</body>
</html>
