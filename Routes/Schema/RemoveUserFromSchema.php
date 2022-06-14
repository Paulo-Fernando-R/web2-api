<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Schema.php';
require_once _BASE . '/DAO/DAOSchema.php';

$post = json_decode(file_get_contents('php://input'));
$idUser = $post -> idUser;
$idSchema = $post -> idSchema;

if( $idUser == '' || $idSchema == '')
{
    echo json_encode(['status' => 'errorInput']);
    return;
}

$dao = new DAOSchema();

$res = $dao->removeUserFromSchema($idUser, $idSchema);

if($res == 1)
{
    echo json_encode(['status' => 'errorRemove']);
}
else if($res == 0)
    echo json_encode(['status' => 'ok']);
else
    echo json_encode(['status' => 'nonExistent']);