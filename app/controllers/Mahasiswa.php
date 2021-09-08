<?php 

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllmhs();
        //$data['mhs'] = 'izzul';

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}

 ?>