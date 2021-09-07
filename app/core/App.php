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

        if (file_exists('../app/controllers' . $url[0] . '.php') ) {
            # code...
            $this->controller = $url[0];
            //unset($url[0]);
            var_dump($url);
        }
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