<?php


class StatusController{
    private $model;

    public function __construct(){
        $this->model = new StatusModel();
    }

    public function set( $estados_data = array() ){
        return $this->model->set($estados_data);
    }

    public function get( $estado_id = ''){
        return $this->model->get($estado_id);
    }

    public function del( $estado_id = ''){
        return $this->model->del($estado_id);
    }
}