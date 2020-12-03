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
                prg('País creado correctamente','pais/c');
            }
            else {
                prg('País duplicado','pais/c','danger');
            }
        }
        else {
            prg('Nombre de país nulo','pais/c','danger');
        }
    }

    public function XcPost()
    {
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $this->load->model('pais_model');
        if ($nombre != null) {
            if ($this->pais_model->getPais($nombre)==null) {
                $this->pais_model->c($nombre);
                echo('País creado');
            }
            else {
                echo('ERROR:País duplicado');
            }
        }
        else {
            echo('ERROR: Nombre de país nulo');
        }
    }
    
    public function r() {
        $this->load->model('pais_model');
        $datos['paises'] = $this->pais_model->getAll();
        frame($this,'pais/r',$datos);
      
    }
}