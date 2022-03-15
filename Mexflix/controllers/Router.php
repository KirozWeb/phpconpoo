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
            $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
            $controller = new ViewController();
            switch($this->route){

                case 'home':                    
                    $controller->load_view('home');
                    break;

                case 'movieseries':                    
                    $controller->load_view('movieseries');
                    break;

                case 'usuarios':                    
                    $controller->load_view('users');
                    break;

                case 'status':                    
                    $controller->load_view('status');
                    break;

                case 'salir':                    
                    $user_session = new SessionController();
                    $user_session->logout();
                    break;

                default:
                    $controller->load_view('error404');
                    break;
            }

            
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
                    //echo 'El usuario y el password son incorrectos';
                    $login_form = new ViewController();
                    $login_form->load_view('login');
                    header('Location: ./?error=El usuario ' . $_POST['user'] . ' y el password proporcionado no coinciden');
                }
                else{
                    //echo 'El usuario y el password son correctos';
                    //var_dump($session);
                    $_SESSION['ok'] = true;

                    foreach ($session as $row){
                        $_SESSION['user'] = $row['user'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['names'] = $row['names'];
                        $_SESSION['birthday'] = $row['birthday'];
                        $_SESSION['pass'] = $row['pass'];
                        $_SESSION['role'] = $row['role'];
                    }

                    header('Location: ./');
                }
            }
            
        }
    }
}