<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Supplier.php';
require_once _BASE . '/DAO/DAOSupplier.php';

$supplier = new Supplier();

$post = json_decode(file_get_contents('php://input'));
$supplier->setName($post -> name);
$supplier->setAddress($post -> address);
$supplier->setPhone($post -> phone);
$supplier->setId($post -> id);
if($supplier->getName() == '' || $supplier->getAddress() == '' || $supplier->getPhone() == '')
{
    echo json_encode(['status' => 'errorInput']);
    return;
}

if(!empty($supplier->getId()) && $supplier->getId() != null && $supplier->getId() != 'null')
{
    $dao = new DAOSupplier();
    $res = $dao->updateSuplier($supplier);
    if($res == 1)
    {
        echo json_encode(['status' => 'errorUpdate']);
    }
    else if($res == 0)
        echo json_encode(['status' => 'okUpdate']);
    else
        echo json_encode(['status' => 'exception']);
}
else
{
    $dao = new DAOSupplier();
    $res = $dao->addSuplier($supplier);
    if($res == 1)
    {
        echo json_encode(['status' => 'errorAdd']);
    }
    else if($res == 0)
        echo json_encode(['status' => 'ok']);
    else
        echo json_encode(['status' => 'exception']);
}