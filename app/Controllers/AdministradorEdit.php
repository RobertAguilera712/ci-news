<?php

namespace App\Controllers;
use App\Models\Usuarios;


class AdministradorEdit extends BaseController
{
    public function index()
    {
        $usuarioObj = new Usuarios();

        $datos = $usuarioObj->readUsers();

        $data = [
            "datos" => $datos
        ];
        return view('editar_usuario', $data);
    }


    public function obtener($id){
        $data = ["id_user" =>$id];
        $usuarioObj = new Usuarios();

        $respuesta = $usuarioObj->obtenerUsuario($data);

        $datos = ["datos" => $respuesta];

        return view('editar_usuario', $datos);
        
    }

}
