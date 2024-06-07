<?php

require("../controllers/personController.php");

if (isset($_POST['isTrue']) == true) {
    $data = [
        "lastName" => $_POST['lastName'],
        "firstName" => $_POST['firstName'],
        "middleName" => $_POST['middleName'],
        "age" => $_POST['age']
    ];

    $callback = new personController();
    $callback->insertData($data);
}

if (isset($_GET['isFetch']) === true) {
    $fetchCallback = new personController();
    $fetchCallback->fetchData();
}

if (isset($_POST['isFind']) === true) {
    $data = [
        "id" => $_POST['id']
    ];

    $findCallback = new personController();
    $findCallback->findData($data);
}

if (isset($_POST['toUpdate']) === true) {
    $data = [
        "id" => $_POST['id'],
        "lastName" => $_POST['lastName'],
        "firstName" => $_POST['firstName'],
        "middleName" => $_POST['middleName'],
        "age" => $_POST['age']
    ];

    $updateCallback = new personController();
    $updateCallback->updateData($data);
}

if (isset($_POST['toDelete']) === true) {
    $data = [
        "id" => $_POST['id']
    ];

    $deleteCallback = new personController();
    $deleteCallback->deleteData($data);
}
