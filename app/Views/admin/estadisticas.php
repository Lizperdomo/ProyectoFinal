<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Barras</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            margin-top: 20px;
            text-align: center;
        }
    
    </style>
</head>
<body>
    <h1>Coberturas</h1>
    
<canvas id="graficaBarras"></canvas>

    <script>
        var ctx = document.getElementById('graficaBarras').getContext('2d');

        var data = {
            labels: [],
            datasets: [{
                label: 'Numero de coberturas vendidas',
                data: [], // Se actualizará con los datos de la base de datos
                backgroundColor: 'rgba(24, 151, 220)',
                borderColor: 'rgba(35, 69, 234)',
                borderWidth: 1 
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true 
                }
            }
        };

        <?php
        foreach ($coberturas as $cobertura) { //toma los datos de la tabla de coberturas
            echo "data.labels.push('" . $cobertura->nombre . "');\n"; //solo muestra todos los nombre de las coberturas para la gràfica 
        }
        ?>
        <?php
        foreach ($ventas as $venta) {//toma los datos de la tabla de las ventas
            echo "data.datasets[0].data.push(" . $venta->cobertura . ");\n"; //solo toma la cantidad de coberturas vendidas
        }
        ?>

        var grafica = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>