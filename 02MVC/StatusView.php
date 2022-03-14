<?php
require('StatusController.php');

echo "<h1>CRUD con MVC de la Tabla Status</h1>";

$estados = new StatusController();

//$status->read();

$estados_data = $estados->read();
var_dump($estados_data);

$num_estados = count($estados_data);

echo '<h2>Numero de Estados: <mark>' . $num_estados . '</mark></h2>';

echo '<h2>Tabla de Status</h2>';

echo '<table>
        <tr>
            <th>estados_id</th>
            <th>estados</th>
        </tr>';
        for($n = 0; $n < count($estados_data); $n++){
            echo '<tr>
                <td>' . $estados_data[$n]['estado_id'] . '</td>
                <td>' . $estados_data[$n]['estado_']. '</td>
            </tr>';

        }
echo '</table';

echo '<h2>Insertando Estados</h2>';
$new_estados = array(
    'estado_id' => 0,
    'estado_' => 'Otro Estado mas'    
);

//$estados->create($new_estados);

echo '<h2>Actualizando Estados</h2>';

$update_estados = array(
    'estado_id' => 8,
    'estado_' => 'Other Status more'    
);
//$estados->update($update_estados);

echo '<h2>Eliminando Estados</h2>';
//$estados->delete(8);