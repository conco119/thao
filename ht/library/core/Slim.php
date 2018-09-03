<?php
class Slim
{
    private $slim;
    public function __construct($dsn, $usr, $pwd)
    {
        $this->slim = new \Slim\PDO\Database($dsn, $usr, $pwd);
    }

    public function get_key($data)
    {
        $array = [];
        foreach ($data as $key => $value) {
            array_push($array, $key);
        }
        return $array;
    }

    public function get_value($data)
    {
        $array = [];
        foreach ($data as $key => $value) {
            array_push($array, $value);
        }
        return $array;
    }

    public function instance()
    {
        return $this->slim;
    }

    public function insert($table, $data)
    {
        $key = $this->get_key($data);
        $value = $this->get_value($data);
        $insertStatement = $this->slim->insert($key)->into($table)->values($value);
        $insertId = $insertStatement->execute();
        return $insertId;
    }

    public function update($table, $data, $field, $operator, $value)
    {
        $updateStatement = $this->slim->update($data)->table($table)->where($field, $operator, $value);
        $affectedRows = $updateStatement->execute();
        return $affectedRows;
    }
}
