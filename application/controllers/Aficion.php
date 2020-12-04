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
                header('Location:'.base_url().'aficion/r');
            }
            else {
                prg('nombre de afición duplicado','aficion/c','danger');
            }
        }
        else {
            prg('El nombre de afición no puede ser nulo','aficion/c','danger');
        }
    }
    
    public function r() {
        $this->load->model('aficion_model');
        $datos['aficiones'] = $this->aficion_model->getAll();
        $datos['head']['title'] = 'Aficiones';
        
        frame($this,'aficion/r',$datos);
    }
    
    public function u() {
        $idAficion = isset($_GET['idAficion'])?$_GET['idAficion']:null;
        $this->load->model('aficion_model');
        $datos['aficion'] = $this->aficion_model->getAficionById($idAficion);
        frame($this,'aficion/u',$datos);
    }
    
    public function uPost() {
        $id = isset($_POST['id'])?$_POST['id']:null;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        
        $this->load->model('pais_model');
        $this->pais_model->u($id,$nombre);
        
        redirect(base_url().'pais/r');
    }
}