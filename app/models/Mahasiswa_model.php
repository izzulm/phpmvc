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

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '.$this->table. ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    //insert data mahasiswa
    public function tambahDataMahasiswa($data){
        //membuat query
        $query = "INSERT INTO mahasiswa
                    VALUES 
                ('', :nama, :nim, :email, :jurusan)";

        //memangggil query $query
        $this->db->query($query);

        //menghubungkan nama baris di table dengan data yang dikirimkan
        //supaya data masuk
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        //ekseskusi db
        $this->db->execute();

        //mendapatkan nilai jumlah baris yang dimasukan
        return $this->db->hitungRow();
    }
}


 ?>