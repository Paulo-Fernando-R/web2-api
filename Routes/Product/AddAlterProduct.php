<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/Product.php';
require_once _BASE . '/DAO/DAOProduct.php';

$product = new Product();

$post = json_decode(file_get_contents('php://input'));
$product->setName($post -> name);
$product->setValue($post -> value);
$product->setId($post -> id);

if($product->getName() == '' || $product->getValue() == '')
{
    echo json_encode(['status' => 'errorInput']);
    return;
}

if(!empty($product->getId()) && $product->getId() != null && $product->getId() != 'null')
{
    $dao = new DAOProduct();
    $res = $dao->updateProduct($product);
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
    $dao = new DAOProduct();
    $res = $dao->addProduct($product);
    if($res == 1)
    {
        echo json_encode(['status' => 'errorAdd']);
    }
    else if($res == 0)
        echo json_encode(['status' => 'ok']);
    else
        echo json_encode(['status' => 'exception']);
}