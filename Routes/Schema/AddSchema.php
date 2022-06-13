<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Schema.php';
require_once _BASE . '/DAO/DAOSchema.php';

$schema = new Schema();

$post = json_decode(file_get_contents('php://input'));
$schema->setName($post -> name);
$schema->setDescription($post -> description);
$schema->setMinvalue($post -> minValue);
$schema->setIduser($post -> idUser);

if($schema->getName() == '' || $schema->getDescription() == '' || $schema->getMinvalue() == '' || $schema->getIduser() == '')
{
    echo json_encode(['status' => 'errorInput']);
    return;
}

$dao = new DAOSchema();

$res = $dao->addSchema($schema);

if($res == 1)
{
    echo json_encode(['status' => 'errorAdd']);
}
else if($res == 0)
    echo json_encode(['status' => 'ok']);
else
    echo json_encode(['status' => 'exception']);