<?php
function frame($controlador,$ruta,$datos) {
    $controlador->load->view('_t/head');
    $controlador->load->view($ruta,$datos);
    $controlador->load->view('_t/end');
}
?>