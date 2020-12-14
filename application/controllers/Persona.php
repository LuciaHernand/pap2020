<?php

class Persona extends CI_Controller
{

    public function login()
    {
        frame($this, 'persona/login');
    }
    
    public function loginPost()
    {
        $dni = (isset($_POST['dni']) && $_POST['dni'] != '') ? $_POST['dni'] : null;
        $password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : null;

        $this->load->model('persona_model');
        try {
            $persona = $this->persona_model->login($dni, $password);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['usuario'] =  $persona;
            
            redirect(base_url());
        } catch (Exception $e) {
            prg('Datos de login incorrectos', 'persona/login', 'danger');
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }
        prg('Hasta la próxima');
    }
    
    public function u()
    {
        $idPersona = isset($_GET['idPersona']) ? $_GET['idPersona'] : null;

        $this->load->model('pais_model');
        $this->load->model('aficion_model');
        $this->load->model('persona_model');

        $datos['paises'] = $this->pais_model->getAll();
        $datos['aficiones'] = $this->aficion_model->getAll();
        $datos['persona'] = $this->persona_model->getPersonaById($idPersona);

        frame($this, 'persona/u', $datos);
    }

    public function uPost()
    {
        $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : null;
        $dni = (isset($_POST['dni']) && $_POST['dni'] != '') ? $_POST['dni'] : null;
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $idPais = (isset($_POST['idPais']) && $_POST['idPais'] != '') ? $_POST['idPais'] : null;
        $idAficiones = (isset($_POST['idAficiones']) && $_POST['idAficiones'] != '') ? $_POST['idAficiones'] : [];

        $this->load->model('persona_model');

        try {
            $this->persona_model->u($id, $dni, $nombre, $idPais, $idAficiones); // VAMOS POR AQUI
            redirect(base_url() . 'persona/r');
        } catch (Exception $e) {
            prg($e->getMessage(), 'persona/u?id=' . $id, 'danger');
        }
    }

    public function c()
    {
        $this->load->model('pais_model');
        $this->load->model('aficion_model');
        $datos['paises'] = $this->pais_model->getAll();
        $datos['aficiones'] = $this->aficion_model->getAll();
        frame($this, 'persona/cGet', $datos);
    }

    public function cPost()
    {
        $dni = (isset($_POST['dni']) && $_POST['dni'] != '') ? $_POST['dni'] : null;
        $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != '') ? $_POST['nombre'] : null;
        $password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : null;
        $idPais = (isset($_POST['idPais']) && $_POST['idPais'] != '') ? $_POST['idPais'] : null;
        $idAficiones = (isset($_POST['idAficiones']) && $_POST['idAficiones'] != '') ? $_POST['idAficiones'] : [];

        $this->load->model('persona_model');

        try {
            $this->persona_model->c($dni, $nombre, $password, $idPais, $idAficiones); // VAMOS POR AQUI
            redirect(base_url() . 'persona/r');
        } catch (Exception $e) {
            prg($e->getMessage(), 'persona/c', 'danger');
        }
    }

    public function r()
    {
        $this->load->model('persona_model');
        $datos['personas'] = $this->persona_model->getAll();
        frame($this, 'persona/r', $datos);
    }
}