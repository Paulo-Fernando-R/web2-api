<?php
header('Access-Control-Allow-Origin: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/User.php';
require_once _BASE . '/DAO/DAOUser.php';

$id = filter_input(INPUT_GET, 'id');

if($id != '' && is_numeric($id))
{
    $dao = new DAOUser();
    $lista = $dao -> listaTodos($id);
    echo json_encode($lista);
    return;
}

echo json_encode(['status' => 'error']);




/*echo '<pre>';
print_r($lista);
echo '</pre>';*/
