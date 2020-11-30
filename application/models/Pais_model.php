<?php
class Pais_model extends CI_Model {
    public function c($nombre) {
        $pais = R::dispense('pais');
        $pais->nombre = $nombre;
        R::store($pais);
    }
    
    public function getPais($nombre) {
        return R::findOne('pais','nombre=?',[$nombre]);
    }

    public function getAll() {
        return R::findAll('pais');
    }
}
?>