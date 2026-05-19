<?php

require 'vendor/autoload.php';

use App\Models\Usuario;
use App\Services\Saludo;
use App\Models\Producto;

$usuario = new Usuario();
$saludo = new Saludo();
$producto = new Producto();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Laboratorio Autoload</title>

    <style>
    body {
        background: linear-gradient(135deg, #8f2d7a, #bd5498);
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .card {
        background: white;
        color: #333;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        text-align: center;
        width: 400px;
    }

    h1 {
        color: #982a63;
    }

    p {
        font-size: 18px;
    }
    </style>
</head>

<body>

    <div class="card">

        <h1>Laboratorio PSR-4</h1>

        <p>
            <?php echo $usuario->mostrarNombre(); ?>
        </p>

        <p>
            <?php echo $saludo->mensaje(); ?>
        </p>
        <p class="fs-5">
            <?php echo $producto->mostrarProducto(); ?>
        </p>


    </div>

</body>

</html>