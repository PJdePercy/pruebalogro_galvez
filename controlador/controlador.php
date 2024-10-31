<?php 
require_once("../modelo/modelo.php");
$denuncias = new Denuncias();
$datos = $denuncias->getDenuncias();
require_once("../vista/vista.php");