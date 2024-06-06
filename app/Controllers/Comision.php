<?php

namespace App\Controllers;
use App\Models\Comisiones;

class Comision extends BaseController
{
    public function index()
    {
        $comisionesObj = new Comisiones();
        $datos = $comisionesObj->readCom();
        
        $mensaje=session('mensaje');
        
        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('edit_comision', [ 'mensaje'=> $mensaje, 'datos'=>$datos]);
    }
}