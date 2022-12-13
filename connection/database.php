<?php
class Database
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "ctc_food2";
    public $db;

    function __construct()
    {
        $this->dbconnection();
    }

    public function dbconnection()
    {
        $this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->db) {
            print($this->db->num_error);
            exit();
        }
    }

    public function save($table, $fields = null)
    {
        $sql = " INSERT INTO " . $table . "(" . implode(",", array_keys($fields)) . ")
        VALUES('" . implode("','", array_values($fields)) . "')";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function view($table)
    {
        $sql = " SELECT * FROM " . $table . " ";
        $result = $this->db->query($sql);
        $list = array();
        while ($data = $result->fetch_assoc()) {
            $list[] = $data;
        }
        return $list;
    }

    public function selectwhere($table, $where = null)
    {
        $condition = "";
        $list = array();
        foreach ($where as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = " SELECT * FROM " . $table . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        $list = array();
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }




    public function update($table, $fields, $where)
    {

        $condition = "";
        $query = "";
        foreach ($fields as $key => $value) {
            $query .= $key . " = '" . $value . "' , ";
        }

        $query = substr($query, 0, -2);
        foreach ($where as $key => $value) {
            $condition .=$key. " = '" . $value . "' AND ";
        }
        
        $condition = substr($condition, 0, -5);
        $sql = " UPDATE " . $table . " SET " . $query . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        } else {    
            return false;
        }
    }



    
    public function delect($table, $where)
    {
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "DELETE FROM " . $table . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function is_login($email, $pass)
    {
        $sql = "SELECT * FROM login WHERE email='$email' AND password='$pass'";
        $result = $this->db->query($sql);
        return ($result);
    }
    public function login($status)
    {
        echo "<script>window.location='$status'</script>";
    }


    public function upload($file, $path = "../assets/img/profile")
    {
        if (empty($file['name']))
            return false;
        $file_name = $file['name'];
        $tmp_name = $file['tmp_name'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $name = uniqid();
        $rename = $name . '.' . $ext;
        $file_upload = $path . '/' . $rename;
        $up = move_uploaded_file($tmp_name, __DIR__ . '/../' . $file_upload);
        if ($up) {
            return $file_upload;
        } else {
            return false;
        }
    }



    public function search($table, $where = null)
    {
        $condition = "";
        $list = array();
        foreach ($where as $key => $value) {
            $condition .= $key . " LIKE '%" . $value . "%' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = " SELECT * FROM " . $table . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        $list = array();
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }


}
