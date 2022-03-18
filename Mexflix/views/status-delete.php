<?php
$status_controller = new StatusController();

if($_POST['r'] == 'status-delete' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {

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
            <h2 class="p1">Eliminar Status</h2>
            <form method="POST" class="item">
                <div class="p1 f2">
                    ¿Estas seguro de eliminar el Status:
                    <mark class="p1">%s</mark>?
                </div>
                <div class="p_25">
                    <input class="button delete" type="submit" value="SI">
                    <input class="button add" type="button" value="NO" onclick="history.back()">                    
                    <input  type="hidden" name="estado_id" value="%s">
                    <input  type="hidden" name="r" value="status-delete">
                    <input  type="hidden" name="crud" value="del">
                </div>
            </form>
        ';

        printf(

            $template_status,
            $status[0]['estado_'],
            $status[0]['estado_id']
        );
        
    }

} else if( $_POST['r'] == 'status-delete' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'del') {
    // programar la insercion
    print('<h2>Esto es dentro de status-add.php</h2>');
    
    $status = $status_controller->del($_POST['estado_id']);

    $template = '
        <div class="container">
            <p class="item delete">Status <b>%s</b> eliminado</p>
        </div>
        <script>
            window.onload = function() {
                reloadPage("status")
            }
        </script>
    ';

    printf($template, $_POST['estado_id']);

} else {
    //para generar una vista de no autorizado
    $controller = new ViewController();
    $controller->load_view('error401');
}