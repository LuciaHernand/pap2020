<?php

class Pais extends CI_Controller
{

    public function c()
    {
        $this->load->view('pais/cGet');
    }

    public function cPost()
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

    public function r() {
        $this->load->model('pais_model');
        $datos['paises'] = $this->pais_model->getAll();
        $this->load->view('pais/r',$datos);
    }
}