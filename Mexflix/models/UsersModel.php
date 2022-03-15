<?php

class UsersModel extends Model{
    
    public function set( $user_data = array()){
        foreach($user_data as $key => $value){
            //variables Variables
            //http://php.net/manual/es/language.variables.variables.php
            $$key = $value;            
        }
        $this->query = "REPLACE INTO users (user, email, names, birthday, pass, role) VALUES 
        ('$user', '$email', '$names', '$birthday', MD5('$pass'), '$role')";
        $this->set_query();

    }

    public function get($user = ''){
        $this->query = ($user != '')
        ?"SELECT * FROM users WHERE user = '$user'"
        :"SELECT * FROM users";

        $this->get_query();
        //var_dump($this->rows);
        //return $this->rows;

        $num_rows = count($this->rows);
        //echo $num_rows;

        $data = array();

        //http://php.net/manual/es/control-structures.foreach.php
        foreach($this->rows as $key => $value){
            array_push($data, $value);
            //$data[$key] = $value;
        }

        return $data;
    }
    
    public function del($user = ''){
        $this->query = "DELETE FROM users WHERE user = '$user'";
        $this->set_query();
    }
    
    public function validate_user($user, $pass){
        $this->query = "SELECT * FROM users WHERE user = '$user' AND pass
        = MD5('$pass')";
        $this->get_query();

        $data = array();
        //http://php.net/manual/es/control-structures.foreach.php
        foreach($this->rows as $key => $value){
            array_push($data, $value);
            //$data[$key] = $value;
        }

        return $data;

    }
}