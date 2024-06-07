<?php

class QueryBuilder
{
    public function insertQuery($condition)
    {
        if ($condition == "person/post") {
            $sql = "INSERT INTO employeenames(`lastName`, `firstName`, `middleName`, `age`)
            values(:lname, :fname, :mname, :age)";
            return $sql;
        }
    }

    public function fetchDataQuery($condition)
    {
        if ($condition === "person/get") {
            $sql = "SELECT * FROM employeenames";
            return $sql;
        }
    }

    public function findQuery($condition)
    {
        if ($condition === "person/find") {
            $query = "SELECT id, lastName, firstName, middleName, age FROM employeenames WHERE id= :id";
            return $query;
        }
    }

    public function updateQuery($condition)
    {
        if ($condition === "person/update") {
            $query = "UPDATE employeenames SET lastName= :lastName, firstName= :firstName, middleName= :middleName, age= :age WHERE id= :id";
            return $query;
        }
    }

    public function deleteQuery($condition)
    {
        if ($condition === "person/delete") {
            $query = "DELETE FROM employeenames WHERE id= :id";
            return $query;
        }
    }
}
