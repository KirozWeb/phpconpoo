<?php

require 'Poligono.php';
require 'Triangulo.php';
require 'Cuadrado.php';
require 'Rectangulo.php';
require 'Hexagono.php';

echo '
     <h1>Poligonos</h1>
     <p>Figura geometrica plana que esta limitada por tres o mas rectas y 
     tiene tres o mas angulos y vertices.</p>
     <h2>Perimetro</h2>
     <p>El perimetro de un poligono es igual a la suma de las longitudes de 
     sus lados.</p>
     <h2>Area</h2>
     <p>El area de un poligono es la medida de la region o superficie
        encerrada por un poligono.</p>
     <hr>
     ';
echo '
    <h3>Triangulo</h3>
    <img src="https://cdn.pixabay.com/photo/2012/05/07/13/41/dog-48490_960_720.png">
';

$triangulo = new Triangulo(3,6,9,10);
echo '<p>' . $triangulo->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($triangulo) . ': <mark>' . $triangulo->perimetro() . '</mark></p>';
echo '<p>Area del ' . get_class($triangulo) . ': <mark>' . $triangulo->area() . '</mark></p>';
echo '<hr>';

$cuadrado = new Cuadrado(7);
echo '<p>' . $cuadrado->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($cuadrado) . ': <mark>' . $cuadrado->perimetro() . '</mark></p>';
echo '<p>Area del ' . get_class($cuadrado) . ': <mark>' . $cuadrado->area() . '</mark></p>';
echo '<hr>';

$rectangulo = new Rectangulo(5,6);
echo '<p>' . $rectangulo->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($rectangulo) . ': <mark>' . $rectangulo->perimetro() . '</mark></p>';
echo '<p>Area del ' . get_class($rectangulo) . ': <mark>' . $rectangulo->area() . '</mark></p>';
echo '<hr>';

$hexagono = new Hexagono(8,9);
echo '<p>' . $hexagono->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($hexagono) . ': <mark>' . $hexagono->perimetro() . '</mark></p>';
echo '<p>Area del ' . get_class($hexagono) . ': <mark>' . $hexagono->area() . '</mark></p>';
echo '<hr>';