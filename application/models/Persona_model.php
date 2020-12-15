<?php
class Persona_model extends CI_Model {

    public function login($dni,$passwordSinOfuscar) {
        $persona = R::findOne('persona','dni=?',[$dni]);
        
        if ($persona == null ) {
            throw new Exception('Usuario no existente');
        }
        
        if (!password_verify($passwordSinOfuscar, $persona->password)) {
            throw new Exception('Password incorrecto');
        }
        
        return $persona;
    }
    
    public function getPersonaById($id) {
        return R::load('persona',$id);
    }
    
    public function getPersona($dni) {
        return R::find('persona','dni=?',[$dni]);
    }
    
    public function c($dni,$nombre,$password,$idPais,$idAficiones,$nombreRol='usuario') {
        if ($nombre == null || $dni== null || $idPais == null) {
            throw new Exception('El dni, nombre o país no pueden ser nulos');
        }
        
        if ($this->getPersona($dni) != null) {
            throw new Exception('DNI duplicado');
        }
        
        $persona = R::dispense('persona');
        $persona->dni = $dni;
        $persona->nombre = $nombre;
        $persona->password = password_hash($password,PASSWORD_DEFAULT);
        R::store($persona);
    
        $rol = R::findOne('rol','nombre=?',[$nombreRol]);
        
        // Este trozo de código, mejor hard-coded en la Base de Datos
        if ($rol==null){
            $rol = R::dispense('rol');
            $rol->nombre = $nombreRol;
            R::store($rol);
        }
        
        $persona->rol = $rol;
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

    
    public function u($id,$dni,$nombre,$idPais,$idAficiones) {
        
        if ($nombre == null || $dni== null || $idPais == null) {
            throw new Exception('El dni, nombre o país no pueden ser nulos');
        }
        
        if ($this->getPersona($dni) != null && $this->getPersonaById($id)->dni != $dni) {
            throw new Exception('DNI duplicado');
        }
        
        $persona = R::load('persona',$id);
        
        $persona->dni = $dni;
        $persona->nombre = $nombre;
        $persona->nace = null;
        R::store($persona);
        
        $pais = R::load('pais',$idPais);
        
        //unset( $persona-> fetchAs('pais') -> nace-> alias('nace') -> xownPersonaList [$persona->id] );
        
        $pais->alias('nace')->xownPersonaList [] = $persona;
        R::store($pais);
        
        //$idAficiones
        $idAficionesComunes = [];
        foreach ($persona->ownGustoList as $gustoActual) {
            if (in_array($gustoActual->aficion->id,$idAficiones)) { // Gusto que tengo que seguir teniendo
                $idAficionesComunes[] = $gustoActual->aficion->id;
            }
            else {
                R::store($persona); // PARCHE
                R::trash($gustoActual);
            }
        }
        
        foreach ($idAficiones as $idAficionATener) {
            if (!in_array($idAficionATener,$idAficionesComunes)) {
                $nuevoGusto = R::dispense('gusto');
                $nuevoGusto->persona = $persona;
                $nuevoGusto->aficion = R::load('aficion',$idAficionATener);
                R::store($persona); //PARCHE
                R::store($nuevoGusto);
            }
        }
        
        
        
    }
    
    public function getAll() {
        return R::findAll('persona');
    }
    
    
}