<?php

namespace App\Controllers;
use App\Models\Temas;
use App\Models\Visita;

class Temass extends BaseController
{
    public function index()
    {
        $temasObj = new Temas();
        $tema = $temasObj->obtenerTemasActivosByDescripcion();
        $temaD = $temasObj->obtenerTemasActivosByDescripcion();
        $visita = new Visita();
        $visita->sumarVisita('Temas de Interés');
        return view('temas', ['tema'=> $tema, 'temaD' => $temaD]);
    }

    public function search()
    {
        $tema = $this->request->getPost('descripcionTema');
        $temasObj = new Temas();
        $buscarTema = $temasObj->ByTema($tema);
   
            $datosT = $temasObj->obtenerTemasActivosByDescripcion();

        if($tema ==!null){
            if($buscarTema ==!null){
                return view('temas_search', ['buscarTema' => $buscarTema, 'datosT' => $datosT]);
            }
            return redirect()->to(base_url('temasView'))->with('mensaje', '3');
           
        }
        return redirect()->to(base_url('temasView'))->with('mensaje', '2');
            
    }
}
