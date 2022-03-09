<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

class Telefono{
    public $marca;
    public $modelo;
    protected $alambrico = true;
    protected $comunicacion;

    public function __construct($marca, $modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->comunicacion = ($this->alambrico) ? 'Alambrico' : 'Inalambrico';
    }

    public function llamar(){
        return print('<p>Riiiing Riiiiing !!!!</p>');
    }

    public function mas_info(){
        return print ('<ul>
                        <li>Marca <b>' . $this->marca . '</b></li>
                        <li>Modelo <b>' . $this->modelo . '</b></li>
                        <li>Comunicacion <b>' . $this->comunicacion. '</b></li>
                    </ul>');
    }
}

class Celular extends Telefono{
    protected $alambrico = false;

    public function __construct($marca, $modelo){
        parent::__construct($marca, $modelo);
    }
}

final class SmarthPhone extends Celular{
    public $alambrico = false;
    public $internet = true;

    public function __construct($marca, $modelo){
        parent::__construct($modelo, $marca);
    }

    public function mas_info(){
        return print ('<ul>
                        <li>Marca <b>' . $this->marca . '</b></li>
                        <li>Modelo <b>' . $this->modelo . '</b></li>
                        <li>Comunicacion <b>' . $this->comunicacion. '</b></li>
                        <li>Dispositivo con Acceso a Internet</li>
                    </ul>');
    }
}

echo '<h1>Evolucion del Telefono</h1>';

echo '<h2>Telefono:</h2>';

$tel_casa = new Telefono('Panasonic', 'Kx-TS550');
$tel_casa->llamar();
$tel_casa->mas_info();

echo '<h2>Celular:</h2>';

$mi_cel = new Celular('Nokia', '5120');
$mi_cel->llamar();
$mi_cel->mas_info();

echo '<h2>SmarthPone:</h2>';

$mi_sp = new SmarthPhone('Motorola', 'G3');
$mi_sp->llamar();
$mi_sp->mas_info();