<?php

namespace App\Controllers;
use App\Models\Municipios;
use App\Models\Documentos;
use App\Models\CategoriasCendoc;
use App\Models\Estados;
use App\Models\Investigaciones;
use App\Models\Temas_investigacion;
use App\Models\Visita;

class EstadisticasIndicadores extends BaseController
{
    public function index()
    {
        // Centro Documental / CENDOC
        $documentosObj = new Documentos();
        $categoriaObj = new CategoriasCendoc();

        $categorias = $categoriaObj->obtenerCategoriaActivo();
        $documentos = $documentosObj->obtenerDocsYCategorias();

        // Investigaciones
        $status='A';
        $temasObj = new Temas_investigacion();

        $temas = $temasObj->obtenerTemasActivosByDescripcion();

        $municipioObj = new Municipios();
        $mensaje=session('mensaje');
        $municipio = $municipioObj->obtenerTodosMunicipios();
        $estadoObj = new Estados();
        $estados = $estadoObj->obtenerTodosEstados();

        $visita = new Visita();
        $visita->sumarVisita('Estadísticas, Estudios e Indicadores');
       
        return view('estadisticas e indicadores', ['categorias' =>$categorias, 'municipio'=>$municipio,  'estados'=>$estados, 
         'itemsTabla' => $temas, 'documentos'=>$documentos, 'mensaje'=> $mensaje]);
    }


  

}