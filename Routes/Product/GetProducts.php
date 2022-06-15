<?php
header('Access-Control-Allow-Origin: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Product.php';
require_once _BASE . '/DAO/DAOProduct.php';


$dao = new DAOProduct();
$lista = $dao -> listaTodos();
echo json_encode($lista);