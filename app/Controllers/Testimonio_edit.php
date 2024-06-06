<?php

namespace App\Controllers;
use App\Models\Municipios;

class Testimonio_edit extends BaseController
{
    public function index()
    {
        $municipiosObj = new Municipios();
        $mensaje=session('mensaje');
        $datos = $municipiosObj->obtenerTestimoniosMunicipio();

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
        ];
        return view('edit_testimonio', ['mensaje'=> $mensaje, 'datos'=> $datos]);
    }
}