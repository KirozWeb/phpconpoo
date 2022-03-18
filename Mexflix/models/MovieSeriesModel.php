<?php

class MovieSeriesModel extends Model{
    
    /*public function __construct(){
        $this->db_name = 'mexflix';
    }*/


    public function set( $ms_data = array()){
        foreach($ms_data as $key => $value){

            //variables Variables
            //http://php.net/manual/es/language.variables.variables.php
            $$key = $value;            
        }

        $plot = str_replace("'", "\'", $plot);
        
        $this->query = "REPLACE INTO movieseries SET imdb_id = '$imdb_id', 
        title = '$title', plot = '$plot', author = '$author', actors = '$actors',
        country = '$country', premiere = '$premiere', trailer = '$trailer', 
        poster = '$poster', rating = $rating, genres = '$genres', estado_id = $estado_id, 
        category = '$category'";
        $this->set_query();

    }

    public function get($ms = ''){
        
        $this->query = ($ms != '')?"SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors, ms.country, ms.premiere,
        ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.estado_ FROM movieseries AS 
        ms INNER JOIN estado AS s ON ms.estado_id = s.estado_id WHERE ms.imdb_id = '$ms'" 
        :"SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors, ms.country, ms.premiere,
        ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.estado_ FROM movieseries AS ms
        INNER JOIN estado AS s
        ON ms.estado_id = s.estado_id";
        
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
    
    public function del($ms = ''){
        $this->query = "DELETE FROM movieseries WHERE imdb_id = '$ms'";
        $this->set_query();
    }
    
}