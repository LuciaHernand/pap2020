<?php

class Pais extends CI_Controller
{

    public function c()
    {
        frame($this,'pais/cGet');
    }

    public function cPost()
    {
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $this->load->model('pais_model');
        if ($nombre != null) {
            if ($this->pais_model->getPais($nombre)==null) {
                $this->pais_model->c($nombre);
                frame($this,'pais/paisCOK');
            }
            else {
                frame($this,'pais/paisCErrorPaisDuplicado');
            }
        }
        else {
            frame($this,'pais/paisCErrorPaisVacio');
        }
    }

    public function r() {
        $this->load->model('pais_model');
        $datos['paises'] = $this->pais_model->getAll();
        frame($this,'pais/r',$datos);
      
    }
}