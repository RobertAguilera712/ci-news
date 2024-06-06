<?php

namespace App\Controllers;
use App\Models\Investigadores;
use App\Models\Objetivos;
use App\Models\Comisiones;
use App\Models\Visita;

class Red_Investigadores extends BaseController
{
    public function index()
    {
        $status='A';
        $investigadoresObj = new Investigadores();
        $objetivosObj = new Objetivos();
        $comisionesObj = new Comisiones();

        $objetivos = $objetivosObj->where('estatus', $status)->findAll();
        $comisiones = $comisionesObj->where('estatus', $status)->findAll();
        $datos = $investigadoresObj->where('estatus', $status)->findAll();

        $visita = new Visita();
        $visita->sumarVisita('Red de Investigadores');
        
        return view('red_investigadores', ['datos' => $datos, 'objetivos'=>$objetivos, 'comisiones'=>$comisiones]);
    }
}