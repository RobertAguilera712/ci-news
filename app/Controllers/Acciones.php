<?php

namespace App\Controllers;
use App\Models\Municipios;
use App\Models\Propuesta;

class Acciones extends BaseController
{
    public function index()
    {
        
        $municipiosObj = new Municipios();
        $municipios = $municipiosObj->obtenerTodosMunicipios();
        $mensaje=session('mensaje');
        return view('propuesta_accion', [ 'mensaje'=> $mensaje, 'municipios' => $municipios]);
    }

    public function create(){

        $propuestaObj = new Propuesta();

        
        $nombre = $this->request->getPost('nombre');
        $sexo = $this->request->getPost('sexo');
        $edad = $this->request->getPost('edad');
        $actividad = $this->request->getPost('actividad');
        $correo = $this->request->getPost('correo');
        $municipio = $this->request->getPost('municipio');
        $zona = $this->request->getPost('zona');
        $detalle = $this->request->getPost('detalle');
        $justificacion = $this->request->getPost('justificacion');
        $necesidades = $this->request->getPost('necesidades');
        
         $id = $propuestaObj->insert(
            [
            'nombreC' => $nombre,
            'sexo' => $sexo,
            'edad' => $edad,
            'actividad' => $actividad,
            'correo' => $correo,
            'id_municipio' => $municipio,
            'zona' => $zona,
            'detalle' => $detalle,
            'justificacion' => $justificacion,
            'necesidades' => $necesidades
            ]
        );

     return redirect()->to(base_url('/accion'))->with('mensaje', '1');
    }

    public function contacto(){

        $propuestaObj = new Propuesta();

        
        $nombre = $this->request->getPost('nombre');
        $sexo = $this->request->getPost('sexo');
        $edad = $this->request->getPost('edad');
        $actividad = $this->request->getPost('actividad');
        $correo = $this->request->getPost('correo');
        $municipio = $this->request->getPost('municipio');
        $detalle = $this->request->getPost('detalle');
        if($nombre==null){
            $nombre = '';
        }
        $id = $propuestaObj->insert(
            [
            'nombreC' => $nombre,
            'sexo' => $sexo,
            'edad' => $edad,
            'actividad' => $actividad,
            'correo' => $correo,
            'id_municipio' => $municipio,
            'zona' => '',
            'detalle' => $detalle,
            'justificacion' => '',
            'necesidades' => ''
            ]
        );

     return redirect()->to(base_url('/index'))->with('mensaje', '1');
    }

         
}