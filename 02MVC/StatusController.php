<?php
require_once('StatusModel.php');

class StatusController{
    private $model;

    public function __construct(){
        $this->model = new StatusModel();
    }

    public function create( $estados_data = array() ){
        return $this->model->create($estados_data);
    }

    public function read( $estado_id = ''){
        return $this->model->read($estado_id);
    }

    public function update( $estados_data = array()){
        return $this->model->update($estados_data);
    }

    public function delete( $estado_id = ''){
        return $this->model->delete($estado_id);
    }
}