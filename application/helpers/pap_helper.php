<?php
/**
 * 
 * @param string $rol El rol a verificar. Puede ser 'anon','usuario' o 'admin'
 * @return true si el rol coincide con el del usuario actual y false en caso contrario
 */
function rolOK($rol) {
    if (session_status () == PHP_SESSION_NONE) {session_start ();}
    $sol = false;
    
    if ($rol == 'usuario' && isset($_SESSION['usuario'])) {
        $sol = true;
    }

    if ($rol == 'admin' && isset($_SESSION['usuario']) && $_SESSION['usuario']->rol->nombre == 'admin') {
        $sol = true;
    }
    
    if ($rol=='anon') {
        $sol = true;
    }
    
    return $sol;
}
?>