<?php

class StatusModel extends Model{
    
    /*public function __construct(){
        $this->db_name = 'mexflix';
    }*/


    public function set( $estados_data = array()){
        foreach($estados_data as $key => $value){

            //variables Variables
            //http://php.net/manual/es/language.variables.variables.php
            $$key = $value;            
        }
        $this->query = "REPLACE INTO estado (estado_id, estado_) VALUES 
        ($estado_id, '$estado_')";
        $this->set_query();

    }

    public function get($estado_id = ''){
        $this->query = ($estado_id != '')
        ?"SELECT * FROM estado WHERE estado_id = $estado_id"
        :"SELECT * FROM estado";

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
    
    public function del($estado_id = ''){
        $this->query = "DELETE FROM estado WHERE estado_id = $estado_id";
        $this->set_query();
    }
    
}