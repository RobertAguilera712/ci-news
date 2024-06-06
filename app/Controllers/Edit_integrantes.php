<?php

namespace App\Controllers;
use App\Models\Investigadores;

class Edit_integrantes extends BaseController
{
    public function index()
    {
        $investigadoresObj = new Investigadores();
        $datos = $investigadoresObj->readInv();
        
        $mensaje=session('mensaje');
        
        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('edit_integrante', [ 'mensaje'=> $mensaje, 'datos'=>$datos]);
    }
}