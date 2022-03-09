<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

class Perro{

    //ATRIBUTOS
    public $nombre;
    public $raza;
    public $edad;
    public $sexo;
    public $adiestrado;
    public $foto;
    public $comida;
    private $pulgas;
    public static $mejor_amigo = 'hombre';
    const MEJOR_CUALIDAD = 'Fidelidad';

    //METODOS


    public function __construct($n, $r, $e, $s, $a, $f,$p){
        $this->nombre = $n;
        $this->raza = $r;
        $this->edad = $e;
        $this->sexo = ($s) ? 'Macho' : 'Hembra';
        $this->adiestrado = ($a) ? 'Adiestrado' : 'No Adiestrado';
        $this->foto = $f;
        $this->pulgas = $p;

    }

    public function __destruct(){
        
    }

    public function ladrar(){
        echo '<p><mark>GUAUUUUUU GUAUUUUUUU</mark></p>';
    }

    public function comer($c){
        echo '<p>' . $this->nombre . ' come ' . $c . '</p>';
    }

    public function aparecer(){
        echo '<img src="' .$this->foto . '">';
    }

    public function tienepulgas(){
        echo ($this->pulgas) ? '<p>Tiene pulgas</p>' : '<p>No tiene pulgas</p>';
    }

    public function ladrar_y_comer(){
        self::ladrar();
        Perro::comer('huesos');
        echo '<p>El mejor amigo del perro es el ' . Perro::$mejor_amigo . ' ';
        echo '<p>La mejor cualidad del perro es la ' . self::MEJOR_CUALIDAD;
        echo '<p>La mejor cualidad del perro es la ' . Perro::MEJOR_CUALIDAD;
    }
    
}

//Instanciar un objeto de la clase
$kenai = new Perro('kenai', 'Firefox', 3, true, true, 'https://cdn.pixabay.com/photo/2012/05/07/13/41/dog-48490_960_720.png',false);

//echo $kenai;

//var_dump($kenai);


echo "hola mundo";
echo '<h1>'. $kenai->nombre . '</h1>';
echo '<h1>'. $kenai->raza . '</h1>';
echo '<h1>'. $kenai->edad . '</h1>';
echo '<h1>'. $kenai->sexo . '</h1>';
echo '<h1>'. $kenai->adiestrado . '</h1>';


$kenai->ladrar();
$kenai->comer('croquetas');
$kenai->aparecer();
$kenai->tienepulgas();
$kenai->ladrar_y_comer();
echo '<p>' . $kenai->color .'</p>';
?>