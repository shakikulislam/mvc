<?php

class Database extends PDO
{
    public function __construct()
    {
        $dsn = 'mysql:dbname=db_mvc; host=localhost';
        $user = 'root';
        $pass = '';

        parent::__construct($dsn, $user, $pass);
    }

    public function Select($table)
    {
        $sql = "SELECT * FROM " . $table;
        $query = $this->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=$id";
        $query = $this->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    // public function insert($table, $data)
    // {
    //     $keys = implode(",", array_keys($data));
    //     $param = ":" . implode(", :", array_keys($data));

    //     $sql = "INSERT INTO $table($keys) VALUES ($param)";
    //     $stmt = $this->prepare($sql);

    //     foreach ($data as $key => $value) {
    //         $stmt->bindParam(":" . $key, $value);
    //     }

    //     return $stmt->execute();
    // }

    public function insert($table, $data)
    {
        $keys = implode(",", array_keys($data));
        $params = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table($keys) VALUES ($params)";
        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value) {
            // Determine the data type of the value and bind it explicitly
            if (is_int($value)) {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_INT);
            } elseif (is_bool($value)) {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_BOOL);
            } elseif (is_null($value)) {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_STR);
            }
        }

        return $stmt->execute();
    }



    // public function update($table, $data, $cond)
    // {
    //     $updateKeys = null;

    //     foreach ($data as $key => $value) {
    //         $updateKeys .= "$key=:$key,";
    //     }
    //     $updateKeys = rtrim($updateKeys, ",");

    //     $sql = "UPDATE $table SET $updateKeys WHERE $cond";
    //     $stmt = $this->prepare($sql);

    //     foreach ($data as $key => $value) {
    //         $stmt->bindParam(":" . $key, $value);
    //     }

    //     return $stmt->execute();
    // }

    public function update($table, $data, $condition)
    {
        $setParams = "";
        foreach ($data as $key => $value) {
            $setParams .= $key . "= :" . $key . ",";
        }
        $setParams = rtrim($setParams, ",");

        $sql = "UPDATE $table SET $setParams WHERE $condition";
        $stmt = $this->prepare($sql);

        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_INT);
            } elseif (is_bool($value)) {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_BOOL);
            } elseif (is_null($value)) {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(":" . $key, $value, PDO::PARAM_STR);
            }
        }

        return $stmt->execute();
    }
}
