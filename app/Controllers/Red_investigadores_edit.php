<?php

namespace App\Controllers;
use App\Models\Investigadores;
use App\Models\Objetivos;
use App\Models\Comisiones;

class Red_investigadores_edit extends BaseController
{
    public function index()
    {  
        $investigacionesObj = new Investigadores();
        $objetivosObj = new Objetivos();
        $comisionesObj = new Comisiones();

        $datos = $investigacionesObj->findAll();
        $data = $objetivosObj->findAll();
        $info = $comisionesObj->findAll();

        $mensaje=session('mensaje'); 
        
        $validation = \Config\Services::validation();

        return view('red_investigadores_edit', ['validation' => $validation, 'datos' =>$datos, 'data' => $data, 'mensaje'=> $mensaje, 'info'=>$info]);
    }

    public function createInv(){

        $investigadoresObj = new Investigadores();

        
        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');
        $estatus = $this->request->getPost('estatusInvestigador');
        $imagen = $this->request->getPost('imagen');


        if ($this->validate([
            'estatusInvestigador' => 'required',
        ])) {
            $id = $investigadoresObj->insert(
                [
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'estatus' => $estatus
                ]
            );
            $res=$this->_uploadImage($id);
            
            if ($res==null) {
                    return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '2');
                }else{
                    return redirect()->to(base_url('/integrantes-investigadores/edit/'.$id))->with('mensaje', '1');
                }
        }
        return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '3');

    }

    public function createComTrab(){

        
        $comisionesObj = new Comisiones();
        
        $descripcion = $this->request->getPost('descripcionComisiones');
        $estatus = $this->request->getPost('estatusComisiones');
        $imagen = $this->request->getPost('imagenComisiones');


        if ($this->validate([
            'estatusComisiones' => 'required',
        ])) {
            $id = $comisionesObj->insert(
                [
                    'descripcion' => $descripcion,
                    'estatus' => $estatus
                ]
            );
            $res=$this->_uploadImageComisiones($id);
            
            if ($res==null) {
                    return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '10');
                }else{
                    return redirect()->to(base_url('/integrantes-investigadores/edit/'.$id))->with('mensaje', '11');
                }
        }

    }

    public function createObj(){

        $objetivosObj = new Objetivos();

        
        $descripcion = $this->request->getPost('descripcionO');
        $estatus = $this->request->getPost('estatusO');
        if($this->validate('objetivos')){
            $id = $objetivosObj->insert(
                [
                    'descripcion' => $descripcion,
                    'estatus' => $estatus,
                ]
            );
            return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '7');
        }
        return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '6');

    }

    public function editInv($id)
    {
        $investigadoresObj = new Investigadores();
        $data = ["id_investigadores" =>$id];
        $datos = $investigadoresObj->obtenerInv($data);
        $mensaje=session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $investigador = $investigadoresObj->asObject()->find($id);

        if($investigador == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_integrante', ['validation' => $validation, 'investigador' => $investigador, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }


    public function editObj($id)
    {
        $objetivosObj = new Objetivos();
        $data = ["id_objetivos" =>$id];
        $datos = $objetivosObj->obtenerObj($data);
        $mensaje=session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $objetivo = $objetivosObj->asObject()->find($id);

        if($objetivo == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_objetivo', ['validation' => $validation, 'objetivo' => $objetivo, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

    public function editComTrab($id){
        $comisionesObj = new Comisiones();
        $data = ["id_comisiones" =>$id];
        $datos = $comisionesObj->obtenerCom($data);
        $mensaje=session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $comision = $comisionesObj->asObject()->find($id);

        if($comision == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_comision', ['validation' => $validation, 'comision' => $comision, 'datos'=>$datos, 'mensaje'=> $mensaje]);
       
    }

    public function updateInv($id){

        $imagen = $this->request->getPost('imagen');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        if($imagen ==! null){
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "nombre" => $_POST['nombre'],
                "descripcion" => $_POST['descripcion'],
                "estatus" => $_POST['estatus'],
                "imagen" => $imagen,
            ];
        }else{
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "nombre" => $_POST['nombre'],
                "descripcion" => $_POST['descripcion'],
                "estatus" => $_POST['estatus']
            ];
        }

        $id = $_POST['id_investigadores'];

        $investigadorObj = new Investigadores();

        $respuesta= $investigadorObj->updateInv($id, $datos);

        $res=$this->_uploadImage($id);
        

        if ($res==null){
            return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '1');
        }else{
            return redirect()->to(base_url('/integrantes-investigadores/edit/'.$id))->with('mensaje', '2');
        }
    }

    public function updateComTrab($id){
        $imagen = $this->request->getPost('imagen');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        if($imagen ==! null){
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $_POST['descripcion'],
                "estatus" => $_POST['estatus'],
                "imagen" => $imagen,
            ];
        }else{
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "descripcion" => $_POST['descripcion'],
                "estatus" => $_POST['estatus']
            ];
        }

        

        $id = $_POST['id_comisiones'];

        $comisionObj = new Comisiones();

        $respuesta= $comisionObj->updateCom($id, $datos);

        $res=$this->_uploadImageComisiones($id);
        

        if ($res==null){
            return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '11');
        }else{
            return redirect()->to(base_url('/comisiones-investigadores/edit/'.$id))->with('mensaje', '2');
        }
    }

    public function updateObj($id){
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $datos= [
            "fecha_modificacion" => date(DB_FORMAT_DATE),
            "descripcion" => $_POST['descripcion'],
            "estatus" => $_POST['estatus']
        ];

        $id = $_POST['id_objetivos'];

        $objetivoObj = new Objetivos();

        $respuesta= $objetivoObj->updateObj($id, $datos);

    
        return redirect()->to(base_url('/red-investigadores-edit'))->with('mensaje', '8');
       
    }

    private function _uploadImage($id)
    {
         if($imageFile = $this->request->getFile('imagen')){
            if($imageFile->isValid() && !$imageFile->hasMoved()){
            //validaciones 
                $validated = $this->validate([
                    'imagen' => [
                         'uploaded[imagen]',
                         'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png]'
                     ]
                ]);
                if($validated){
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'images_integrantes/'.$id,$newName);

                    $investigadoresObj = new Investigadores();
                    $respuesta= $investigadoresObj->updateInv($id, [
                        'imagen' => $newName
                    ]);
                    return null;
                }else{
                    return  $this->validator->getError('imagen');
                }
            }
        }

        
    }
    

    private function _uploadImageComisiones($id)
    {
         if($imageFile = $this->request->getFile('imagenComisiones')){
            if($imageFile->isValid() && !$imageFile->hasMoved()){
            //validaciones 
                $validated = $this->validate([
                    'imagenComisiones' => [
                         'uploaded[imagenComisiones]',
                         'mime_in[imagenComisiones,image/jpg,image/jpeg,image/gif,image/png]'
                     ]
                ]);
                if($validated){
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'images_comisiones/'.$id,$newName);

                    $comisionesObj = new Comisiones();
                    $respuesta= $comisionesObj->updateCom($id, [
                        'imagen' => $newName
                    ]);
                    return null;
                }else{
                    return  $this->validator->getError('imagenComisiones');
                }
            }
        }

        
    }
    

}
