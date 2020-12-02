<?php

class Aficion extends CI_Controller
{

    function c()
    {
        $datos['head']['title'] = 'Nueva afición';
        frame($this,'aficion/cGet',$datos);
    }

    function cPost()
    {
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $this->load->model('aficion_model');
        if ($nombre != null) {
            if ($this->aficion_model->getAficion($nombre)==null) {
                $this->aficion_model->c($nombre);
                frame($this,'aficion/aficionCOK');
            }
            else {
                frame($this,'aficion/aficionCErrorAficionDuplicada');
            }
        }
        else {
            frame($this,'aficion/aficionCErrorAficionVacia');
        }
    }
    
    public function r() {
        $this->load->model('aficion_model');
        $datos['aficiones'] = $this->aficion_model->getAll();
        $datos['head']['title'] = 'Aficiones';
        
        frame($this,'aficion/r',$datos);
    }
}