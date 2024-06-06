<?php

namespace App\Controllers;
use App\Models\Directorios;

class Organizacion extends BaseController
{
    public function index()
    {

        $directoriosObj = new Directorios();
        $directorio = $directoriosObj->readDirectorio();
        $mensaje=session('mensaje');
        return view('directorios_admin', [ 'mensaje'=> $mensaje, 'directorio' => $directorio]);
    }

    public function createOrganizacion(){

        $organizacionObj = new Directorios();

        
        $descripcion = $this->request->getPost('descripcion');
        $descripcionMas = $this->request->getPost('descripcionMas');
        $estatus = $this->request->getPost('estatus');
        
        

        if($this->validate('organizacion')){
            $id = $organizacionObj->insert(
                [
                    'descripcion' => $descripcion,
                    'descripcionMas' => $descripcionMas,
                    'estatus' => $estatus
                ]
            );


            $res=$this->_uploadDoc($id);
            if ($res==null) {
                return redirect()->to(base_url('/directoriosAdmin'))->with('mensaje', '22');
            }else if ($res ==!null){
                return redirect()->to(base_url('directoriosAdmin/editOrganizacion/'.$id))->with('mensaje', '1');
            }
            
        }
        return redirect()->to(base_url('/directoriosAdmin'))->with('mensaje', '23');

    }

    public function updateOrganizacion($id){

        $descripcion = $this->request->getPost('descripcion');
        $descripcionMas = $this->request->getPost('descripcionMas');
        $estatus = $this->request->getPost('estatus');
        $link = $this->request->getPost('link');

        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
    
        if($link ==!null){
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                'descripcion' => $descripcion,
                'descripcionMas' => $descripcionMas,
                'estatus' => $estatus,
                'link' => $link
            ];
        }else {
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                'descripcion' => $descripcion,
                'descripcionMas' => $descripcionMas,
                'estatus' => $estatus
            ];
        }
    
        $id = $_POST['id_directorio'];
    
        $organizacionObj = new Directorios();
    
        $organizacionObj->updateDirectorio($id, $datos);

        $res=$this->_uploadDoc($id);
        
    
        if ($res==null) {
            return redirect()->to(base_url('/directoriosAdmin'))->with('mensaje', '24');
        }else{
            return redirect()->to(base_url('directoriosAdmin/editOrganizacion/'.$id))->with('mensaje', '1');
        }
    
    
            
    
      
    }

    private function _uploadDoc($id)
{
    if($imageFile = $this->request->getFile('link')){
        if($imageFile->isValid() && !$imageFile->hasMoved()){
            //validaciones 
            $validated = $this->validate([
                'link' => [
                    'uploaded[link]',
                    'ext_in[link,pdf,docx,xlsx]'
                ]
            ]);
            if($validated){
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH.'public/documentos_directorio/'.$id,$newName);

                $directorioA = new Directorios();

                $respuesta= $directorioA->updateDirectorio($id, [
                    'link' => $newName
                ]);
                return null;
            }else{
                return  $this->validator->getError('link');
            }
        }
    }

    
}

       

    public function editOrganizacion($id)
    {

        $organizacionObj = new Directorios();
        $data = ["id_directorio" =>$id];
        $datos = $organizacionObj->editOrganizacion($data);
        $mensaje=session('mensaje');
        $organizacion = $organizacionObj->asObject()->find($id);

        if($organizacion == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_organizacion', ['validation' => $validation, 'organizacion' => $organizacion, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

         
}