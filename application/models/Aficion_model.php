<?php
class Aficion_model extends CI_Model {
    function c($nombre) {
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