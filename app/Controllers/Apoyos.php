<?php

namespace App\Controllers;
use App\Models\Temas;  
use App\Models\Dependencia;
use App\Models\Tipo_Apoyo;
use App\Models\Derecho_Social;
use App\Models\Apoyo;
use App\Models\Visita;

class Apoyos extends BaseController
{
    public function index()
    {

        $temasObj = new Temas();
        $dependenciaObj = new Dependencia();
        $derechoObj = new Derecho_Social();
        $tipoObj = new Tipo_Apoyo();
        $apoyoObj = new Apoyo();

        $datosT = $temasObj->obtenerTemasActivosByDescripcion();
        $datosD = $dependenciaObj->obtenerDependenciasActivas();
        $datosDS = $derechoObj->obtenerDerechosActivos();
        $datosTS = $tipoObj->obtenerApoyosActivos();
        $todosApoyoS = $apoyoObj->obtenerTodosApoyosB();

        $visita = new Visita();
        $visita->sumarVisita('Apoyos y Servicios');

        $mensaje=session('mensaje');

        return view('apoyos_servicios', [ 'mensaje'=> $mensaje, 'datosT' => $datosT, 'datosD' => $datosD, 'datosDS' => $datosDS, 'datosTS' => $datosTS, 'todosApoyoS'=>$todosApoyoS]);
    }

    public function Buscar(){

        $temasObj = new Temas();
        $dependenciaObj = new Dependencia();
        $derechoObj = new Derecho_Social();
        $tipoObj = new Tipo_Apoyo();
        $apoyoObj = new Apoyo();

        $derecho = $this->request->getPost('derecho');
        $tema = $this->request->getPost('tema');
        $dependencia = $this->request->getPost('dependencia');
        $apoyo = $this->request->getPost('apoyo');
        $año = $this->request->getPost('año');

        $buscarTema = $apoyoObj->ByTema($tema);
        $buscarDerecho = $apoyoObj->obtenerTodosApoyosByDerecho($derecho);
        $buscarDependencia = $apoyoObj->obtenerTodosApoyosByDependencia($dependencia);
        $buscarApoyo = $apoyoObj->obtenerTodosApoyosByTipo($apoyo);
        $buscarYear = $apoyoObj->obtenerTodosApoyosByYear($año);
        $datosT = $temasObj->obtenerTemasActivosByDescripcion();
        $datosD = $dependenciaObj->obtenerDependenciasActivas();
        $datosDS = $derechoObj->obtenerDerechosActivos();
        $datosTS = $tipoObj->obtenerApoyosActivos();


        if($derecho ==!null){ 
            if($buscarDerecho ==!null){
                return view('apoyos_derecho', ['buscarDerecho' => $buscarDerecho, 'datosT' => $datosT, 'datosD' => $datosD, 'datosDS' => $datosDS, 'datosTS' => $datosTS]);
            }
            return redirect()->to(base_url('apoyos_servicios'))->with('mensaje', '1');
            
        }else if($tema ==!null){
            if($buscarTema ==!null){
                return view('apoyos_tema', ['buscarTema' => $buscarTema, 'datosT' => $datosT,'datosD' => $datosD, 'datosDS' => $datosDS, 'datosTS' => $datosTS]);
            }
            return redirect()->to(base_url('apoyos_servicios'))->with('mensaje', '3');
           
        }else if($dependencia ==!null){
            if($buscarDependencia ==!null){
                return view('apoyos_dependencia', ['buscarDependencia' => $buscarDependencia, 'datosT' => $datosT, 'datosD' => $datosD, 'datosDS' => $datosDS, 'datosTS' => $datosTS]);
            }
            return redirect()->to(base_url('apoyos_servicios'))->with('mensaje', '2');
           
        }else if($apoyo ==!null){
            if($buscarApoyo ==!null){
                return view('apoyos_tipo_apoyo', ['buscarApoyo' => $buscarApoyo, 'datosT' => $datosT, 'datosD' => $datosD, 'datosDS' => $datosDS, 'datosTS' => $datosTS]);
            }
            return redirect()->to(base_url('apoyos_servicios'))->with('mensaje', '4');
           
        }else if($año ==!null){
            if($buscarYear ==!null){
                return view('apoyos_año', ['buscarYear' => $buscarYear, 'datosT' => $datosT, 'datosD' => $datosD, 'datosDS' => $datosDS, 'datosTS' => $datosTS]);
            }
            return redirect()->to(base_url('apoyos_servicios'))->with('mensaje', '6');
           
        }
        return redirect()->to(base_url('apoyos_servicios'))->with('mensaje', '5');
            
       
    }
         
}