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

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .personal-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
            margin: 10px;
            width: 300px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            font-size: 20px;
        }

        p {
            color: #666;
            margin: 20px;
        }

        .comprar-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
        }

        .comprar-link {
            text-decoration: none; 
            color: inherit; 
        }
    </style>
</head>
<body>
    <h1>Coberturas</h1>
    <h1></h1>
    <div class="container">
        <!---Se abre un ciclo para que muestre la informaciòn de las coberturas-->
        <?php foreach ($coberturas as $cobertura): ?>
            <!--Se establece un cuadro para que en el se plasme la informaciòn de las coberturas-->
        <div class="personal-card">
            <!---Se toman los datos de las coberturas por medio de la variable establecida anteriormente--->
            <h2><?= $cobertura->nombre ?></h2>
            <p>Descripción: <?= $cobertura->descripcion ?> </p>
            <p>Total a pagar mensualmente: $<?= $cobertura->costo ?></p>
            <!---Se tiene un botòn que redirecciona al formulario de comprar en caso de que el cliente desee comprar un cobertura-->
            <a href="<?= base_url('index.php/cliente/comprar'); ?>" class="comprar-link"> 
                <button class="comprar-button">Comprar -></button>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
