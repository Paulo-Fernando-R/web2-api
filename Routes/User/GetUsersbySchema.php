<?php
header('Access-Control-Allow-Origin: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/User.php';
require_once _BASE . '/DAO/DAOUser.php';


$dao = new DAOUser();
$lista = $dao -> listaTodos(1);
echo json_encode($lista);

/*echo '<pre>';
print_r($lista);
echo '</pre>';*/
