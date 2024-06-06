<?php

namespace App\Controllers;

use App\Models\Archivos;
use App\Models\ArchivosEstados;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Visita;

class Estadisticas extends BaseController
{
    public function index($id)
    {
        $municipioObj = new Municipios();

        $data = ["id_municipio" =>$id];
        $datos = $municipioObj->obtenerEstadistica($data);
        $estadistica = $municipioObj->asObject()->find($id);
        $municipio = $municipioObj->obtenerTodosMunicipios();
        
        $mensaje=session('mensaje');

        $visita = new Visita();
        $visita->sumarVisita('Estadísticas, Estudios e Indicadores');
       
        return view('estadisticas', [ 'mensaje'=> $mensaje, 'estadistica'=>$estadistica, 
        'datos'=>$datos, 'municipio'=>$municipio]);
    }

    public function municipio($id)
    {
        $municipioObj = new Municipios();
        $archivoObj = new Archivos();

        $data = ["id_municipio" =>$id];
        $datos = $municipioObj->obtenerEstadistica($data);
        $estadistica = $municipioObj->asObject()->find($id);
        $municipio = $municipioObj->obtenerMunicipio($id);
        $municipios = $municipioObj->obtenerTodosMunicipios();
        $archivos = $archivoObj->obtenerArchivosDeMunicipio($data);
        
        $mensaje=session('mensaje');
       
        return view('estadisticasMunicipio', [ 'mensaje'=> $mensaje, 'estadistica'=>$estadistica, 
        'datos'=>$datos, 'idMunicipio'=> $id,'municipio'=>$municipio, 'municipios'=>$municipios, 'archivos'=>$archivos]);
    }

    public function estado($id)
    {
        $estadoObj = new Estados();
        $archivoObj = new ArchivosEstados();

        $data = ["id_estado" =>$id];
        $datos = $estadoObj->obtenerEstadistica($data);
        $estadistica = $estadoObj->asObject()->find($id);
        $estado = $estadoObj->obtenerEstado($id);
        $estados = $estadoObj->obtenerTodosEstados();
        $archivos = $archivoObj->obtenerArchivosDeEstado($data);
        
        $mensaje=session('mensaje');
       
        return view('estadisticasEstado', [ 'mensaje'=> $mensaje, 'estadistica'=>$estadistica, 
        'datos'=>$datos, 'idEstado'=> $id,'estado'=>$estado, 'estados'=>$estados, 'archivos'=>$archivos]);
    }
   
    public function categoria($categoria)
    {
        $archivoObj = new Archivos();
        $municipioObj = new Municipios();

        $archivos = $archivoObj->obtenerArchivosPorCategoria($categoria);

        $municipios = $municipioObj->obtenerTodosMunicipios();
        
        $mensaje=session('mensaje');
       
        return view('estadisticasCategoria', [ 'mensaje'=> $mensaje, 'categoria'=>$categoria, 'municipios'=>$municipios, 'archivos'=>$archivos]);
    }
    
    public function busqueda()
    {
        $archivoObj = new Archivos();
        $municipioObj = new Municipios();

        $texto = $_POST['texto'];

        $archivos = $archivoObj->obtenerArchivosBusqueda($texto);

        $municipios = $municipioObj->obtenerTodosMunicipios();
        
        $mensaje=session('mensaje');
       
        return view('estadisticasBusqueda', [ 'mensaje'=> $mensaje, 'texto'=>$texto, 'municipios'=>$municipios, 'archivos'=>$archivos]);
    }

}