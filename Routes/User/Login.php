<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Web2-api/');
require_once _BASE . '/DAO/Conexao.php';
require_once _BASE . '/Modelo/User.php';
require_once _BASE . '/DAO/DAOUser.php';

$post = json_decode(file_get_contents('php://input'));
$username = $post -> username;
$password = $post -> password;

if( $username == '' || $password == '')
{
    echo json_encode(['status' => 'errorInput' ]);
    return;
}

$dao = new DAOUser();
$user = new User();

$user->setUsername($username);
$user->setPassword($password);

$res = $dao->login($user);

if($res == null)
{
    echo json_encode(['status' => 'notFound']);
    return;
}
echo json_encode($res);

