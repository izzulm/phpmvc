<?php 

class Mahasiswa_model {

    private $table = 'Mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllmhs(){
        $this->db->query('SELECT * FROM mahasiswa');
        return $this->db->resultSet();
    }
}


 ?>