<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        echo view('index');
    }

    public function contacto()
    {
        echo view('contacto');
    }

    public function comercializacion()
    {
        echo view('comercializacion');
    }
    public function quienes_somos()
    {
        echo view('quienes-somos');
    }
    public function terminos_usos()
    {
        echo view('terminos-usos');
    }

    public function productos()
    {
        echo view('construccion');
    }
}