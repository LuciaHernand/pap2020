<?php
class Persona_model extends CI_Model {
    public function getPersona($dni) {
        return R::find('persona','dni=?',[$dni]);
    }
}