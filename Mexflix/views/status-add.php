<?php
if($_POST['r'] == 'status-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
    print('
        <h2 class="p1">Agregar Status</h2>
        <form method="POST" class="item">
            <div class="p_25">
                <input type="text" name="estado_" placeholder="status" required>
            </div>
            <div class="p_25">
                <input class="button add" type="submit" value="Agregar">
                <input type="hidden" name="r" value="status-add">
                <input type="hidden" name="crud" value="set">
            </div>
        </form>
    ');
} else if( $_POST['r'] == 'status-add' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set') {
    // programar la insercion
    print('<h2>Esto es dentro de status-add.php</h2>');
    
    $status_controller = new StatusController();

    $new_status = array(
        'estado_id' => 0,
        'estado_' => $_POST['estado_']

    );

    $status = $status_controller->set($new_status);

    $template = '
        <div class="container">
            <p class="item add">Status <b>%s</b> salvado</p>
        </div>
        <script>
            window.onload = function() {
                reloadPage("status")
            }
        </script>
    ';

    printf($template, $_POST['estado_']);

} else {
    //para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}