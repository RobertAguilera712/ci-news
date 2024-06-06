<?php

namespace App\Controllers;

use App\Models\EncuestasCortas;
use App\Models\EncuestasLargas;
use App\Models\Pregunta;


class EncuestasAdmin extends BaseController
{
    public function index()
    {

        $encuestasLargasObj = new EncuestasLargas();
        $preguntaObj = new Pregunta();
        $encuestasObj = new EncuestasCortas();

        $encuestas = $encuestasObj->obtenerTodasPregunta();
        $pregunta = $preguntaObj->obtenerPreguntaActiva();
        $preguntas = $preguntaObj->obtenerTodasPreguntas();
        $encuestasL = $encuestasLargasObj->getEncuestasL();

        $mensaje = session('mensaje');
        return view('encuestas-admin', [
            'mensaje' => $mensaje, 'encuestas' => $encuestas,
            'pregunta' => $pregunta, 'preguntas' => $preguntas, 'encuestasL' => $encuestasL
        ]);
    }

    public function edit($id)
    {
        $encuestasObj = new EncuestasCortas();
        $preguntaObj = new Pregunta();

        $data = ["id_encuestasC" => $id];

        $datos = $encuestasObj->obtenerEncuesta($data);
        $preguntas = $preguntaObj->obtenerPreguntaActiva();

        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
        ];
        $encuesta = $encuestasObj->asObject()->find($id);

        if ($encuesta == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_encuesta', ['validation' => $validation, 'encuesta' => $encuesta, 'datos' => $datos, 'mensaje' => $mensaje, 'preguntas' => $preguntas]);
    }

    public function update($id)
    {

        $respuesta1 = $this->request->getPost('respuesta1');
        $respuesta2 = $this->request->getPost('respuesta2');
        $respuesta3 = $this->request->getPost('respuesta3');
        $respuesta4 = $this->request->getPost('respuesta4');
        $id_pregunta = $this->request->getPost('id_pregunta');
        $estatus = $this->request->getPost('estatus');
        $fecha_inicio = $this->request->getPost('fecha_inicio');
        $fecha_fin = $this->request->getPost('fecha_fin');
        $fi = date('Ymd', strtotime($fecha_inicio));
        $fin = date('Ymd', strtotime($fecha_fin));

        defined('DB_FORMAT_DATE') or define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

        if ($fecha_inicio !== '' && $fecha_fin !== '') {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "respuesta1" => $respuesta1,
                "respuesta2" => $respuesta2,
                "respuesta3" => $respuesta3,
                "respuesta4" => $respuesta4,
                "estatus" => $estatus,
                "fecha_inicio" => $fi,
                "fecha_fin" => $fin,
            ];
        } elseif ($fecha_inicio !== '') {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "respuesta1" => $respuesta1,
                "respuesta2" => $respuesta2,
                "respuesta3" => $respuesta3,
                "respuesta4" => $respuesta4,
                "estatus" => $estatus,
                "fecha_inicio" => $fi,
            ];
        } elseif ($fecha_fin !== '') {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "respuesta1" => $respuesta1,
                "respuesta2" => $respuesta2,
                "respuesta3" => $respuesta3,
                "respuesta4" => $respuesta4,
                "estatus" => $estatus,
                "fecha_fin" => $fin,
            ];
        } else {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "respuesta1" => $respuesta1,
                "respuesta2" => $respuesta2,
                "respuesta3" => $respuesta3,
                "respuesta4" => $respuesta4,
                "estatus" => $estatus
            ];
        }

        $id = $_POST['id_encuestasC'];

        $encuestasObj = new EncuestasCortas();

        $encuestasObj->updateEncuesta($id, $datos);

        return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '1');
    }


    public function create()
    {

        $encuestasObj = new EncuestasCortas();


        $respuesta1 = $this->request->getPost('respuesta1');
        $respuesta2 = $this->request->getPost('respuesta2');
        $respuesta3 = $this->request->getPost('respuesta3');
        $respuesta4 = $this->request->getPost('respuesta4');
        $id_pregunta = $this->request->getPost('id_pregunta');
        $estatus = $this->request->getPost('estatus');
        $fecha_inicio = $this->request->getPost('fecha_inicio');
        $fecha_fin = $this->request->getPost('fecha_fin');
        $fi = date('Ymd', strtotime($fecha_inicio));
        $fin = date('Ymd', strtotime($fecha_fin));

        if ($this->validate('encuesta')) {
            $id = $encuestasObj->insert(
                [
                    "id_pregunta" => $id_pregunta,
                    "respuesta1" => $respuesta1,
                    "respuesta2" => $respuesta2,
                    "respuesta3" => $respuesta3,
                    "respuesta4" => $respuesta4,
                    "estatus" => $estatus,
                    "fecha_inicio" => $fi,
                    "fecha_fin" => $fin
                ]
            );

            return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '2');
        }
        return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '3');
    }

    public function createP()
    {

        $preguntaObj = new Pregunta();


        $pregunta = $this->request->getPost('pregunta');
        $estatus = $this->request->getPost('estatusP');


        if ($this->validate('pregunta')) {
            $id = $preguntaObj->insert(
                [
                    "pregunta" => $pregunta,
                    "estatusP" => $estatus
                ]
            );

            return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '6');
        }
        return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '7');
    }
    public function editP($id)
    {
        $preguntaObj = new Pregunta();
        $data = ["id_pregunta" => $id];
        $datos = $preguntaObj->obtenerPreguntaSeleccionada($data);
        $mensaje = session('mensaje');
        $pregunta = $preguntaObj->asObject()->find($id);

        if ($pregunta == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_pregunta', ['validation' => $validation, 'pregunta' => $pregunta, 'datos' => $datos, 'mensaje' => $mensaje]);
    }

    public function updateP($id)
    {

        $pregunta = $this->request->getPost('pregunta');
        $estatus = $this->request->getPost('estatus');

        defined('DB_FORMAT_DATE') or define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

        $datos = [
            "fecha_modificacion" => date(DB_FORMAT_DATE),
            "pregunta" => $pregunta,
            "estatusP" => $estatus
        ];

        $id = $_POST['id_pregunta'];

        $preguntaObj = new Pregunta();

        $respuesta = $preguntaObj->updatePregunta($id, $datos);

        return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '5');
    }




    public function createL()
    {

        $encuestasObj = new EncuestasLargas();

        $descripcionL = $this->request->getPost('descripcionL');
        $fecha_inicioL = $this->request->getPost('fecha_inicioL');
        $fecha_finL = $this->request->getPost('fecha_finL');
        $estatusL = $this->request->getPost('estatusL');
        $fi = date('Ymd', strtotime($fecha_inicioL));
        $fin = date('Ymd', strtotime($fecha_finL));

        defined('DB_FORMAT_DATE') or define('DB_FORMAT_DATE', 'd/m/Y h:i:s');


        if ($this->validate('encuestaLarga')) {
            $id = $encuestasObj->insert(
                [
                    "descripcion" => $descripcionL,
                    "enlace" =>  $_POST['enlace'],
                    "fecha_inicio" => $fi,
                    "fecha_fin" => $fin,
                    "estatus" => $estatusL,
                ]
            );
            $res = $this->_uploadImage($id);
            if ($res == null) {
                return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '10');
            } else if ($res == !null) {
                return redirect()->to(base_url('encuesta/editEncuestaLarga/' . $id))->with('mensaje', '1');
            }
        }
        return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '11');
    }


    public function editL($id)
    {
        $encuestaLargaObj  = new EncuestasLargas();
        $data = ["id_encuestasL" => $id];
        $datos = $encuestaLargaObj->obtenerEncuestaL($data);
        $mensaje = session('mensaje');
        $encuesta = $encuestaLargaObj->asObject()->find($id);

        if ($encuesta == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_encuestaL', ['validation' => $validation, 'encuesta' => $encuesta, 'datos' => $datos, 'mensaje' => $mensaje]);
    }


    public function updateL($id)
    {

        $descripcion = $this->request->getPost('descripcion');
        $enlace = $this->request->getPost('enlace');
        $fecha_inicio = $this->request->getPost('fecha_inicio');
        $imagen = $this->request->getPost('imagen');
        $fecha_fin = $this->request->getPost('fecha_fin');
        $estatus = $this->request->getPost('estatus');
        $fi = date('Ymd', strtotime($fecha_inicio));
        $fin = date('Ymd', strtotime($fecha_fin));
        defined('DB_FORMAT_DATE') or define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

        if ($imagen == !null && $fecha_inicio !== '' && $fecha_fin !== '') {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $descripcion,
                "enlace" => $enlace,
                "imagen" => $imagen,
                "fecha_inicio" => $fi,
                "fecha_fin" => $fin,
                "estatus" => $estatus
            ];
        } else if ($fecha_inicio !== '' && $imagen !== null) {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $descripcion,
                "enlace" => $enlace,
                "imagen" => $imagen,
                "fecha_inicio" => $fi,
                "estatus" => $estatus
            ];
        } else if ($fecha_fin !== '' && $imagen !== null) {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $descripcion,
                "enlace" => $enlace,
                "imagen" => $imagen,
                "fecha_fin" => $fin,
                "estatus" => $estatus
            ];
        } else if ($fecha_inicio !== '') {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $descripcion,
                "enlace" => $enlace,
                "fecha_inicio" => $fi,
                "estatus" => $estatus
            ];
        } else if ($fecha_fin !== '') {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $descripcion,
                "enlace" => $enlace,
                "fecha_fin" => $fin,
                "estatus" => $estatus
            ];
        }else{
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $descripcion,
                "enlace" => $enlace,
                "estatus" => $estatus
            ];
        }



        $id = $_POST['id_encuestasL'];

        $encuestasObj = new EncuestasLargas();

        $respuesta = $encuestasObj->updateEncuestasLargas($id, $datos);
        $res = $this->_uploadImage($id);
        if ($res == null) {
            return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '9');
        } else if ($res == !null) {
            return redirect()->to(base_url('encuesta/editEncuestaLarga/' . $id))->with('mensaje', '1');
        }


        return redirect()->to(base_url('/encuestas-admin'))->with('mensaje', '11');
    }

    private function _uploadImage($id)
    {
        if ($imageFile = $this->request->getFile('imagen')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                //validaciones 
                $validated = $this->validate([
                    'imagen' => [
                        'uploaded[imagen]',
                        'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png]'
                    ]
                ]);
                if ($validated) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'images_propuesta/' . $id, $newName);

                    $encuestaA = new EncuestasLargas();
                    $respuesta = $encuestaA->updateEncuestasLargas($id, [
                        'imagen' => $newName
                    ]);
                    return null;
                } else {
                    return  $this->validator->getError('imagen');
                }
            }
        }
    }
}
