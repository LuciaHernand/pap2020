<?php
class Pais_model extends CI_Model {
    public function c($nombre) {
        $pais = R::dispense('pais');
        $pais->nombre = $nombre;
        R::store($pais);
        return $pais;
    }
    
    public function getPais($nombre) {
        return R::findOne('pais','nombre=?',[$nombre]);
    }
    
    public function getPaisById($idPais) {
        return R::load('pais',$idPais);
    }

    public function getAll() {
        return R::findAll('pais');
    }
    
    public function d($idPais) {
        R::trash(R::load('pais',$idPais));
    }
    
    public function u($id,$nombre) {
        $pais = R::load('pais',$id);
        $pais->nombre = $nombre;
        R::store($pais);
    }
}
?>