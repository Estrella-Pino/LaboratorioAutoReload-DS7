<?php

require("vendor/autoload.php");

use App\Models\Producto;
use App\Services\Saludo;

$producto = new Producto();
echo $producto->mostrarProducto();
echo "\n";
$saludo = new Saludo();
echo $saludo->mensaje();
?>