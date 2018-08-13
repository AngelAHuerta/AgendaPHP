<?php  

ob_start();

# Aqui van los controladores necesarios
require_once "controllers/indexController.php";
require_once "controllers/enlacesPaginaController.php";
require_once "controllers/contactosController.php";


$index = new IndexController();
$index->mostrarIndex();



ob_end_flush();


?>