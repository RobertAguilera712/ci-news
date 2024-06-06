<?php

namespace App\Controllers;

use App\Models\ArticulosRevista;
use App\Models\Revista;

class Revistas extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');

        $revistaObj = new Revista();
        $revistas = $revistaObj->obtenerRevistas();

        $validation = \Config\Services::validation();

        return view('revistas', [
            'validation' => $validation,
            'mensaje' => $mensaje, 'revistas' => $revistas, 'recientes' => array_reverse($revistas),
        ]);
    }
    
    public function verRevista($id)
    {
        $mensaje = session('mensaje');

        $revistaObj = new Revista();
        $revista = $revistaObj->obtenerRevistaById($id);
        $articuloObj = new ArticulosRevista();
        $articulos = $articuloObj->obtenerArticulosRevista($id);

        $validation = \Config\Services::validation();

        return view('revista', [
            'validation' => $validation,
            'mensaje' => $mensaje, 'revista' => $revista, 'articulos' => $articulos,
        ]);
    }

    public function revistasAdmin()
    {
        $mensaje = session('mensaje');

        $revistaObj = new Revista();
        $revistas = $revistaObj->obtenerTodasRevistas();
        $articuloObj = new ArticulosRevista();
        $articulos = $articuloObj->obtenerTodasArticulosRevista();

        $validation = \Config\Services::validation();

        return view('revistas_admin', [
            'validation' => $validation,
            'mensaje' => $mensaje, 'revistas' => $revistas, 'articulos' => $articulos,
        ]);
    }

    public function crearRevista()
    {

        $revistaObj = new Revista();
        $volumen = $this->request->getPost('volumen');
        $numero_year = $this->request->getPost('numero_year');
        $descripcion = $this->request->getPost('descripcion');
        $fecha = $this->request->getPost('fecha');
        $archivo = $this->request->getPost('archivo');
        $portada = $this->request->getPost('portada');
        $estatus = $this->request->getPost('estatus');

        $documento = $revistaObj->obtenerRevistaByNombre($volumen);


        if ($documento == null) {
            if ($this->validate('revista')) {
                $id = $revistaObj->insert(
                    [
                        'volumen' => $volumen,
                        'numero_year' => $numero_year,
                        'fecha' => $fecha,
                        'archivo' => $archivo,
                        'portada' => $portada,
                        'estatus' => $estatus,
                        'descripcion' => $descripcion
                    ]
                );

                $res = $this->_uploadDoc($id);
                $res2 = $this->_uploadImage($id);

                if ($res == null && $res2 == null) {
                    return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '1');
                } else if ($res  == !null) {
                    return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '6');
                } else if ($res2  == !null) {
                    return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '7');
                }

                return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '2');
            }
            return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '9');
    }

    public function editarRevista($id)
    {
        $revistaObj = new Revista();
        $revista = $revistaObj->obtenerRevistaById($id);
        $mensaje = session('mensaje');

        return view('editar_revista', ['mensaje' => $mensaje, 'revista' => $revista]);
    }


    public function actualizarRevista()
    {

        defined('DB_FORMAT_DATE') or define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $archivo = $this->request->getPost('archivo');
        $portada = $this->request->getPost('portada');

        if ($archivo == !null && $portada == !null) {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "volumen" => $_POST['volumen'],
                "numero_year" => $_POST['numero_year'],
                "fecha" => $_POST['fecha'],
                "descripcion" => $_POST['descripcion'],
                "archivo" => $archivo,
                "portada" => $portada,
                "estatus" => $_POST['estatus']
            ];
        } else if ($archivo == !null && $portada == null) {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "volumen" => $_POST['volumen'],
                "numero_year" => $_POST['numero_year'],
                "fecha" => $_POST['fecha'],
                "descripcion" => $_POST['descripcion'],
                "archivo" => $archivo,
                "estatus" => $_POST['estatus']
            ];
        } else if ($archivo == null && $portada == !null) {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "volumen" => $_POST['volumen'],
                "numero_year" => $_POST['numero_year'],
                "fecha" => $_POST['fecha'],
                "descripcion" => $_POST['descripcion'],
                "portada" => $portada,
                "estatus" => $_POST['estatus']
            ];
        } else {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "volumen" => $_POST['volumen'],
                "numero_year" => $_POST['numero_year'],
                "descripcion" => $_POST['descripcion'],
                "fecha" => $_POST['fecha'],
                "estatus" => $_POST['estatus']
            ];
        }


        $id = $_POST['id_revista'];

        $revistaObj = new Revista();

        $respuesta = $revistaObj->updateRevista($id, $datos);

        $res = $this->_uploadDoc($id);
        $res2 = $this->_uploadImage($id);


        if ($res == null && $res2 == null) {
            return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '2');
        } else if ($res  == !null) {
            return redirect()->to(base_url('/revistas-admin/editarRevista/' . $id))->with('mensaje', '3');
        }else if ($res2  == !null) {
            return redirect()->to(base_url('/revistas-admin/editarRevista/' . $id))->with('mensaje', '2');
        }
    }

    private function _uploadDoc($id)
    {
        if ($imageFile = $this->request->getFile('archivo')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                //validaciones 
                $validated = $this->validate([
                    'archivo' => [
                        'uploaded[archivo]',
                        'ext_in[archivo,docx,pdf]',
                        'max_size[portada,4096]'
                    ]
                ]);
                if ($validated) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/revistas/' . $id, $newName);

                    $revistaObj = new Revista();
                    $respuesta = $revistaObj->updateRevista($id, [
                        'archivo' => $newName
                    ]);
                    return null;
                } else {
                    return  $this->validator->getError('archivo');
                }
            }
        }
    }

    private function _uploadImage($id)
{
    if ($imageFile = $this->request->getFile('portada')) {
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Validations
            $validated = $this->validate([
                'portada' => [
                    'uploaded[portada]',
                    'mime_in[portada,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[portada,4096]'
                ]
            ]);
            if ($validated) {
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'images_revistas/' . $id, $newName);

                $revistaObj = new Revista();
                $respuesta = $revistaObj->updateRevista($id, [
                    'portada' => $newName
                ]);
                return null;
            } else {
                return  $this->validator->getError('portada');
            }
        }
    }
}


// Articulos Revista

public function crearArticuloRevista()
    {

        $articuloObj = new ArticulosRevista();
        $titulo = $this->request->getPost('titulo');
        $autor = $this->request->getPost('autor');
        $contenido = $this->request->getPost('contenido');
        $id_revista = $this->request->getPost('id_revista');
        $imagen = $this->request->getPost('imagen');
        $estatus = $this->request->getPost('estatus');

        $documento = $articuloObj->obtenerArticuloRevistaByNombre($titulo);


        if ($documento == null) {
            if ($this->validate('revista')) {
                $id = $articuloObj->insert(
                    [
                        'titulo' => $titulo,
                        'autor' => $autor,
                        'id_revista' => $id_revista,
                        'imagen' => $imagen,
                        'estatus' => $estatus,
                        'contenido' => $contenido
                    ]
                );

                $res = $this->_uploadImageArticulo($id);

                if ($res == null ) {
                    return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '9');
                } else if ($res  == !null) {
                    return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '11');
                } 

                return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '10');
            }
            return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '9');
    }



    public function editarArticuloRevista($id)
    {
        $articuloObj = new ArticulosRevista();
        $articulo = $articuloObj->obtenerArticuloRevista($id);
        $mensaje = session('mensaje');

        return view('editar_articulo', ['mensaje' => $mensaje, 'articulo' => $articulo]);
    }


    public function actualizarArticuloRevista()
    {

        defined('DB_FORMAT_DATE') or define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $imagen = $this->request->getPost('imagen');

        if ($imagen == !null) {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "titulo" => $_POST['titulo'],
                "autor" => $_POST['autor'],
                "contenido" => $_POST['contenido'],
                "imagen" => $imagen,
                "estatus" => $_POST['estatus']
            ];
        } else {
            $datos = [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "titulo" => $_POST['titulo'],
                "autor" => $_POST['autor'],
                "contenido" => $_POST['contenido'],
                "estatus" => $_POST['estatus']
            ];
        } 

        $id = $_POST['id_articulo'];

        $articuloObj = new ArticulosRevista();

        $respuesta = $articuloObj->updateArticuloRevista($id, $datos);

        $res = $this->_uploadImageArticulo($id);


        if ($res == null) {
            return redirect()->to(base_url('/revistas-admin'))->with('mensaje', '10');
        } else if ($res  == !null) {
            return redirect()->to(base_url('/revistas-admin/editarArticuloRevista/' . $id))->with('mensaje', '3');
        }
    }

    private function _uploadImageArticulo($id)
{
    if ($imageFile = $this->request->getFile('imagen')) {
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Validations
            $validated = $this->validate([
                'imagen' => [
                    'uploaded[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[imagen,4096]'
                ]
            ]);
            if ($validated) {
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'images_articulosrevistas/' . $id, $newName);

                $revistaObj = new ArticulosRevista();
                $respuesta = $revistaObj->updateArticuloRevista($id, [
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
