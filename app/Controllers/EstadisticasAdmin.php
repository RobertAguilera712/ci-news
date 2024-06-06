<?php

namespace App\Controllers;
use App\Models\Municipios;

class EstadisticasAdmin extends BaseController
{
    public function index($id)
    {
        $municipioObj = new Municipios();
        $mensaje=session('mensaje');

        $data = ["id_municipio" =>$id];
        $datos = $municipioObj->obtenerEstadistica($data);
        $estadistica = $municipioObj->asObject()->find($id);
        $municipio = $municipioObj->obtenerTodosMunicipios();
       
        return view('estadisticasAdmin', [ 'mensaje'=> $mensaje, 'estadistica'=>$estadistica, 
        'datos'=>$datos, 'municipio'=>$municipio]);
    }

    public function edit($id)
{
    $municipioObj = new Municipios();

    $data = ["id_municipio" =>$id];
    $datos = $municipioObj->obtenerMunicipio($data);
    $municipio = $municipioObj->asObject()->find($id);

    $mensaje=session('mensaje');

    if($municipio == null){
        throw PageNotFoundException::forPageNotFound();
    }
    
    $validation = \Config\Services::validation();
    return view('municipio_edit', ['validation' => $validation, 'municipio' => $municipio, 'datos'=>$datos, 'mensaje'=> $mensaje]);
}

public function update($id){

    defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
    $pdf = $this->request->getPost('pdf');

    if($pdf ==!null){
        $datos= [
            "Fecha_Captura" => date(DB_FORMAT_DATE),
            "nombre" => $_POST['nombre'],
            "pdf" => $pdf
        ];
    }else{
        $datos= [
            "Fecha_Captura" => date(DB_FORMAT_DATE),
            "nombre" => $_POST['nombre']
        ];
    }

    $id = $_POST['id_municipio'];

    $municipioObj = new Municipios();

    $res= $municipioObj->updateMunicipio($id, $datos);

    $res=$this->_uploadDoc($id);
    

    if ($res==null) {
        return redirect()->to(base_url('/municipios-admin'))->with('mensaje', '1');
    }else{
        return redirect()->to(base_url('estadisticas/edit/'.$id))->with('mensaje', '2');
    }
}

private function _uploadDoc($id)
{
    if($imageFile = $this->request->getFile('pdf')){
        if($imageFile->isValid() && !$imageFile->hasMoved()){
            //validaciones 
            $validated = $this->validate([
                'pdf' => [
                    'uploaded[pdf]',
                    'ext_in[pdf,pdf]'
                ]
            ]);
            if($validated){
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH.'public/documentos_municipios/'.$id,$newName);

                $municipioA = new Municipios();

                $respuesta= $municipioA->updateMunicipio($id, [
                    'pdf' => $newName
                ]);
                return null;
            }else{
                return  $this->validator->getError('pdf');
            }
        }
    }

    
}

}