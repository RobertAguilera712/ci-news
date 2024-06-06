<?php

namespace App\Controllers;
use App\Models\Apoyo;
use App\Models\Derecho_Social;
use App\Models\Dependencia;
use App\Models\Tipo_Apoyo;
use App\Models\Normatividad;
use App\Models\Temas;

class ApoyosAdmin extends BaseController
{
    public function index()
    {
        $normatividadObj = new Normatividad();
        $apoyoObj = new Apoyo();
        $derechos = new Derecho_Social();
        $dependencias = new Dependencia();
        $apoyos = new Tipo_Apoyo();
        $temas = new Temas();
        $mensaje=session('mensaje');
        $datos = $apoyoObj->obtenerTodosApoyosB();
        $derecho = $derechos->obtenerTodosDerechos();
        $dependencia = $dependencias->obtenerTodasDependencias();
        $apoyo = $apoyos->obtenerTodosApoyos();
        $normatividad = $normatividadObj->obtenerTodasNormatividades();
        $derechoOrdenado = $derechos->obtenerDerechosActivosOrdenado();
        $temaOrdenado = $temas->obtenerTemasActivosByDescripcion();
        $dependenciaOrdenado = $dependencias->obtenerDependenciasActivasOrdenado();
        $apoyoOrdenado = $apoyos->obtenerApoyosActivosOrdenado();
        $normatividadOrdenado = $normatividadObj->obtenerNormatividadesActivasOrdenado();
        return view('apoyos_admin', [ 'mensaje'=> $mensaje, 'datos' => $datos, 'derecho'=>$derecho,
        'dependencia' => $dependencia, 'apoyo' => $apoyo, 'normatividad'=>$normatividad, 
        'derechoOrdenado'=>$derechoOrdenado, 'temaOrdenado'=>$temaOrdenado, 'dependenciaOrdenado'=> $dependenciaOrdenado,
        'apoyoOrdenado'=>$apoyoOrdenado, 'normatividadOrdenado'=>$normatividadOrdenado]);
    }

    public function createApoyo(){

        $apoyoN = new Apoyo();

        
        $orden = $this->request->getPost('orden');
        $id_derecho = $this->request->getPost('id_derecho');
        $tema = $this->request->getPost('tema');
        $dependencia = $this->request->getPost('dependencia');
        $programa = $this->request->getPost('programa');
        $estatus = $this->request->getPost('estatus');
        $año = $this->request->getPost('año');
        $objetivo_general = $this->request->getPost('objetivo_general');
        $rango = $this->request->getPost('rango');
        $poblacion = $this->request->getPost('poblacion');
        $apoyo = $this->request->getPost('apoyo');
        $monto = $this->request->getPost('monto');
        $responsable = $this->request->getPost('responsable');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $pagina = $this->request->getPost('pagina');
        $normatividad = $this->request->getPost('normatividad');
        $link = $this->request->getPost('link');
        $presupuesto = $this->request->getPost('presupuesto');
        

        if($this->validate('apoyos')){
            $id = $apoyoN->insert(
                [
                    'orden_gobierno' => $orden,
                    'id_derecho' => $id_derecho,
                    'id_tema' => $tema,
                    'id_dependencia' => $dependencia,
                    'programa_Social' => $programa,
                    'estatus_apoyo' => $estatus,
                    'año' => $año,
                    'objetivo_General' => $objetivo_general,
                    'rango_Edad' => $rango,
                    'poblacion_Objetivo' => $poblacion,
                    'id_tipo_apoyo' => $apoyo,
                    'monto_Anual' => $monto,
                    'responsable' => $responsable,
                    'telefono' => $telefono,
                    'correo' => $correo,
                    'pagina_Web' => $pagina,
                    'id_normatividad' => $normatividad,
                    'link_normartividad' => $link,
                    'presupuesto' => $presupuesto
                ]
            );
           
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '2');
            
        }
        return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '3');

    }

    public function createDerecho(){

        $derechoObj = new Derecho_Social();

        
        $descripcionDerecho = $this->request->getPost('descripcionDerecho');
        $estatusDerecho = $this->request->getPost('estatusDerecho');
        
        $derecho = $derechoObj->obtenerDerecho($descripcionDerecho);

        if($derecho == null){
            if($this->validate('derechos')){
                $id = $derechoObj->insert(
                    [
                        'descripcion' => $descripcionDerecho,
                        'estatus' => $estatusDerecho
                    ]
                );
               
                return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '5');
                
            }
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '6');
            
        }
        return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '25');

    }

    public function createDependencia(){

        $dependenciaObj = new Dependencia();

        
        $descripcionDependencia = $this->request->getPost('descripcionDependencia');
        $estatusDependencia = $this->request->getPost('estatusDependencia');
        
        $dependencia = $dependenciaObj->obtenerDependencia($descripcionDependencia);

        if($dependencia == null){
            if($this->validate('dependencia')){
                $id = $dependenciaObj->insert(
                    [
                        'descripcion_D' => $descripcionDependencia,
                        'estatus_D' => $estatusDependencia
                    ]
                );
               
                return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '7');
                
            }
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '8');
        }
        return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '26');

    }

    public function createTipoApoyo(){

        $tipoObj = new Tipo_Apoyo();

        
        $descripcionApoyo = $this->request->getPost('descripcionApoyo');
        $estatusApoyo = $this->request->getPost('estatusApoyo');

        $tipo = $tipoObj->obtenerApoyo($descripcionApoyo);

        if($tipo == null){
            if($this->validate('tapoyo')){
                $id = $tipoObj->insert(
                    [
                        'descripcion_A' => $descripcionApoyo,
                        'estatus_A' => $estatusApoyo
                    ]
                );
               
                return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '9');
                
            }
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '10');
        }
        return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '27');

    }

    
    public function createNormatividad(){

        $normatividadObj = new Normatividad();

        
        $descripcion_N = $this->request->getPost('descripcion_N');
        $estatus_N = $this->request->getPost('estatus_N');
        
        $norma = $normatividadObj->obtenerNormatividad($descripcion_N);

        
        if($norma == null){
            if($this->validate('normatividad')){
                $id = $normatividadObj->insert(
                    [
                        'descripcion_N' => $descripcion_N,
                        'estatus_N' => $estatus_N
                    ]
                );
               
                return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '19');
                
            }
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '20');
        }
        return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '28');

    }

    public function editDerecho($id)
    {
        $derechoE = new Derecho_Social();
        $data = ["id_derecho" =>$id];
        $datos = $derechoE->editDerecho($data);
        $mensaje=session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $derecho = $derechoE->asObject()->find($id);

        if($derecho == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_derecho', ['validation' => $validation, 'derecho' => $derecho, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

    public function editNormatividad($id)
    {
        $normatividadE = new Normatividad();
        $data = ["id_normatividad" =>$id];
        $datos = $normatividadE->editNormatvidad($data);
        $mensaje=session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $derecho = $normatividadE->asObject()->find($id);

        if($derecho == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_normatividad', ['validation' => $validation, 'derecho' => $derecho, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

    public function editApoyo($id)
    {
        $apoyoObj = new Apoyo();
        $derechos = new Derecho_Social();
        $dependencias = new Dependencia();
        $normatividadObj = new Normatividad();
        $apoyos = new Tipo_Apoyo();
        $temas = new Temas();

        $derechoOrdenado = $derechos->obtenerDerechosActivosOrdenado();
        $temaOrdenado = $temas->obtenerTemasActivosByDescripcion();
        $dependenciaOrdenado = $dependencias->obtenerDependenciasActivasOrdenado();
        $apoyoOrdenado = $apoyos->obtenerApoyosActivosOrdenado();
        $normatividadOrdenado = $normatividadObj->obtenerNormatividadesActivasOrdenado();
        $derecho = $apoyoObj->asObject()->find($id);

        $data = ["id_derecho" =>$id];
        $datos = $apoyoObj->editApoyo($data);

        $mensaje=session('mensaje');

        $data = [
            "datos" => $datos,
        ];

        if($derecho == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();

        return view('edit_apoyo', ['validation' => $validation, 'derecho' => $derecho, 'datos'=>$datos, 
        'mensaje'=> $mensaje, 'derechoOrdenado'=>$derechoOrdenado, 'temaOrdenado'=>$temaOrdenado, 'dependenciaOrdenado'=> $dependenciaOrdenado,
        'apoyoOrdenado'=>$apoyoOrdenado, 'normatividadOrdenado'=>$normatividadOrdenado]);
    }

    public function editDependencia($id)
    {
        $dependenciaObj = new Dependencia();

        $data = ["id_dependencia" =>$id];
        $datos = $dependenciaObj->editDependencias($data);
        $dependencia = $dependenciaObj->asObject()->find($id);

        $mensaje=session('mensaje');

        $data = [
            "datos" => $datos,
        ];

        if($dependencia == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_dependencia', ['validation' => $validation, 'dependencia' => $dependencia, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

    public function editTApoyo($id)
    {
        $tapoyoObj = new Tipo_Apoyo();

        $data = ["id_tipo_apoyo" =>$id];
        $datos = $tapoyoObj->editTApoyos($data);
        $tapoyo = $tapoyoObj->asObject()->find($id);

        $mensaje=session('mensaje');

        $data = [
            "datos" => $datos,
        ];

        if($tapoyo == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_tapoyo', ['validation' => $validation, 'tapoyo' => $tapoyo, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

    public function updateTApoyo($id){

        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $descripcion_A = $this->request->getPost('descripcion_A');
        $estatus_A = $this->request->getPost('estatus_A');

        $datos= [
          "fecha_modificacion_A" => date(DB_FORMAT_DATE),
            "descripcion_A" => $descripcion_A,
            "estatus_A" => $estatus_A
        ];

        $id = $_POST['id_tipo_apoyo'];

        $tapoyoObj = new Tipo_Apoyo();

        $tapoyoObj->updateTApoyo($id, $datos);

    
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '14');
      
    }

    public function updateDependencia($id){

        $descripcion_D = $this->request->getPost('descripcion_D');
        $estatus_D = $this->request->getPost('estatus_D');
defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $datos= [
          "fecha_modificacion_D" => date(DB_FORMAT_DATE),
            "descripcion_D" => $descripcion_D,
            "estatus_D" => $estatus_D
        ];

        $id = $_POST['id_dependencia'];

        $dependenciaObj = new Dependencia();

        $dependenciaObj->updateDependencia($id, $datos);

    
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '15');
      
    }

    public function updateDerecho($id){

        $descripcion = $this->request->getPost('descripcion');
        $estatus = $this->request->getPost('estatus');
    defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $datos= [
          "fecha_modificacion" => date(DB_FORMAT_DATE),
            "descripcion" => $descripcion,
            "estatus" => $estatus
        ];
    
        $id = $_POST['id_derecho'];
    
        $derechoObj = new Derecho_Social();
    
        $derechoObj->updateDerecho($id, $datos);
    
    
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '16');
    
      
    }

    public function updateNormatividad($id){

        $descripcion_N = $this->request->getPost('descripcion_N');
        $estatus_N = $this->request->getPost('estatus_N');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $datos= [
          "fecha_modificacion_N" => date(DB_FORMAT_DATE),
            "descripcion_N" => $descripcion_N,
            "estatus_N" => $estatus_N
        ];
    
        $id = $_POST['id_normatividad'];
    
        $normatividadObj = new Normatividad();
    
        $normatividadObj->updateNormatividad($id, $datos);
    
    
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '18');
    
      
    }

    public function updateApoyo($id){

        $orden = $this->request->getPost('orden');
        $id_derecho = $this->request->getPost('id_derecho');
        $tema = $this->request->getPost('tema');
        $dependencia = $this->request->getPost('dependencia');
        $programa = $this->request->getPost('programa');
        $estatus = $this->request->getPost('estatus');
        $año = $this->request->getPost('año');
        $objetivo_general = $this->request->getPost('objetivo_general');
        $rango = $this->request->getPost('rango');
        $poblacion = $this->request->getPost('poblacion');
        $apoyo = $this->request->getPost('apoyo');
        $monto = $this->request->getPost('monto');
        $responsable = $this->request->getPost('responsable');
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $pagina = $this->request->getPost('pagina');
        $normatividad = $this->request->getPost('normatividad');
        $link = $this->request->getPost('link');
        $presupuesto = $this->request->getPost('presupuesto');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        $datos= [
          "fecha_modificacion_AP" => date(DB_FORMAT_DATE),
            'orden_gobierno' => $orden,
            'id_derecho' => $id_derecho,
            'id_tema' => $tema,
            'id_dependencia' => $dependencia,
            'programa_Social' => $programa,
            'estatus_apoyo' => $estatus,
            'año' => $año,
            'objetivo_General' => $objetivo_general,
            'rango_Edad' => $rango,
            'poblacion_Objetivo' => $poblacion,
            'id_tipo_apoyo' => $apoyo,
            'monto_Anual' => $monto,
            'responsable' => $responsable,
            'telefono' => $telefono,
            'correo' => $correo,
            'pagina_Web' => $pagina,
            'id_normatividad' => $normatividad,
            'link_normartividad' => $link,
            'presupuesto' => $presupuesto
        ];
    
        $id = $_POST['id_apoyos'];
    
        $apoyosObj = new Apoyo();
    
        $apoyosObj->updateApoyo($id, $datos);
    
    
            return redirect()->to(base_url('/apoyosAdmin'))->with('mensaje', '21');
    
      
    }    

}