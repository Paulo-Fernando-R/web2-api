<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/User.php';
require_once _BASE . '/DAO/DAOUser.php';

$post = json_decode(file_get_contents('php://input'));
$name = $post -> name;
$username = $post -> username;
$password = $post -> password;

if($name == '' || $username == '' || $password == '')
{
    echo json_encode(['status' => 'errorInput' ]);
    return;
}

$dao = new DAOUser();
$user = new User();

$user->setName($name);
$user->setUsername($username);
$user->setPassword($password);

$res = $dao->inclui($user);
if($res == 1)
{
    echo json_encode(['status' => 'errorAdd']);
    //return;
}
else if($res == 0)
    echo json_encode(['status' => 'ok']);
else
    echo json_encode(['status' => 'preexistent']);


