<?php

namespace App\Controllers;

use App\Models\Municipios;
use App\Models\Usuarios;

class Contactanos extends BaseController
{
    public function index()
    {
        $mensaje=session('mensaje');
        $municipioObj = new Municipios();
        $municipios = $municipioObj->obtenerTodosMunicipios();
        return view('contactanos', ['municipios'=>$municipios, 'mensaje'=>$mensaje,] );
    }

    public function EnviarMensaje(){
            $nombre = $this->request->getPost('nombre');
            $mensaje = $this->request-> getPost('mensaje');
            $correo = $this->request->getPost('correo');
            $email = 'ramirezbecerraid@gmail.com';

            $param = "$mensaje, para más información: $correo";
          
        try {
            $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://187.191.30.131:4401/wsCurp/api/v1/mailer/sendMail",
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_ENCODING =>"",
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_TIMEOUT => 0, 
            CURLOPT_FOLLOWLOCATION => true, 
            CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=> "POST",
            CURLOPT_POSTFIELDS => "{\r\n    \"subject\": \"$nombre\", \r\n  \"body\":\r\n \"$param\",\r\n \"addresses\": \"$email\"\r\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbnRpdHkiOiJKdXZlbnR1ZEVzR3RvIiwicmVzcG9uc2FibGUiOiJKdXZlbnR1ZEVzR3RvIiwiaW5pdERhdGUiOiIyMDIyLTA5LTI3IDExOjIzOjQ2IiwiZXhwRGF0ZSI6IjIwMjMtMDktMjcgMTE6MjM6NDYiLCJpYXQiOjE2NjQzMDMwMjYsImV4cCI6MTY5NTgzOTAyNn0.dqgdsHf84PEL-NpduzUNXoujEZ9KeGe1ZsntUTHyb5o",
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
            return redirect()->to(base_url('/contactanos'))->with('mensaje','1');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->to(base_url('/contactanos'))->with('mensaje','0');
        }
    }

    

    public function EnviarCorreo(){
        $contactoObj = new Usuarios();
        $correo = $this->request->getPost('correo');
        $datosUsuario = $contactoObj->obtenerDatos($correo);
       
        if ($datosUsuario ==null) {
            return redirect()->to(base_url('/login'))->with('mensaje','2');
            }
            $nombre = 'Recuperación de contraseña';
            $mensaje=  'Tu contraseña es: '.implode('',$datosUsuario[0]);
            try {
                $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://187.191.30.131:4401/wsCurp/api/v1/mailer/sendMail",
                CURLOPT_RETURNTRANSFER => true, 
                CURLOPT_ENCODING =>"",
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_TIMEOUT => 0, 
                CURLOPT_FOLLOWLOCATION => true, 
                CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=> "POST",
                CURLOPT_POSTFIELDS => "{\r\n    \"subject\": \"$nombre\", \r\n  \"body\":\r\n \"$mensaje\",\r\n \"addresses\": \"$correo\"\r\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbnRpdHkiOiJKdXZlbnR1ZEVzR3RvIiwicmVzcG9uc2FibGUiOiJKdXZlbnR1ZEVzR3RvIiwiaW5pdERhdGUiOiIyMDIyLTA5LTI3IDExOjIzOjQ2IiwiZXhwRGF0ZSI6IjIwMjMtMDktMjcgMTE6MjM6NDYiLCJpYXQiOjE2NjQzMDMwMjYsImV4cCI6MTY5NTgzOTAyNn0.dqgdsHf84PEL-NpduzUNXoujEZ9KeGe1ZsntUTHyb5o",
                    "Content-Type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
                return redirect()->to(base_url('/login'))->with('mensaje','1');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->to(base_url('/login'))->with('mensaje','0');
            }

            
        }
}