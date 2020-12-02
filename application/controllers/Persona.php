<?php

class Persona extends CI_Controller
{

    public function c()
    {
        $this->load->model('pais_model');
        $this->load->model('aficion_model');
        $datos['paises'] = $this->pais_model->getAll();
        $datos['aficiones'] = $this->aficion_model->getAll();
        frame($this,'persona/cGet',$datos);
    }

    public function cPost()
    {
        
        $dni = (isset($_POST['dni']) && $_POST['dni'] != '') ? $_POST['dni'] : null;
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $idPais= (isset($_POST['idPais']) && $_POST['idPais'] != '') ? $_POST['idPais'] : null;
        $idAficiones = (isset($_POST['idAficiones']) && $_POST['idAficiones'] != '') ? $_POST['idAficiones'] : [];
        
        $this->load->model('persona_model');

        if ($nombre != null && $dni!= null && $idPais != null) {

            if ($this->persona_model->getPersona($dni) == null) {
                $this->persona_model->c($dni,$nombre,$idPais,$idAficiones); //VAMOS POR AQUI
                frame($this,'persona/personaCOK');
            }
            else {
                frame($this,'persona/personaCErrorDniDuplicado');
            }
        }
        else {
            frame($this,'persona/personaCErrorDatosInsuficientes');
        }
        
    }

    public function r() {
        $this->load->model('persona_model');
        $datos['personas'] = $this->persona_model->getAll();
        frame($this,'persona/r',$datos);
      
    }
}