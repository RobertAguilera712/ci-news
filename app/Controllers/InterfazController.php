<?php

namespace App\Controllers;

use App\Models\Interfaz;

class InterfazController extends BaseController
{

    public function editConfig($id)
    {
        $interfazObj = new Interfaz();
        $interfaz = $interfazObj->obtenerById($id);
        $mensaje = session('mensaje');


        return view('edit_config', ['mensaje' => $mensaje, 'interfaz' => $interfaz]);
    }


    public function createConfig()
    {

        $documentoObj = new Interfaz();


        $id_config = $this->request->getPost('id_config');
        $nombre = $this->request->getPost('nombre');
        // $auxiliar = $this->request->getPost('auxiliar');
        $archivo = $this->request->getPost('archivo');
        $estatus = $this->request->getPost('estatus');

        $documento = $documentoObj->obtenerDocumentoByNombre($nombre);


        if ($documento == null) {
            if ($this->validate('documento_cendoc')) {
                $id = $documentoObj->insert(
                    [
                        'nombre' => $nombre,
                        // 'auxiliar' => $auxiliar,
                        'id_config' => $id_config,
                        'archivo' => $archivo,
                        'estatus' => $estatus,
                    ]
                );

                $res = $this->_uploadArchivo($id);

                if ($res == null) {
                    return redirect()->to(base_url('/administrador'))->with('mensaje', '17');
                } else if ($res == !null) {
                    return redirect()->to(base_url('/configs/editConfig/' . $id))->with('mensaje', '4');
                }

                return redirect()->to(base_url('/administrador'))->with('mensaje', '2');
            }
            return redirect()->to(base_url('/administrador'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('/administrador'))->with('mensaje', '9');
    }


    public function updateConfig($id)
    {

        $archivo = $this->request->getPost('archivo');

        if ($archivo == !null) {
            $datos = [
                "nombre" => $_POST['nombre'],
                // "auxiliar" => $_POST['auxiliar'],
                "archivo" => $archivo,
                "estatus" => $_POST['estatus'],
            ];
        } else {
            $datos = [
                "nombre" => $_POST['nombre'],
                // "auxiliar" => $_POST['auxiliar'],
                "estatus" => $_POST['estatus'],
            ];
        }


        $id = $_POST['id'];

        $documentoObj = new Interfaz();

        $respuesta = $documentoObj->updateConfig($id, $datos);

        $res = $this->_uploadArchivo($id);


        if ($res == null) {
            return redirect()->to(base_url('/administrador'))->with('mensaje', '18');
        } else if ($res  == !null) {
            return redirect()->to(base_url('/configs/editConfig/' . $id))->with('mensaje', '1');
        }
    }

    private function _uploadArchivo($id)
    {
        if ($imageFile = $this->request->getFile('archivo')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                //validaciones 
                $validated = $this->validate([
                    'archivo' => [
                        'uploaded[archivo]',
                        'mime_in[archivo,image/jpg,image/jpeg,image/gif,image/png]'
                    ]
                ]);
                if ($validated) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/interfaz/' . $id, $newName);

                    $encuestaA = new Interfaz();
                    $respuesta = $encuestaA->updateConfig($id, [
                        'archivo' => $newName
                    ]);
                    return null;
                } else {
                    return  $this->validator->getError('archivo');
                }
            }
        }
    }
}
