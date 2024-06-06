<?php

namespace App\Controllers;

use App\Models\Estados;
use App\Models\ArchivosEstados;

class EstadosAdmin extends BaseController
{
    public function index()
    {
        $estadoObj = new Estados();
        $mensaje = session('mensaje');
        $estado = $estadoObj->obtenerTodosEstados();


        return view('estados_admin', ['mensaje' => $mensaje, 'estado' => $estado]);
    }

    public function estadisticas()
    {
        $estadoObj = new Estados();
        $mensaje = session('mensaje');
        $estado = $estadoObj->obtenerTodosEstados();
        $archivoObj = new ArchivosEstados();
        $archivos = $archivoObj->obtenerArchivos();


        return view('estadisticasAdmin', ['mensaje' => $mensaje, 'estado' => $estado, 'archivos' => $archivos]);
    }

    public function createEstadoArchivo()
    {

        $ArchivoObj = new ArchivosEstados();


        $nombre = $this->request->getPost('nombre');
        $fecha = $this->request->getPost('fecha');
        $tipo = $this->request->getPost('tipo_archivo');
        $categoria = $this->request->getPost('categoria_archivo');
        $palabras = $this->request->getPost('palabras_clave');
        $id_estado = $this->request->getPost('id_estado');
        $archivo = $this->request->getPost('archivo');
        $estatus_archivo = $this->request->getPost('estatus_archivo');


        if ($this->validate('archivo_estado')) {
            $id = $ArchivoObj->insert(
                [
                    'nombre_archivo' => $nombre,
                    'fecha_archivo' => $fecha,
                    'tipo_archivo' => $tipo,
                    'categoria_archivo' => $categoria,
                    'palabras_clave' => $palabras,
                    'id_estado' => $id_estado,
                    'archivo' => $archivo,
                    'estatus_archivo' => $estatus_archivo
                ]
            );

            $res = $this->_uploadArchivo($id, $id_estado);

            if ($res == null) {
                return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '2');
            } else if ($res == !null) {
                return redirect()->to(base_url('/estados-admin/editArchivo/' . $id))->with('mensaje', '4');
            }

            return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '2');
        }
        return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '3');
    }


    public function editArchivo($id)
    {
        $archivoObj = new ArchivosEstados();
        $estadoObj = new Estados();
        $datos = $archivoObj->obtenerInfoArchivo($id);
        $estados = $estadoObj->findAll();
        $mensaje = session('mensaje');
        $investigacion = $archivoObj->asObject()->find($id);

        if ($investigacion == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_archivoestado', ['validation' => $validation, 'investigacion' => $investigacion, 'datos' => $datos, 'mensaje' => $mensaje, 'estados' => $estados]);
    }

    public function updateEstadoArchivo($id)
    {

        $nombre = $this->request->getPost('nombre_archivo');
        $fecha = $this->request->getPost('fecha_archivo');
        $tipo = $this->request->getPost('tipo_archivo');
        $categoria = $this->request->getPost('categoria_archivo');
        $palabras = $this->request->getPost('palabras_clave');
        $id_estado = $this->request->getPost('id_estado');
        $archivo = $this->request->getPost('archivo');
        $estatus_archivo = $this->request->getPost('estatus_archivo');

        if ($archivo == !null) {
            $datos = [
                // "fecha_modificacion" => date(DB_FORMAT_DATE),
                'nombre_archivo' => $nombre,
                'fecha_archivo' => $fecha,
                'tipo_archivo' => $tipo,
                'categoria_archivo' => $categoria,
                'palabras_clave' => $palabras,
                'id_estado' => $id_estado,
                'archivo' => $archivo,
                'estatus_archivo' => $estatus_archivo
            ];
        } else {
            $datos = [
                // "fecha_modificacion" => date(DB_FORMAT_DATE),
                'nombre_archivo' => $nombre,
                'fecha_archivo' => $fecha,
                'tipo_archivo' => $tipo,
                'categoria_archivo' => $categoria,
                'palabras_clave' => $palabras,
                'id_estado' => $id_estado,
                'estatus_archivo' => $estatus_archivo
            ];
        }


        $id = $_POST['id_archivo'];

        $archivoObj = new ArchivosEstados();

        $respuesta = $archivoObj->updateArchivo($id, $datos);

        $res = $this->_uploadArchivo($id, $id_estado);


        if ($res == null) {
            return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '1');
        } else if ($res == !null) {
            return redirect()->to(base_url('/estados-admin/editArchivo/' . $id))->with('mensaje', '3');
        }
    }

    private function _uploadArchivo($id, $estado)
    {
        if ($imageFile = $this->request->getFile('archivo')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                //validaciones 
                $validated = $this->validate([
                    'archivo' => [
                        'uploaded[archivo]',
                        'ext_in[archivo,docx,pdf]'
                    ]
                ]);
                if ($validated) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/documentos_estados/' . $estado, $newName);

                    $investigacionObj = new ArchivosEstados();
                    $respuesta = $investigacionObj->updateArchivo($id, [
                        'archivo' => $newName
                    ]);
                    return null;
                } else {
                    return  $this->validator->getError('archivo');
                }
            }
        }
    }



    public function ByNombre()
    {
        $text = $this->request->getPost('nombre');
        $tema = $this->request->getPost('id_estado');

        $archivoObj = new ArchivosEstados();
        $estadoObj = new Estados();
        $estadosObj = new Estados();
        $temasObj = new Estados();
        $investigacionObj = new ArchivosEstados();

        $archivosNombre = $archivoObj->ByNombre($text);
        $archivosEstado = $archivoObj->ByTema($tema);

        $estados = $estadoObj->obtenerEstadoActivo();
        $estado = $estadosObj->obtenerTodosEstados();

        $mensaje = session('mensaje');

        $status = 'A';
        $temas = $temasObj->obtenerTemasActivosByDescripcion();
        $investigaciones = $investigacionObj->where('estatus', $status)->obtenerTemasInvestigacionesActivos();

        if ($text == !null) {

            if ($archivosNombre == !null) {
                return view('estados_admin', [
                    'investigaciones' => $investigaciones, 'itemsTabla' => $temas,
                    'mensaje' => $mensaje, 'estado' => $estado, 'documentos' => $archivosNombre, 'categorias' => $estados
                ]);
            }
            return redirect()->to(base_url('estados_admin'))->with('mensaje', '1');
        } else if ($tema == !null) {
            if ($archivosEstado == !null) {
                return view('estados_admin', [
                    'investigaciones' => $investigaciones, 'itemsTabla' => $temas,
                    'mensaje' => $mensaje, 'estado' => $estado, 'documentos' => $archivosEstado, 'categorias' => $estados
                ]);
            }
            return redirect()->to(base_url('estados_admin'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('estados_admin'))->with('mensaje', '2');
    }

    public function edit($id)
    {
        $estadosObj = new Estados();
        $data = ["id_estado" => $id];
        $datos = $estadosObj->ObtenerEstadosArchivo($data);
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $estado = $estadosObj->asObject()->find($id);

        if ($estado == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_estadoCendoc', [
            'validation' => $validation, 'categoria' => $estado,
            'datos' => $datos, 'mensaje' => $mensaje
        ]);
    }

    public function createEstado()
    {

        $estadosObj = new Estados();

        $estatus_estado = $this->request->getPost('estatus_estado');
        $nombre_estado = $this->request->getPost('nombre_estado');


        if ($this->validate('estado')) {
            $id = $estadosObj->insert(
                [
                    'nombre_estado' => $nombre_estado,
                    'estatus_estado' => $estatus_estado,
                ]
            );
        }
        return redirect()->to(base_url('/estados-admin'))->with('mensaje', '2');
    }

    public function updateEstado($id)
    {

        $datos = [
            // "fecha_modificacion" => date(DB_FORMAT_DATE),
            "nombre_estado" => $_POST['nombre_estado'],
            "estatus_estado" => $_POST['estatus_estado']
        ];

        $id = $_POST['id_estado'];

        $estadoObj = new Estados();

        $respuesta = $estadoObj->updateEstado($id, $datos);
        return redirect()->to(base_url('/estados-admin'))->with('mensaje', '6');
    }
}
