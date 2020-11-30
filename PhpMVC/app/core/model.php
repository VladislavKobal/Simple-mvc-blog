<?php

///php remote code injection
class Model
{

    protected $table_name;
    protected $id_column;
    protected $columns = [];
    protected $collection;
    protected $sql;
    protected $params = [];
    protected $no_of_records_per_page = 10;
    public $total_rows = 0;
    public $total_pages = 0;

    public function initCollection()
    {
        $columns = implode(',', $this->getColumns());
        $this->sql = "select $columns from " . $this->table_name;
        return $this;
    }

    public function getColumns()
    {
        $db = new DB;
        $sql = "show columns from  $this->table_name;";
        $results = $db->query($sql);
        foreach ($results as $result) {
            array_push($this->columns, $result['Field']);
        }
        return $this->columns;
    }

    public function sort($params)
    {
        if (count($params) > 0) {
            $this->sql .= " order by ";
            foreach ($params as $key => $value) {
                $this->sql .= "$key $value,";
            }
            $this->sql = chop($this->sql, ',');
        }
        return $this;

    }

    public function filterlogin($params)
    {
        if (isset($params)) {
            $this->sql .= " where `email`= \"$params[0]\" and `password` = \"$params[1]\"";
            //array_push($this->params,$params[1]);
        }
        return $this;
    }

    public function filter($params)
    {
        if (isset($params)) {
            $this->sql .= " where $params[0]  = $params[1]";
            //array_push($this->params,$params[1]);
        }
        return $this;
    }

    public function getCollection()
    {
//        var_dump($this->sql);
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;

    }

    public function select()
    {
        return $this->collection;
    }

    public function selectFirst()
    {
        if (count($this->collection) > 0) return $this->collection[0];
    }

    public function getItem($id)
    {
        $sql = "select * from $this->table_name where $this->id_column = ?;";
        $db = new DB();
        $params = array($id);
        if (count($db->query($sql, $params)) > 0) return $db->query($sql, $params)[0];
    }

    public function deleteItem($id)
    {
        $values = [];
        $sql = "delete from $this->table_name where $this->id_column = ?;";
        array_push($values, $id);
        $db = new DB();
        return $db->query($sql, $values);
    }

    public function saveItem($id, $values)
    {
        $sql = "update $this->table_name"
            . " set ";
        $params = [];
        foreach ($values as $key => $value) {
            $sql .= "$key = ?,";
            array_push($params, $value);
        }
        $sql = chop($sql, ',');
        $sql .= " where $this->id_column = ?;";

        array_push($params, $id);
        $db = new DB();
        return $db->query($sql, $params);
    }

    public function add($values)
    {
        $params = [];
        $sql = "insert into $this->table_name (";
        foreach ($values as $key => $value) {
            $sql .= "`$key`,";
        }
        $sql = chop($sql, ',');
        $sql .= ") values ( ";
        foreach ($values as $key => $value) {
            $sql .= "?,";
            $value = strip_tags($value);
            array_push($params, $value);
        }
        $sql = chop($sql, ',');
        $sql .= " );";
        $db = new DB();
        return $db->query($sql, $params);
    }

    public function getPostValues()
    {
        $values = [];
        $columns = $this->getColumns();
        foreach ($columns as $column) {
            $column_value = filter_input(INPUT_POST, $column);
            if ($column_value && $column !== $this->id_column) {
                $values[$column] = $column_value;
            }

        }
        return $values;
    }

    public function paginate($currentPage = 1)
    {
        $offset = ($currentPage - 1) * $this->no_of_records_per_page;

        $sql = "SELECT COUNT(*) FROM $this->table_name";
        $db = new DB();
        $this->total_rows = $db->query($sql);
        $this->total_pages = ceil($this->total_rows[0]["COUNT(*)"] / $this->no_of_records_per_page);
        $this->sql .= " LIMIT $offset, $this->no_of_records_per_page";
        return $this;
    }
}
