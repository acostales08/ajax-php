<?php

require("../database/config.php");
require("../queries/query.php");

interface Iperson
{
    public function insertData($data);
    public function fetchData();
    public function findData($data);
    public function updateData($data);
    public function deleteData($data);
}

class personController extends Database implements Iperson
{
    public function insertData($data)
    {
        $query = new QueryBuilder();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->php_prepare($query->insertQuery("person/post"))) {
                $this->php_dynamic_handler(":lname", $data["lastName"]);
                $this->php_dynamic_handler(":fname", $data["firstName"]);
                $this->php_dynamic_handler(":mname", $data["middleName"]);
                $this->php_dynamic_handler(":age", $data["age"], 2);
                if ($this->php_execute()) {
                    $response = array(
                        "status" => "success",
                        "message" => "successfully added"
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Something wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }

    public function fetchData()
    {
        $query = new QueryBuilder();
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            if ($this->php_prepare($query->fetchDataQuery("person/get"))) {
                $this->php_execute();
                if ($this->php_rowCheck()) {
                    $data = $this->php_fetchAll();
                    $response = array(
                        "status" => "success",
                        "data" => $data
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Somethins wrong while fetching"
                    );
                    echo json_encode($response);
                }
            }
        }
    }

    public function findData($data)
    {
        $query = new QueryBuilder();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($this->php_prepare($query->findQuery("person/find"))) {
                $this->php_dynamic_handler(":id", $data['id'], 2);
                $this->php_execute();
                if ($this->php_rowCheck()) {
                    $data = $this->php_fetch();
                    $response = array(
                        "status" => "success",
                        "data" => $data
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Somethind Went Wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }

    public function updateData($data)
    {
        $query = new QueryBuilder();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($this->php_prepare($query->updateQuery("person/update"))) {
                $this->php_dynamic_handler(":id", $data['id'], 2);
                $this->php_dynamic_handler(":lastName", $data['lastName']);
                $this->php_dynamic_handler(":firstName", $data['firstName']);
                $this->php_dynamic_handler(":middleName", $data['middleName']);
                $this->php_dynamic_handler(":age", $data['age'], 2);
                if ($this->php_execute()) {
                    $response = array(
                        "status" => "success",
                        "message" => "updated successfully"
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Somethins Went Wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }

    public function deleteData($data)
    {
        $query = new QueryBuilder();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($this->php_prepare($query->deleteQuery('person/delete'))) {
                $this->php_dynamic_handler(':id', $data['id'], 2);
                if ($this->php_execute()) {
                    $response = array(
                        "status" => "success",
                        "message" => "deleted successfully"
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "something went wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }
}
