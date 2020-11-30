<?php

class Pais extends CI_Controller
{

    function c()
    {
        $this->load->view('pais/cGet');
    }

    function cPost()
    {
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $this->load->model('pais_model');
        if ($nombre != null) {
            if ($this->pais_model->getPais($nombre)==null) {
                $this->pais_model->c($nombre);
                $this->load->view('pais/paisCOK');
            }
            else {
                $this->load->view('pais/paisCErrorPaisDuplicado');
            }
        }
        else {
            $this->load->view('pais/paisCErrorPaisVacio');
        }
    }
}