<?php 

/**
 * 
 Ini buat dokumentasi
 */
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();

        //Cek Controller
        if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
            # code...
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //Cek Method
        //cek di url ada ga method nya (method terdapat di array 1)
        if(isset($url[1]) ) {
            if( method_exists($this->controller, $url[1]) ){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //Kelola parameters
        if( !empty($url) ){
            $this->params = array_values($url);
        }

        //jalankan controller dan method dan kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL(){
        if( isset($_GET['url']) ){
            $url = rtrim($_GET['url'], '/' );
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}

 ?>