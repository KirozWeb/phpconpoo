<?php
class Router{
    public $route;

    public function __construct($route){
        //http://php.net/manual/es/function.session-start.php
        //http://php.net/manual/es/session.configuration.php
        //buscar opciones en el PHP.INI

        $session_options = array(
            'use_only_cookies' => 1,
            'auto_start' => 5,
            'read_and_close' => true
        );
        if( !isset($_SESSION))  session_start($session_options);       

        if(!isset($_SESSION['ok']))  $_SESSION['ok'] = false;
        

        if($_SESSION['ok']){
            //Aqui va toda la programacion de nuestra webapp
        }else{
            if(!isset($_POST['user'])&& !isset($_POST['pass'])){
                //mostrar un formulario de autenticacion
                $login_form = new ViewController();
                $login_form->load_view('login');
            }
            else{
                $user_session = new SessionController();
                $session = $user_session->login($_POST['user'], $_POST['pass']);
                
                if( empty($session)){
                    echo 'El usuario y el password son incorrectos';
                }
                else{
                    echo 'El usuario y el password son correctos';
                }
            }
            
        }
    }
}