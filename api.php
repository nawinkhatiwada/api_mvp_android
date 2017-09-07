<?php
header('Content-Type: application/json');
include "main.php";

if (isset($_GET['login'])) {
    $login_data = (array)json_decode(file_get_contents('php://input'), true);
    $response = null;
    $username = $login_data["username"];
    $password = $login_data["password"];

    if (is_null($username) || is_null($password)) {
        $response = array(
            'statusCode' => -1,
            'statusMessage' => "Unknown Error Occurred !!!",
            'response' => null
        );
        echo json_encode($response);
        return;
    }

    $obj = new Mvp_android();
    $res = $obj->login($login_data);
    echo $res;
}

if (isset($_GET['recentTags'])) {
    $data = (array)json_decode(file_get_contents('php://input'), true);
    $response = null;
    $offset = $data["offset"];
    $limit = $data["limit"];

    if (!is_integer($offset) || !is_integer($limit) ||
        $offset < 0 || $limit < 0) {

        $response = array(
            'statusCode' => -1,
            'statusMessage' => "Unknown Error Occurred !!!",
            'response' => null
        );
        echo json_encode($response);
        return;
    }

    $obj = new Mvp_android();
    $res = $obj->recentTags($data);
    echo $res;
}