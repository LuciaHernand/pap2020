<?php
class Persona_model extends CI_Model {
    public function getPersona($dni) {
        return R::find('persona','dni=?',[$dni]);
    }
    
    public function c($dni,$nombre,$idPais,$idAficiones) {
        $persona = R::dispense('persona');
        $persona->dni = $dni;
        $persona->nombre = $nombre;
        $pais = R::load('pais',$idPais);
        $persona->nace = $pais;
        
        R::store($persona);
        
        foreach ($idAficiones as $idAficion) {
            $aficion = R::load('aficion',$idAficion);
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = $aficion;
            R::store($gusto);
        }
    }
    
    public function getAll() {
        return R::findAll('persona');
    }
    
    
}