<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/User.php';
require_once _BASE . '/DAO/DAOUser.php';

$post = file_get_contents('php://input');
$name = filter_input(INPUT_POST, 'name');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if($name == '' || $username == '' || $password == '')
{
    echo json_encode(['status' => $post ]);//errorInput
    return;
}

$dao = new DAOUser();
$user = new User();

$user->setName($name);
$user->setUsername($username);
$user->setPassword($password);

if(!$dao->inclui($user))
{
    echo json_encode(['status' => 'errorAdd']);
    return;
}
echo json_encode(['status' => 'ok']);


