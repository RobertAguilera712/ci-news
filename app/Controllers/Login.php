<?php

namespace App\Controllers;
use App\Models\Usuarios;

class Login extends BaseController
{
    public function index()
    {
        $mensaje=session('mensaje');
        $data = [
            "mensaje" => $mensaje
        ];
        return view('login', $data);
    }

    public function entrar()
    {
        $correo = $this->request->getPost('correo');
        $usuario = $this->request->getPost('usuario');
        $contrasena = $this->request->getPost('contrasena');
        
        $usuarioObj = new Usuarios();

        $datosUsuario = $usuarioObj->where('correo', $correo)->first();

        if(count((array)$datosUsuario)>0 && $contrasena==$datosUsuario['contrasena']&& $correo == $datosUsuario['correo'] ){
            $data= [
                "correo" => $datosUsuario['correo'],
                "usuario" => $datosUsuario['usuario'],
                "nombre" => $datosUsuario['nombre']

            ];

            if($datosUsuario['usuario'] == 'investigador'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/estudios'));

            }else if($datosUsuario['usuario'] == 'administrador'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/administrador'));

            }else if($datosUsuario['usuario'] == 'encuestas'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/encuestas-admin'));

            }else if($datosUsuario['usuario'] == 'apoyos y servicios'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/apoyosAdmin'));

            }else if($datosUsuario['usuario'] == 'evaluaciones'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/evaluacionAdmin'));

            }else if($datosUsuario['usuario'] == 'estadisticas e indicadores'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/encuestas-indicadores-admin'));

            }else if($datosUsuario['usuario'] == 'organizaciones'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/directoriosAdmin'));
                
            }else if($datosUsuario['usuario'] == 'testimonios'){
                $session = session();
                $session->set($data);  
                return redirect()->to(base_url('/testimoniosAdmin'));
            }
        }else{
            return redirect()->to(base_url('/login'));
        }
    }

    public function salir(){
        $session=session();
        $session->destroy();
        return redirect()->to(base_url('/login'));

    }
    
    public function accesoDenegado(){
        return view('acceso_denegado');

    }

   
}