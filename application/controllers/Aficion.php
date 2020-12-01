<?php

class Aficion extends CI_Controller
{

    function c()
    {
        $this->load->view('aficion/cGet');
    }

    function cPost()
    {
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $this->load->model('aficion_model');
        if ($nombre != null) {
            if ($this->aficion_model->getAficion($nombre)==null) {
                $this->aficion_model->c($nombre);
                $this->load->view('aficion/aficionCOK');
            }
            else {
                $this->load->view('aficion/aficionCErrorAficionDuplicada');
            }
        }
        else {
            $this->load->view('aficion/aficionCErrorAficionVacia');
        }
    }
    
    public function r() {
        $this->load->model('aficion_model');
        $datos['aficiones'] = $this->aficion_model->getAll();
        
        frame($this,'aficion/r',$datos);
    }
}