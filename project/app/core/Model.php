<?php 

namespace App\core;
use App\config\Database;
use PDO;
class Model {
    
    protected   $conn;

    public function __construct(){
        $this->conn = Database::getConnection();
    }


    public function query($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function findAll($table)
    {
        $stmt = $this->query("SELECT * FROM $table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($table, $id)
    {
        $stmt = $this->query("SELECT * FROM $table WHERE id = ?", [$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $stmt = $this->query("INSERT INTO $table ($columns) VALUES ($placeholders)", array_values($data));
        return $this->conn->lastInsertId();
    }

    public function update($table, $data, $id)
    {
        $setPart = implode('=?, ', array_keys($data)) . '=?';
        $values = array_values($data);
        $values[] = $id;
        $stmt = $this->query("UPDATE $table SET $setPart WHERE id = ?", $values);
        return $stmt->rowCount();
    }

    public function delete($table, $id)
    {
        $stmt = $this->query("DELETE FROM $table WHERE id = ?", [$id]);
        return $stmt->rowCount();
    }
}
