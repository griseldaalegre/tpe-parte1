<?php

class AuthHelper {
    
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($userDb) {
        AuthHelper::init();
        $_SESSION['USER_ROL'] = $userDb->rol;
        $_SESSION['USER_NAME'] = $userDb->nombre_usuario;
        $_SESSION['USER_ID'] = $userDb->id_usuarios; 
    }
    
    public static function logOut() {
        AuthHelper::init();
        session_destroy();
    }
    
    public static function verify() {
        AuthHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }
}
