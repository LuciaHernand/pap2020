<?php

class Pais extends CI_Controller
{

    public function c()
    {
        if (!rolOK('usuario')) {
            show_404();
        }
        frame($this,'pais/cGet');
    }

    public function cPost()
    {
        if (!rolOK('usuario')) {
            prg('Privilegios insuficientes','','danger');
        }
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
    
    public function dPost() {
        if (!rolOK('admin')) {
            show_404();
        }
        $idPais = isset($_POST['idPais'])?$_POST['idPais']:null;
        $this->load->model('pais_model');
        $this->pais_model->d($idPais);
        redirect(base_url().'pais/r');
    }
    
    public function u() {
        if (!rolOK('usuario')) {
            show_404();
        }
        $idPais = isset($_GET['idPais'])?$_GET['idPais']:null;
        $this->load->model('pais_model');
        $datos['pais'] = $this->pais_model->getPaisById($idPais);
        frame($this,'pais/u',$datos);
    }
    
    public function uPost() {
        if (!rolOK('usuario')) {
            show_404();
        }
        $id = isset($_POST['id'])?$_POST['id']:null;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        
        $this->load->model('pais_model');
        $this->pais_model->u($id,$nombre);
        
        redirect(base_url().'pais/r');
    }
    
}