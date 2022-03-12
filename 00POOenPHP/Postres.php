<?php

interface Ingredientes{
    
    public function establecer_ingredientes($lista);
    public function obtener_ingredientes();
}

interface Receta{
    public function establecer_receta($pasos);
    public function obtener_receta();
}

class Postres implements Ingredientes, Receta{

    private $ingredientes;
    private $receta;

    public function establecer_ingredientes($lista){
        $this->ingredientes = explode(',', $lista);

    }
    public function obtener_ingredientes(){
        $num_ingredientes = count($this->ingredientes);
        echo $num_ingredientes;
        $html = '<ul>';
        for($i=0; $i < $num_ingredientes; $i++){
            $html .= '<li>' . $this->ingredientes[$i] . '</li>';
        }

        $html .= '</ul>';
        return print($html);
    }

    public function establecer_receta($pasos){
        $this->receta = explode('|', $pasos);
    }
    public function obtener_receta(){
        $num_pasos = count($this->receta);
        
        $html = '<ol>';
        for($i=0; $i < $num_pasos; $i++){
            $html .= '<li>' . $this->receta[$i] . '</li>';
        }

        $html .= '</ol>';
        return print($html);
    }

}

echo '<h1>Postres</h1>';

echo '<h2>Hot Cakes</h2>';

$hot_cakes = new Postres();

echo '<h3>Ingredientes:</h3>';
$hot_cakes->establecer_ingredientes('
    1 taza de harina para hot cakes,
    1 huevo,
    1/3 taza de leche,
    10 gotas de vainilla,
    3 cucharadas de mantequilla'
);

    
    $hot_cakes->obtener_ingredientes();

    echo '<h3>Receta:</h3>';

    $hot_cakes->establecer_receta('
    Paso uno |
    paso dos |
    paso tres|
    paso cuatro |
    paso cinco |
    paso seis');

    $hot_cakes->obtener_receta();