<?php

namespace App\Controllers;
use App\Models\Municipios;

class EstadisticasIndicadoresAdmin extends BaseController
{
    public function index()
    {
        $municipioObj = new Municipios();
        $mensaje=session('mensaje');
        $municipio = $municipioObj->obtenerTodosMunicipios();
        
       
        return view('estadisticas e indicadores admin', [ 'mensaje'=> $mensaje, 'municipio'=>$municipio]);
    }

}