<?php
header('Access-Control-Allow-Origin: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Supplier.php';
require_once _BASE . '/DAO/DAOSupplier.php';


$dao = new DAOSupplier();
$lista = $dao -> listaTodos();
echo json_encode($lista);