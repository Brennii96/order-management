<?php

class DB
{
    private static $_instance = null;
    private $_pdo,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;

    /**
     * DB constructor.
     */
    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db') . ';', Config::get('mysql/user'), Config::get('mysql/password'));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @return DB|null
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    /**
     * @param $sql
     * @param array $params
     * @return $this
     */
    public function query($sql, $params = array())
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    /**
     * @param $action
     * @param $table
     * @param array $where
     * @return $this|bool
     */
    private function action($action, $table, $where = array())
    {
        if (count($where) === 3) {
            $operators = array('=', '>', '<', '<=', '>=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} where {$field} {$operator} ?";
                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }

    /**
     * @param $table
     * @param array $fields
     * @return bool
     */
    public function insert($table, $fields = array())
    {
        $keys = array_keys($fields);
        $values = '';
        $x = 1;
        foreach ($fields as $field) {
            $values .= '?';
            if ($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        }
        $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) ."`) VALUES ({$values})";
        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    /**
     * @param $table
     * @param $where
     * @return bool|DB
     */
    public function get($table, $where)
    {
        return $this->action('SELECT *', $table, $where);
    }

    /**
     * @param $table
     * @param $id
     * @param $fields
     * @param string $set
     * @return bool
     */
    public function update($table, $id, $fields, $set = '')
    {
        $set = '';
        $x = 1;
        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ", ";
            }
            $x++;
        }
        $sql = "UPDATE {$table} SET {$set} WHERE {$table}_id = {$id}";
        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    /**
     * @param $table
     * @param $where
     * @return bool|DB
     */
    public function delete($table, $where)
    {
        return $this->action('DELETE', $table, $where);
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->results()[0];
    }

    /**
     * @return bool
     */
    public function error()
    {
        return $this->_error;
    }

    /**
     * @return mixed
     */
    public function results()
    {
        return $this->_results;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->_count;
    }
}