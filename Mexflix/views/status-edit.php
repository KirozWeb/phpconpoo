<?php
$status_controller = new StatusController();

if($_POST['r'] == 'status-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {

    $status = $status_controller->get($_POST['estado_id']);

    if( empty($status)){
        $template = '
            <div class="container">
                <p class="item error">No existe el status_id <b>%s</b></p>
            </div>
            <script>
                window.onload = function (){
                    reloadPage("status")
                }
            <script>
        
        ';

        printf($template, $_POST['estado_id']);
    } else{
        $template_status = '
            <h2 class="p1">Editar Status</h2>
            <form method="POST" class="item">
                <div class="p_25">
                    <input type="text" placeholder="estado_id" value="%s"
                        disabled required>
                    <input type="hidden" name="estado_id" value="%s">
                </div>
                <div class="p_25">
                    <input type="text" name="estado_" placeholder="status"
                    value="%s" required>
                </div>
                <div class="p_25">
                    <input class="button edit" type="submit" name="r" value="Editar">
                    <input  type="hidden" name="r" value="status-edit">
                    <input  type="hidden" name="crud" value="set">
                </div>
            </form>
        ';

        printf(

            $template_status,
            $status[0]['estado_id'],
            $status[0]['estado_id'],
            $status[0]['estado_']
        );
        
    }

} else if( $_POST['r'] == 'status-edit' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'set') {
    // programar la insercion
    print('<h2>Esto es dentro de status-add.php</h2>');
    
    

    $save_status = array(
        'estado_id' => $_POST['estado_id'],
        'estado_' => $_POST['estado_']

    );

    $status = $status_controller->set($save_status);

    $template = '
        <div class="container">
            <p class="item edit">Status <b>%s</b> salvado</p>
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