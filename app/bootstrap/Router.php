<?php

class Router
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = array();

    public function __construct()
    {
        $url = $this->parseUrl();

        if( !empty($url[0]) || file_exists('app/controllers/'. $url[0] .'Controller.php') )
        {
            $this->controller = $url[0];
            unset( $url[0] );
        }

        require_once 'app/controllers/'. $this->controller .'Controller.php';
        
        if( !empty($url[1]) || method_exists($this->controller, $url[1]) )
        {
            $this->method = $url[1];
            unset( $url[1] );
        }

        $this->params = $url ? array_values($url) : array();
        call_user_func_array( array( $this->controller .'Controller', $this->method ), $this->params );
    }

    private function parseUrl()
    {
        if ( isset($_GET['url']) )
        {
            // return $url = $_GET['url'];//returned een string met bijv. user/edit
            // return $url = explode('/', $_GET['url']); //breekt de string in stukken waar er een / staat returned een array met bijv. array([0] => "user", [1] => "edit")
            return $url = explode( '/', filter_var( rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL) );
        }
    }
}