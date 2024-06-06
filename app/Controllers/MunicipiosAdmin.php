<?php

namespace App\Controllers;

use App\Models\Municipios;
use App\Models\Archivos;
use App\Models\ArchivosEstados;
use App\Models\Estados;

class MunicipiosAdmin extends BaseController
{
    public function index()
    {
        $municipioObj = new Municipios();
        $mensaje = session('mensaje');
        $municipio = $municipioObj->obtenerTodosMunicipios();


        return view('municipios_admin', ['mensaje' => $mensaje, 'municipio' => $municipio]);
    }

    public function estadisticas()
    {
        $municipioObj = new Municipios();
        $mensaje = session('mensaje');
        $municipio = $municipioObj->obtenerTodosMunicipios();
        $archivoObj = new Archivos();
        $archivos = $archivoObj->obtenerArchivos();

        $estadoObj = new Estados();
        $estado = $estadoObj->obtenerTodosEstados();
        $archivoObj = new ArchivosEstados();
        $archivosEstado = $archivoObj->obtenerArchivos();


        return view('estadisticasAdmin', ['mensaje' => $mensaje, 'estado' => $estado, 'municipio' => $municipio, 'archivos' => $archivos, 'archivosEstado'=>$archivosEstado]);
    }

    public function createMunicipioArchivo()
    {

        $ArchivoObj = new Archivos();


        $nombre = $this->request->getPost('nombre');
        $fecha = $this->request->getPost('fecha');
        $tipo = $this->request->getPost('tipo_archivo');
        $categoria = $this->request->getPost('categoria_archivo');
        $palabras = $this->request->getPost('palabras_clave');
        $id_municipio = $this->request->getPost('id_municipio');
        $archivo = $this->request->getPost('archivo');
        $estatus_archivo = $this->request->getPost('estatus_archivo');


        if ($this->validate('archivo_municipio')) {
            $id = $ArchivoObj->insert(
                [
                    'nombre_archivo' => $nombre,
                    'fecha_archivo' => $fecha,
                    'tipo_archivo' => $tipo,
                    'categoria_archivo' => $categoria,
                    'palabras_clave' => $palabras,
                    'id_municipio' => $id_municipio,
                    'archivo' => $archivo,
                    'estatus_archivo' => $estatus_archivo
                ]
            );

            $res = $this->_uploadArchivo($id, $id_municipio);

            if ($res == null) {
                return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '2');
            } else if ($res == !null) {
                return redirect()->to(base_url('/municipios-admin/editArchivo/' . $id))->with('mensaje', '4');
            }

            return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '2');
        }
        return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '3');
    }


    public function editArchivo($id)
    {
        $archivoObj = new Archivos();
        $municipioObj = new Municipios();
        $datos = $archivoObj->obtenerInfoArchivo($id);
        $municipios = $municipioObj->findAll();
        $mensaje = session('mensaje');
        $investigacion = $archivoObj->asObject()->find($id);

        if ($investigacion == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_archivo', ['validation' => $validation, 'investigacion' => $investigacion, 'datos' => $datos, 'mensaje' => $mensaje, 'municipios' => $municipios]);
    }

    public function updateMunicipioArchivo($id)
    {

        $nombre = $this->request->getPost('nombre_archivo');
        $fecha = $this->request->getPost('fecha_archivo');
        $tipo = $this->request->getPost('tipo_archivo');
        $categoria = $this->request->getPost('categoria_archivo');
        $palabras = $this->request->getPost('palabras_clave');
        $id_municipio = $this->request->getPost('id_municipio');
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
                'id_municipio' => $id_municipio,
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
                'id_municipio' => $id_municipio,
                'estatus_archivo' => $estatus_archivo
            ];
        }


        $id = $_POST['id_archivo'];

        $archivoObj = new Archivos();

        $respuesta = $archivoObj->updateArchivo($id, $datos);

        $res = $this->_uploadArchivo($id, $id_municipio);


        if ($res == null) {
            return redirect()->to(base_url('/archivos-admin'))->with('mensaje', '1');
        } else if ($res == !null) {
            return redirect()->to(base_url('/municipios-admin/editArchivo/' . $id))->with('mensaje', '3');
        }
    }

    private function _uploadArchivo($id, $municipio)
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
                    $imageFile->move(ROOTPATH . 'public/documentos_municipios/' . $municipio, $newName);

                    $investigacionObj = new Archivos();
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
        $tema = $this->request->getPost('id_municipio');

        $archivoObj = new Archivos();
        $municipioObj = new Municipios();
        $municipiosObj = new Municipios();
        $temasObj = new Municipios();
        $investigacionObj = new Archivos();

        $archivosNombre = $archivoObj->ByNombre($text);
        $archivosMunicipio = $archivoObj->ByTema($tema);

        $municipios = $municipioObj->obtenerMunicipioActivo();
        $municipio = $municipiosObj->obtenerTodosMunicipios();

        $mensaje = session('mensaje');

        $status = 'A';
        $temas = $temasObj->obtenerTemasActivosByDescripcion();
        $investigaciones = $investigacionObj->where('estatus', $status)->obtenerTemasInvestigacionesActivos();

        if ($text == !null) {

            if ($archivosNombre == !null) {
                return view('municipios_admin', [
                    'investigaciones' => $investigaciones, 'itemsTabla' => $temas,
                    'mensaje' => $mensaje, 'municipio' => $municipio, 'documentos' => $archivosNombre, 'categorias' => $municipios
                ]);
            }
            return redirect()->to(base_url('municipios_admin'))->with('mensaje', '1');
        } else if ($tema == !null) {
            if ($archivosMunicipio == !null) {
                return view('municipios_admin', [
                    'investigaciones' => $investigaciones, 'itemsTabla' => $temas,
                    'mensaje' => $mensaje, 'municipio' => $municipio, 'documentos' => $archivosMunicipio, 'categorias' => $municipios
                ]);
            }
            return redirect()->to(base_url('municipios_admin'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('municipios_admin'))->with('mensaje', '2');
    }

    public function edit($id)
    {
        $municipiosObj = new Municipios();
        $data = ["id_municipio" => $id];
        $datos = $municipiosObj->ObtenerMunicipiosArchivo($data);
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $municipio = $municipiosObj->asObject()->find($id);

        if ($municipio == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_municipioCendoc', [
            'validation' => $validation, 'categoria' => $municipio,
            'datos' => $datos, 'mensaje' => $mensaje
        ]);
    }

    public function createMunicipio()
    {

        $municipiosObj = new Municipios();

        $estatus_municipio = $this->request->getPost('estatus_municipio');
        $nombre_municipio = $this->request->getPost('nombre_municipio');


        if ($this->validate('municipio')) {
            $id = $municipiosObj->insert(
                [
                    'nombre_municipio' => $nombre_municipio,
                    'estatus_municipio' => $estatus_municipio,
                ]
            );
        }
        return redirect()->to(base_url('/municipios-admin'))->with('mensaje', '2');
    }

    public function updateMunicipio($id)
    {

        $datos = [
            // "fecha_modificacion" => date(DB_FORMAT_DATE),
            "nombre_municipio" => $_POST['nombre_municipio'],
            "estatus_municipio" => $_POST['estatus_municipio']
        ];

        $id = $_POST['id_municipio'];

        $municipioObj = new Municipios();

        $respuesta = $municipioObj->updateMunicipio($id, $datos);
        return redirect()->to(base_url('/municipios-admin'))->with('mensaje', '6');
    }
}
