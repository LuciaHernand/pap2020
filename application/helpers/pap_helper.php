<?php
/**
 * 
 * @param string $rol El rol a verificar. Puede ser 'anonymous','usuario'
 * @return true si el rol coincide con el del usuario actual y false en caso contrario
 */
function rolOK($rol) {
    if (session_status () == PHP_SESSION_NONE) {session_start ();}
    $sol = false;
    
    if ($rol == 'usuario' && isset($_SESSION['usuario'])) {
        $sol = true;
    }
    
    if ($rol=='anonymous') {
        $sol = true;
    }
    
    return $sol;
}
?>