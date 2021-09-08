<?php 

class Mahasiswa_model {
    //coba buat data mahasiswa
    // private $mhs = [
    //     [
    //         "nama" => 'Muhammad Izzul',
    //         "nim" => '117705009238',
    //         "email" => "muhizzul16@gmail.com",
    //         "jurusan" => 'Teknik Informatikaa'
    //     ],
    //     [
    //         "nama" => 'Azka Khowarizmi',
    //         "nim" => '117705004235',
    //         "email" => "azka@gmail.com",
    //         "jurusan" => 'Teknik Industri'
    //     ],
    //     [
    //         "nama" => 'Ihsan Channel',
    //         "nim" => '117705043532',
    //         "email" => "ihsan@gmail.com",
    //         "jurusan" => 'Teknik Planologi'
    //     ],
    // ];

    //kita akan pake PDO PHP Data Objects
    //database handle 
    private $dbh;
    private $stmt;

    public function __construct(){
        //data source name
        //menghubungkan koneksi ke db
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //method untuk ngambil semua data mahasiswa
    public function getAllmhs(){
        //memanggil data yang ada di db
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        //menjalankan statement pdo
        $this->stmt->execute();
        //ambil data dan jadikan array assosiatif
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


 ?>