<?php

require_once "../config/Database.php";
require_once "../controller/HomeController.php";
require_once '../helper/Utils.php';

$db = Database::getInstance()->connect();
$home = new HomeController($db);

$result = $home->getAllUsers();

$res = [ # Response error

];

if(empty($result))
{
    $res = [
            'error' => true,
            'code' => 409 ,
            'message' => 'No users found!'
    ];
}else{
    $res = [
        'error' => false,
            'code' => 200 ,
            'users' => $result
    ];
}
Utils::ArrayToJson($res);