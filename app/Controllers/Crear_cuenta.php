<?php

namespace App\Controllers;
use App\Models\Usuarios;

class Crear_cuenta extends BaseController
{
    public function __constructor(){
        helper('url');
    }
    
    public function index()
    {
        $mensaje=session('mensaje');
        $data = [
            "mensaje" => $mensaje
        ];
       
        return view('crear_cuenta', $data);
    }
    public function guardar(){

        $usuarioObj = new Usuarios();

        $nombre = $this->request->getPost('nombre');
        $apellidos = $this->request->getPost('apellidos');
        $correo = $this->request->getPost('correo');
        $telefono = $this->request->getPost('telefono');
        $usuario = $this->request->getPost('usuario');    
        $contrasena = $this->request->getPost('contrasena');
        $estatus = $this->request->getPost('estatus');

        $data= [
            "nombre" => $nombre,
            "apellidos" => $apellidos,
            "correo" => $correo,
            "telefono" => $telefono,
            "usuario" => $usuario,
            "contrasena" => $contrasena,
            "estatus" =>$estatus
            

        ];
    
       $respuesta= $usuarioObj->createUser($data);

       if($respuesta >0){
        return redirect()->to(base_url('/administrador'))->with('mensaje','1');
       }else{
        return redirect()->to(base_url('/crear_cuenta'))->with('mensaje','0');
       }

    }
    


}