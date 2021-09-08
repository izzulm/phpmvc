<?php 

/**
 * 
 */
class Controller
{
    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/'. $model . '.php';

        //instansiasi property model ke objek baru supaya nanti hasil properti nya di simpan di objek dan di kasihkan ke home sebagai data
        // return new $model;
        $modal = new $model;
        return $modal;
    }
    
}


 ?>