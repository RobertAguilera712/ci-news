<?php

namespace App\Controllers;
use App\Models\Directorios;
use App\Models\Visita;

class Directorio extends BaseController
{
    public function index()
    {
        $directorioObj = new Directorios();
        $datos = $directorioObj->readDirectorio();
        
        $visita = new Visita();
        $visita->sumarVisita('Directorios');

        $mensaje=session('mensaje');

        return view('directorios', [ 'mensaje'=> $mensaje, 'datos'=>$datos]);
    }
}