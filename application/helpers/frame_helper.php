<?php
function frame($controlador, $rutaVista, $datos = []) {
    if (session_status () == PHP_SESSION_NONE) {session_start ();}
    if (isset ( $_SESSION ['usuario'] )) {
        $datos ['_header'] ['usuario']  = $_SESSION ['usuario'];
    }
    $controlador->load->view ( '_t/head',$datos );
    $controlador->load->view ( '_t/header', $datos );
    $controlador->load->view ( '_t/nav', $datos );
    $controlador->load->view ( $rutaVista, $datos );
    $controlador->load->view ( '_t/footer', $datos );
    $controlador->load->view ( '_t/end' );
}

function prg($mensaje='Pulsa el botón para volver',$link='',$severidad='success'){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['_mensaje'] = $mensaje;
    $_SESSION['_link'] = $link;
    $_SESSION['_severidad'] = $severidad;
    
    header('Location:'.base_url().'msg');
}


?>