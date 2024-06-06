<?php

namespace App\Controllers;
use App\Models\Temas;
use App\Models\EncuestasCortas;
use App\Models\EncuestasLargas;
use App\Models\Interfaz;
use App\Models\Slider;
use App\Models\Municipios;
use App\Models\Testimonios;
use App\Models\Visita;

class Home extends BaseController
{
    public function index()
    {
        $mensaje=session('mensaje');

        $encuestasObj = new EncuestasCortas();
        $municipioObj = new Municipios();
        $temasObj = new Temas();
        $encuestasLargasObj = new EncuestasLargas();
        $sliderObj = new Slider();
        $testimoniosObj = new Testimonios();

        $testimonios = $testimoniosObj->obtenerTestimoniosActivos();
        $temas= $temasObj->obtenerTemasActivosByDescripcion();
        $encuestas = $encuestasObj->obtenerPregunta();
        $votos = $encuestasObj->votosTotales();
        $slider = $sliderObj->obtenerSliderActivo();
        $encuestasLargas = $encuestasLargasObj->getEncuestasLActivo();
        $municipio = $municipioObj->obtenerTodosMunicipios();
        
        // Sumar Visita
        $visita = new Visita();
        $visita->sumarVisita('Inicio');
        $visitas = $visita->obtenerTodasVisitas();
        $session = \Config\Services::session();
        $session->set('visitas', $visitas); 
        
        $interfaz = new Interfaz();
        $session->set('interfazConfig', $interfaz->obtenerActivos()); 

        return view('index',[
            'temas'=>$temas, 'encuestasCortas'=>$encuestas,
            'municipio' =>$municipio, 'mensaje'=>$mensaje,
            'votos'=>$votos, 'encuestasLargas'=>$encuestasLargas, 
            'slider'=> $slider,'testimonios'=>$testimonios  ]);
    }

    public function encuesta()
    {
        $respuesta1 = $this->request->getPost('respuesta1');
        $respuesta2 = $this->request->getPost('respuesta2');
        $respuesta3 = $this->request->getPost('respuesta3');
        $respuesta4 = $this->request->getPost('respuesta4');

        if($respuesta1!==null){
            $encuestasObj = new EncuestasCortas();
            $encuestasA=$encuestasObj->votos1($respuesta1);

            if($encuestasA==true){
            
                return redirect()->to(base_url('/index'))->with('mensaje', '1');
            }
            }elseif($respuesta2!==null){
                $encuestasObj = new EncuestasCortas();
                $encuestasA=$encuestasObj->votos2($respuesta2);
                if($encuestasA==true){
                
                    return redirect()->to(base_url('/index'))->with('mensaje', '1');
                }

            }elseif($respuesta3!==null){
                $encuestasObj = new EncuestasCortas();
                $encuestasA=$encuestasObj->votos3($respuesta3);
                if($encuestasA==true){
                
                    return redirect()->to(base_url('/index'))->with('mensaje', '1');
                }
            }elseif($respuesta4!==null){
                $encuestasObj = new EncuestasCortas();
                $encuestasA=$encuestasObj->votos4($respuesta4);
                if($encuestasA==true){
                
                    return redirect()->to(base_url('/index'))->with('mensaje', '1');
                }
            }
    }

    public function createT(){

        $testimonioObj = new Testimonios();
    
        $nombreT = $this->request->getPost('nombreT');
        $descripcionT= $this->request->getPost('descripcionT');
        $municipioT= $this->request->getPost('municipioT');
        $correo= $this->request->getPost('correo');
        $telefono= $this->request->getPost('telefono');
    
            $id = $testimonioObj->insert(
                [
                "nombreM" => $nombreT,
                "descripcion" =>  $descripcionT,
                "id_municipio" => $municipioT,
                "correo" => $correo,
                "telefono" => $telefono
                ]
            );

            $res=$this->_uploadImageTestimonios($id);
        if ($res==null) {
            return redirect()->to(base_url('/index'))->with('mensaje', '4');
        }else if ($res ==!null){
            return redirect()->to(base_url('encuesta/editTestimonio/'.$id))->with('mensaje', '2');
        }  
    
    }

    public function editT($id){
        $testimonioObj = new Testimonios();

        $data = ["id_testimonios" =>$id];

        $datos = $testimonioObj->obtenerIdTestimonio($data);
        $mensaje=session('mensaje');
        $testimonio = $testimonioObj->asObject()->find($id);
        $municipiosR = new Municipios();
        $tm = $municipiosR->obtenerTestimoniosMunicipio('1');
        $municipios = $municipiosR->obtenerTodosMunicipios();

        if($testimonio == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_testimonio', ['validation' => $validation,'municipios'=>$municipios, 'tm'=>$tm,'testimonio' => $testimonio, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }


    public function updateT($id){
   
        $nombreT = $this->request->getPost('nombreT');
        $descripcionT= $this->request->getPost('descripcionT');
        $municipioId= $this->request->getPost('municipioId');
        $correo= $this->request->getPost('correo');
        $imagenT= $this->request->getPost('imagenT');
        $telefono= $this->request->getPost('telefono');
        $estatus= $this->request->getPost('estatus');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

        if($imagenT==!null){
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "nombreM" => $nombreT,
                "descripcion" => $descripcionT,
                "id_municipio" => $municipioId,
                "imagenT" => $imagenT,
                "correo" => $correo,
                "estatus" => $estatus,
                "telefono" => $telefono
            ];
        }else {
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                "nombreM" => $nombreT,
                "descripcion" => $descripcionT,
                "id_municipio" => $municipioId,
                "correo" => $correo,
                "estatus" => $estatus,
                "telefono" => $telefono
            ];
        }


        $id = $_POST['id_testimonios'];

        $testimonioA = new Testimonios();
        

        $respuesta= $testimonioA->updateTestimonios($id,$datos);
        $res=$this->_uploadImageTestimonios($id);
        if ($res==null) {
            return redirect()->to(base_url('/testimoniosAdmin'))->with('mensaje', '2');
        }else if ($res ==!null){
            return redirect()->to(base_url('testmonio/editTestimonio/'.$id))->with('mensaje', '2');
        }
    }

    private function _uploadImageTestimonios($id) {
        if($imageFile = $this->request->getFile('imagenT')){
            if($imageFile->isValid() && !$imageFile->hasMoved()){
            //validaciones 
                $validated = $this->validate([
                    'imagenT' => [
                        'uploaded[imagenT]',
                        'mime_in[imagenT,image/jpg,image/jpeg,image/gif,image/png]'
                    ]
                ]);
                if($validated){
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'images_testimonios/'.$id,$newName);

                    $testimonioA = new Testimonios();
                    $respuesta= $testimonioA->updateTestimonios($id, [
                        'imagenT' => $newName
                    ]);
                    return null;
                }else{
                    return  $this->validator->getError('imagenT');
                }
            }
        }
    }

    public function editT2($id)
    {
    $testimonioObj = new Testimonios();
    $data = ["id_testimonios" =>$id];

    $datos = $testimonioObj->obtenerIdTestimonio($data);

    $mensaje=session('mensaje');

    $testimonio = $testimonioObj->asObject()->find($id);

    $municipioObj = new Municipios();
    $municipios = $municipioObj-> obtenerTodosMunicipios();
    $municipio = $municipioObj-> obtenerTestimoniosMunicipio($testimonio->id_municipio);
    if($testimonio == null){
        throw PageNotFoundException::forPageNotFound();
    }
    
    $validation = \Config\Services::validation();
    return view('edit_testimonio', ['validation' => $validation,'testimonio' => $testimonio, 
    'datos'=>$datos, 'mensaje'=> $mensaje, 'municipios'=> $municipios, 'municipio' =>$municipio ]);
    }



    public function updateT2($id){
   
    $estatus = $this->request->getPost('estatus');

    $datos= [
        "estatus" => $estatus,
    ];


    $id = $_POST['id_testimonios'];

    $testimonioA = new Testimonios();
    

    $respuesta= $testimonioA->updateTestimonios($id,$datos);
        return redirect()->to(base_url('/testimoniosAdmin'))->with('mensaje', '15');
  
    }

}