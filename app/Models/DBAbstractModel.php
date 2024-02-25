<?php

namespace App\Models;



use mysqli;

class DBAbstractModel
{

    protected $db_host = DB_HOST;

    protected $db_user = DB_USER;

    protected $db_pass = DB_PASS;

    protected $db_name = DB_NAME;

    protected $connection;

    protected $table;

    protected $query;
    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if ($this->connection->connect_error) {
            die('Error de conexión (' . $this->connection->connect_errno . ') '
                . $this->connection->connect_error);
        }
    }

    public function query($sql, $data = [], $params = null)
    {
        if (!empty($data)) {

            if ($params == null) {
                $params = str_repeat('s', count($data));
            }

            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params, ...$data);
            $stmt->execute();
            $this->query = $stmt->get_result();
        } else {
            $this->query = $this->connection->query($sql);
        }
        return $this;
        // $this->query = $this->connection->query($sql);

    }

    public function first()
    {
        return $this->query->fetch_assoc();
    }

    public function get()
    {
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    //Consultas

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";

        return $this->query($sql)->get();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";

        return $this->query($sql, [$id], 'i')->first();
    }

    public function where($column, $value, $operator = '=')
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} ?";
        $this->query($sql, [$value], 's');

        return $this;
    }

    public function create($data)
    {
        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (" . str_repeat('?,', count($values) -1) . "?)";
        
        $this->query($sql, $values);

        $insert_id = $this->connection->insert_id;

        return $this->find($insert_id);
    }

    public function update($id, $data)
    {
        $values = [];
        foreach ($data as $key => $value) {
            $values[] = "{$key} = ?";
        }

        $values = implode(', ', $values);
        
        $sql = "UPDATE {$this->table} SET {$values} WHERE id = ?";
        
        $values = array_values($data);
        $values[] = $id;

        $this->query($sql, $values);

        return $this->find($id);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";

        $this->query($sql, [$id], 'i');

    }

    // public function __destruct()
    // {
    //     $this->connection->close();
    // }
}
