<?php

namespace App\Controllers;

use App\Models\Grafica;
use App\Models\DatosGrafica;

class Graficas extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');

        $graficaObj = new Grafica();
        $graficas = $graficaObj->obtenerTodasGraficas();
        $datosGraObj = new DatosGrafica();

        for ($i=0; $i < count($graficas); $i++) { 
            $graficas[$i]["data"] = $datosGraObj->obtenerDatosGrafica( $graficas[$i]['id_grafica']);
        }

        $validation = \Config\Services::validation();

        return view('graficas_admin', [
            'validation' => $validation,
            'mensaje' => $mensaje, 'graficas' => $graficas,
        ]);
    }

    public function agregarDatosGrafica($id)
    {
        $mensaje = session('mensaje');

        $graficaObj = new Grafica();
        $grafica = $graficaObj->obtenerGraficaById($id);

        $validation = \Config\Services::validation();

        return view('agregar_datos_grafica', [
            'validation' => $validation,
            'mensaje' => $mensaje, 'grafica' => $grafica,
        ]);
    }

    public function crearGrafica()
    {

        $graficaObj = new Grafica();
        $tipo = $this->request->getPost('tipo');

        switch ($tipo) {
            case 'column':
                $titulo = $this->request->getPost('titulo');
                $leyenda_x = $this->request->getPost('leyenda_x');
                $leyenda_y = $this->request->getPost('leyenda_y');
                $estatus = $this->request->getPost('estatus');

                $grafica = $graficaObj->obtenerGraficaByNombre($titulo);


                if ($grafica == null) {
                    if ($this->validate('grafica')) {
                        $id = $graficaObj->insert(
                            [
                                'titulo' => $titulo,
                                'leyenda_x' => $leyenda_x,
                                'leyenda_y' => $leyenda_y,
                                'tipo' => $tipo,
                                'estatus' => $estatus,
                            ]
                        );

                        return redirect()->to(base_url('/graficas-admin/agregarDatosGrafica/' . $id))->with('mensaje', '1');
                    }
                    return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '3');
                }
                break;
            case 'area':
                $titulo = $this->request->getPost('titulo');
                $incluir_cero = $this->request->getPost('incluir_cero');
                $fecha_inicio = $this->request->getPost('fecha_inicio');
                $fecha_fin = $this->request->getPost('fecha_fin');
                $leyenda_y = $this->request->getPost('leyenda_y');
                $prefijo = $this->request->getPost('prefijo');
                $estatus = $this->request->getPost('estatus');

                $grafica = $graficaObj->obtenerGraficaByNombre($titulo);


                if ($grafica == null) {
                    if ($this->validate('grafica')) {
                        $id = $graficaObj->insert(
                            [
                                'titulo' => $titulo,
                                'leyenda_y' => $leyenda_y,
                                'prefijo' => $prefijo,
                                'tipo' => $tipo,
                                'incluir_cero' => $incluir_cero,
                                'fecha_inicio' => $fecha_inicio,
                                'fecha_fin' => $fecha_fin,
                                'estatus' => $estatus,
                            ]
                        );

                        return redirect()->to(base_url('/graficas-admin/agregarDatosGrafica/' . $id))->with('mensaje', '1');
                    }
                    return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '3');
                }
                break;
            case 'pie':
                $titulo = $this->request->getPost('titulo');
                $estatus = $this->request->getPost('estatus');

                $grafica = $graficaObj->obtenerGraficaByNombre($titulo);


                if ($grafica == null) {
                    if ($this->validate('grafica')) {
                        $id = $graficaObj->insert(
                            [
                                'titulo' => $titulo,
                                'tipo' => $tipo,
                                'estatus' => $estatus,
                            ]
                        );

                        return redirect()->to(base_url('/graficas-admin/agregarDatosGrafica/' . $id))->with('mensaje', '1');
                    }
                    return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '3');
                }
                break;
            case 'line':
                $titulo = $this->request->getPost('titulo');
                $leyenda_y = $this->request->getPost('leyenda_y');
                $estatus = $this->request->getPost('estatus');

                $grafica = $graficaObj->obtenerGraficaByNombre($titulo);


                if ($grafica == null) {
                    if ($this->validate('grafica')) {
                        $id = $graficaObj->insert(
                            [
                                'titulo' => $titulo,
                                'leyenda_y' => $leyenda_y,
                                'tipo' => $tipo,
                                'estatus' => $estatus,
                            ]
                        );

                        return redirect()->to(base_url('/graficas-admin/agregarDatosGrafica/' . $id))->with('mensaje', '1');
                    }
                    return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '3');
                }
                break;
        }




        return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '4');
    }


    public function importCsvToDb()
    {
        $id_grafica = $this->request->getPost('id_grafica');
        $tipo = $this->request->getPost('tipo');
        $input = $this->validate([
            'archivo' => 'uploaded[archivo]|max_size[archivo,2048]|ext_in[archivo,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data);
        } else {
            if ($file = $this->request->getFile('archivo')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/csvfile', $newName);
                    $file = fopen("../public/csvfile/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 2;
                    $csvArr = array();

                    if ($tipo === 'area') {
                        $numberOfFields = 3;
                        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $num = count($filedata);
                            if ($i > 0 && $num == $numberOfFields) {
                                $csvArr[$i]['id_grafica'] = $id_grafica;
                                $csvArr[$i]['dato_x_fecha'] = $filedata[0];
                                $csvArr[$i]['dato_y'] = $filedata[1];
                                $csvArr[$i]['label'] = $filedata[2];
                            }
                            $i++;
                        }
                    } else {
                        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $num = count($filedata);
                            if ($i > 0 && $num == $numberOfFields) {
                                $csvArr[$i]['id_grafica'] = $id_grafica;
                                $csvArr[$i]['dato_y'] = $filedata[0];
                                $csvArr[$i]['label'] = $filedata[1];
                            }
                            $i++;
                        }
                    }


                    fclose($file);
                    $count = 0;
                    foreach ($csvArr as $dato) {
                        $datosObj = new DatosGrafica();
                        if ($datosObj->guardarDato($dato)) {
                            $count++;
                        }
                    }
                    session()->setFlashdata('message', $count . ' datos agregados.');
                    session()->setFlashdata('alert-class', 'alert-success');
                    return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '5');
                } else {
                    return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '6');
                }
            } else {
                return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '7');
            }
        }
        return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '5');
    }

    public function editarGrafica($id)
    {
        $graficaObj = new Grafica();
        $grafica = $graficaObj->obtenerGraficaById($id);
        $mensaje=session('mensaje');

        return view('editar_grafica', ['mensaje'=>$mensaje, 'grafica'=>$grafica]);
    }
    
    public function editarDatosGrafica($id)
    {
        $graficaObj = new Grafica();
        $grafica = $graficaObj->obtenerGraficaById($id);
        $mensaje=session('mensaje');

        return view('editar_datos_grafica', ['mensaje'=>$mensaje, 'grafica'=>$grafica]);
    }

    public function actualizarGrafica(){

        $graficaObj = new Grafica();
        $tipo = $this->request->getPost('tipo');
        $id_grafica = $this->request->getPost('id_grafica');

        switch ($tipo) {
            case 'column':
                $titulo = $this->request->getPost('titulo');
                $leyenda_x = $this->request->getPost('leyenda_x');
                $leyenda_y = $this->request->getPost('leyenda_y');
                $estatus = $this->request->getPost('estatus');

                    if ($this->validate('grafica')) {
                        $datos=
                            [
                                'titulo' => $titulo,
                                'leyenda_x' => $leyenda_x,
                                'leyenda_y' => $leyenda_y,
                                'tipo' => $tipo,
                                'estatus' => $estatus,
                            ]
                        ;

                    }
                
                break;
            case 'area':
                $titulo = $this->request->getPost('titulo');
                $incluir_cero = $this->request->getPost('incluir_cero');
                $fecha_inicio = $this->request->getPost('fecha_inicio');
                $fecha_fin = $this->request->getPost('fecha_fin');
                $leyenda_y = $this->request->getPost('leyenda_y');
                $prefijo = $this->request->getPost('prefijo');
                $estatus = $this->request->getPost('estatus');

                    if ($this->validate('grafica')) {
                        $datos=
                            [
                                'titulo' => $titulo,
                                'leyenda_y' => $leyenda_y,
                                'prefijo' => $prefijo,
                                'tipo' => $tipo,
                                'incluir_cero' => $incluir_cero,
                                'fecha_inicio' => $fecha_inicio,
                                'fecha_fin' => $fecha_fin,
                                'estatus' => $estatus,
                            ]
                        ;

                       }
                
                break;
            case 'pie':
                $titulo = $this->request->getPost('titulo');
                $estatus = $this->request->getPost('estatus');

                    if ($this->validate('grafica')) {
                        $datos=
                            [
                                'titulo' => $titulo,
                                'tipo' => $tipo,
                                'estatus' => $estatus,
                            ]
                        ;

                        }
                
                break;
            case 'line':
                $titulo = $this->request->getPost('titulo');
                $leyenda_y = $this->request->getPost('leyenda_y');
                $estatus = $this->request->getPost('estatus');



                    if ($this->validate('grafica')) {
                        $datos=
                            [
                                'titulo' => $titulo,
                                'leyenda_y' => $leyenda_y,
                                'tipo' => $tipo,
                                'estatus' => $estatus,
                            ];
                        

                         }
                
                break;
        }
    
        if ($graficaObj->updateGrafica($id_grafica, $datos)) {
            return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '2');
        }else{
            return redirect()->to(('graficas-admin/editarGrafica/' . $id_grafica))->with('mensaje', '2');
        }
    }


    public function actualizarDatosGrafica(){
        $id = $this->request->getPost('id_grafica');
        $datosObj = new DatosGrafica();
        if($datosObj -> deleteDatosGrafica($id)){
            $this->importCsvToDb();
            return redirect()->to(base_url('/graficas-admin'))->with('mensaje', '8');
        }
        return redirect()->to(base_url('/graficas-admin/editarDatosGrafica/' . $id))->with('mensaje', '8');


    }



}
