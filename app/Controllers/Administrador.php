<?php

namespace App\Controllers;
use App\Models\Usuarios;
use App\Models\Slider;
use App\Models\Propuesta;
use App\Models\Visita;
use App\Models\Interfaz;

class Administrador extends BaseController
{
    
    public function index()
    {
        $sliderObj = new Slider();
        $usuarioObj = new Usuarios();
        $propuestaObj = new Propuesta();
        $interfazObj = new Interfaz();

        $datos = $usuarioObj->readUsers();
        $mensaje = session('mensaje');
        $slider = $sliderObj->obtenerSlider();
        $propuesta = $propuestaObj->obtenerSelect();

        $interfaz = $interfazObj->obtenerTodos();

        $visita = new Visita();
        $visitas = $visita->obtenerTodasVisitas();

        $data = [
            "slider"=>$slider,
            "datos" => $datos,
            "mensaje" => $mensaje,
            "propuesta" => $propuesta,
            "visitas" => $visitas,
            "interfaz" => $interfaz,
        ];
        
        return view('administrador', $data);
    }

    public function insertUser(){

        return view('crear_cuenta');
    }


    public function actualizar(){
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $datos= [
          "fecha_modificacion" => date(DB_FORMAT_DATE),
            "nombre" => $_POST['nombre'],
            "apellidos" => $_POST['apellidos'],
            "correo" => $_POST['correo'],
            "telefono" => $_POST['telefono'],
            "usuario" => $_POST['usuario'],
            "contrasena" => $_POST['contrasena'],
            "estatus" => $_POST['estatus']
        ];

        $id = $_POST['id_user'];

        $usuarioObj = new Usuarios();

        $respuesta= $usuarioObj->updateUser($datos, $id);

        if($respuesta >0){
         return redirect()->to(base_url('/administrador'))->with('mensaje','2');
        }else{
         return redirect()->to(base_url('/administrador'))->with('mensaje','3');
        }
    }

    public function create(){
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $sliderObj = new Slider();
    
        
        $descripcion = $this->request->getPost('descripcionS');
        $estatus = $this->request->getPost('estatusS');
        
    
        if($this->validate('slider')){
            $id = $sliderObj->insert(
                [
                "descripcion" => $descripcion,
                "estatus" => $estatus
                ]
            );
           
            return redirect()->to(base_url('/administrador'))->with('mensaje', '5');
               
        }
        return redirect()->to(base_url('/administrador'))->with('mensaje', '6');
    
    }

    public function edit($id)
    {
    $sliderE = new Slider();
    $data = ["id_slider" =>$id];
    $datos = $sliderE->obtenerSliderID($data);
    $mensaje=session('mensaje');
    $slider = $sliderE->asObject()->find($id);

    if($slider == null){
        throw PageNotFoundException::forPageNotFound();
    }
    
    $validation = \Config\Services::validation();
    return view('edit_slider', ['validation' => $validation, 'slider' => $slider, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }


    public function update($id)
    {
        $descripcion = $this->request->getPost('descripcion');
        $estatus = $this->request->getPost('estatus');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

        $datos= [
          "fecha_modificacion" => date(DB_FORMAT_DATE),
            "descripcion" => $descripcion,
            "estatus" => $estatus
        ];

        $id = $_POST['id_slider'];

        $sliderObj = new Slider();

        $respuesta= $sliderObj->updateSlider($id, $datos);
        
        return redirect()->to(base_url('/administrador'))->with('mensaje', '8');
    }
    

}