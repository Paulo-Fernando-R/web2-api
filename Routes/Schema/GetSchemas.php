<?php
header('Access-Control-Allow-Origin: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Schema.php';
require_once _BASE . '/DAO/DAOSchema.php';


$dao = new DAOSchema();
$lista = $dao -> listaTodos();
echo json_encode($lista);

/*echo '<pre>';
print_r($lista);
echo '</pre>';*/
