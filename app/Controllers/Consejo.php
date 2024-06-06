<?php

namespace App\Controllers;
use App\Models\General;
use App\Models\PdfConsejo;
use App\Models\IntegrantesConsejo;
use App\Models\Visita;

class Consejo extends BaseController
{
    public function index()
    {
        $generales = new General();
        $generalesPDF = new PdfConsejo();
        $integranteObj= new IntegrantesConsejo();

        $mensaje=session('mensaje');
        
        $general = $generales->getGeneral();
        $generalPDF = $generalesPDF->obtenerPdfsActivos();
        $integrantes = $integranteObj->obtenerIntegrantesActivos();

        $visita = new Visita();
        $visita->sumarVisita('Sistema JuventudEsGto');

        return view('consejo', [ 'mensaje'=> $mensaje,'generalPDF'=>$generalPDF, 'general'=>$general, 'integrantes'=>$integrantes]);
    }
}