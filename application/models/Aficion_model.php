<?php
class Aficion_model extends CI_Model {
    function c($nombre) {
        if ($nombre == null) {
            throw new Exception('El nombre de la afición no puede ser nulo');
        }
        
        if (R::findOne('aficion','nombre=?',[$nombre]) != null) {
            throw new Exception("Nombre de afición ($nombre) ya está registrado");
        }
        
        $aficion = R::dispense('aficion');
        $aficion->nombre = $nombre;
        R::store($aficion);
    }
    
    function getAficion($nombre) {
        return R::findOne('aficion','nombre=?',[$nombre]);
    }
    
    public function getAll() {
        return R::findAll('aficion');
    }
}
?>