<?php 

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Mahasiswa';
        $data['mhs']= $this->model('Mahasiswa_model')->getAllmhs();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
    //method melihat detail data mahasisa
    public function detail($id) {
        $data['judul'] = 'Mahasiswa';
        $data['mhs']= $this->model('Mahasiswa_model')->getMahasiswaById($id);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }
    //method menambahkan data
    public function tambah(){
        if ( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {

            //membuat isi flash
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');

            //redirect ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{

            //membuat isi flash
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');

            //redirect ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    //method hapus data
    public function hapus($id){
        if ( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {

            //membuat isi flash
            Flasher::setFlash('berhasil', 'dihapus', 'success');

            //redirect ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{

            //membuat isi flash
            Flasher::setFlash('gagal', 'dihapus', 'danger');

            //redirect ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}

 ?>