<?php

require_once "../config/Database.php";
require_once "../controller/HomeController.php";
require_once '../helper/Utils.php';

$requiredParams = [
    'name', 'password'
];

if (Utils::isTheseParametersAvailable($requiredParams)) {

    $name = $_POST['name'];
    $password = $_POST['password'];

    $id = Utils::generateNumericId(6);

    $db = Database::getInstance()->connect();
    $home = new HomeController($db);


    $result = $home->addUser($id, $name, $password);

    if ($result) {
        $res = [
            'error' => false,
            'code' => 200,
            'message' => 'User added'
        ];
        
    } else {

        $res = [
            'error' => true,
            'code' => 409,
            'message' => 'Could not add user'
        ];

       
    }


    Utils::ArrayToJson($res);
}
