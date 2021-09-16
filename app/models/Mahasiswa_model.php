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

    //method hapus data
    public function hapusDataMahasiswa($id){
        //set query
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        //menjalankna query
        $this->db->query($query);
        //mengkaitkan param $id ke 'id' agar dibaca di query
        $this->db->bind('id', $id);

        //eksekusi database
        $this->db->execute();

        //cek baris yang kehapus kalo kehapus ada data angka 1 kalo gagal hapus 0
        return $this->db->hitungRow();
    }

    //set method ubah data
       public function ubahDataMahasiswa($data){
        //membuat query
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";

        //memangggil query $query
        $this->db->query($query);

        //menghubungkan nama baris di table dengan data yang dikirimkan
        //supaya data masuk
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        //ekseskusi db
        $this->db->execute();

        //mendapatkan nilai jumlah baris yang dimasukan
        return $this->db->hitungRow();
    }

    //method cari
    public function cariAllmhs(){
        //tangkap data dari index mahasiswa yang di submit simpen di var keyword
        $tangkapKeywordCari = $_POST['keywordCari'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

        //jalankan isi var Query
        $this->db->query($query);
        //mengkaitkan keyword cari dan keyword
        $this->db->bind('keyword', "%$tangkapKeywordCari%");
        return $this->db->resultSet();
    }
}


 ?>