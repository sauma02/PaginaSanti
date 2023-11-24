<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/home/index.php';
    }

    public function about()
    {
        // load views
        require APP . 'view/home/about.php';
    }
    public function registrarMascotas(){
        //Load views
        require APP . 'view/mascotas/registrarMascota.php';
    }
    public function errorMascotaLogin(){
        //Load views
        require APP . 'view/home/errorMascotaLogin.php';
    }
    public function volverAdmin(){
        require APP . 'view/home/indexAdmin.php';
    }
    public function volverUsuario(){
        require APP . 'view/home/indexUsuario.php';
    }
}
