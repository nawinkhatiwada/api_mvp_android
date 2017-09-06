<?php
header('Content-Type: application/json');
$message = "";
include "main.php";

if (isset($_GET['add'])) {
    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];

        $obj = new Mvp_android();
        $res = $obj->add($title, $description);
        if ($res == 1) {
            $message = "Added successfully !!";
        } else {
            $message = 'Sorry!!';
        }
    }
    include "add.php";
}

if (isset($_GET['login'])) {
    $login_data = (array)json_decode(file_get_contents('php://input'), true);

    $response = null;
    $username = $login_data["username"];
    $password = $login_data["password"];

    if ($username == null || $password == null) {
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

    if ($offset == null || $limit == null) {
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