<?php
class Persona_model extends CI_Model {

    public function getPersonaById($id) {
        return R::load('persona',$id);
    }
    
    public function getPersona($dni) {
        return R::find('persona','dni=?',[$dni]);
    }
    
    public function c($dni,$nombre,$idPais,$idAficiones) {
        if ($nombre == null || $dni== null || $idPais == null) {
            throw new Exception('El dni, nombre o país no pueden ser nulos');
        }
        
        if ($this->getPersona($dni) != null) {
            throw new Exception('DNI duplicado');
        }
        
        $persona = R::dispense('persona');
        $persona->dni = $dni;
        $persona->nombre = $nombre;
        R::store($persona);

        $pais = R::load('pais',$idPais);
        
        //$persona->nace = $pais;
        $pais->alias('nace')->xownPersonaList [] = $persona;
        R::store($pais);
        
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