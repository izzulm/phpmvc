<?php 

class Mahasiswa_model {

    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllmhs(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
}


 ?>