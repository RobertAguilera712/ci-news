<?php

namespace App\Controllers;
use App\Models\Investigaciones;

class Centro_documental_admin_edit extends BaseController
{
    public function index()
    {
        $status ='A';
        $investigacionObj = new Investigaciones();
        $mensaje=session('mensaje');
        $datos = $investigacionObj->obtenerTemaActivo();

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
        ];
        return view('estudios_admin_edit', ['mensaje'=> $mensaje, 'datos'=> $datos]);
    }
}