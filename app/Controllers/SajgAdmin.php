<?php

namespace App\Controllers;
use App\Models\General;
use App\Models\PdfConsejo;
use App\Models\IntegrantesConsejo;

class SajgAdmin extends BaseController
{
    public function index()
    {
        $generalObj = new General();
        $pdfObj = new PdfConsejo();
        $integranteObj= new IntegrantesConsejo();

        $mensaje = session('mensaje');
        $general = $generalObj->obtenerTodoGeneral();
        $generalPdf = $pdfObj->obtenertodosPdfs();

        $integrantes = $integranteObj->obtenerTodosIntegrantes();

        $data = [
            "general" => $general,
            "mensaje" => $mensaje,
            "generalPdf" => $generalPdf,
            "integrantes" => $integrantes
        ];
        
        return view('sajg_admin', $data);
    }

    public function createSajg(){
        $generalObj = new General();

        
        $objetivoS = $this->request->getPost('objetivoS');
        $significado = $this->request->getPost('significado');
        $objetivoSI = $this->request->getPost('objetivoSI');
        $significadoSI = $this->request->getPost('significadoSI');
        $objetivoAF = $this->request->getPost('objetivoAF');
        $significadoAF = $this->request->getPost('significadoAF');
        $objetivoC = $this->request->getPost('objetivoC');
        $objetivoP = $this->request->getPost('objetivoP');
        $contruccion = $this->request->getPost('contruccion');
        $estatusSA = $this->request->getPost('estatusSA');
        

        if($this->validate('general')){
            $id = $generalObj->insert(
                [
                    'objetivoS' => $objetivoS,
                    'significado' => $significado,
                    'objetivoSI' => $objetivoSI,
                    'significadoSI' => $significadoSI,
                    'objetivoAF' => $objetivoAF,
                    'significadoAF' => $significadoAF,
                    'obejtivoC' => $objetivoC,
                    'objetivoP' => $objetivoP,
                    'contruccion' => $contruccion,
                    'estatus' => $estatusSA
                ]
            );
           
            $res=$this->_uploadImageConsejo($id);
            $res2=$this->_uploadImagePrograma($id);
            
            if ($res==null && $res2==null) {
                    return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '9');
                }else if ($res ==!null){
                    return redirect()->to(base_url('/administradorSAJG/edit/'.$id))->with('mensaje', '11');
                }else if ($res2 ==!null){
                    return redirect()->to(base_url('/administradorSAJG/edit/'.$id))->with('mensaje', '11');
                }
        }
        return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '10');

    }


    public function createSajgPDF(){
        $pdfObj = new PdfConsejo();

        
        $id_general = $this->request->getPost('id_general');
        $nombre = $this->request->getPost('nombre');
        $estatus = $this->request->getPost('estatus');
        

        if($this->validate('generalPDF')){
            $id = $pdfObj->insert(
                [
                    'id_general' => $id_general,
                    'nombre' => $nombre,
                    'estatusPdf' => $estatus
                ]
            );
           
            $res3=$this->_uploadDocPDF($id);
            
            if ($res3==null) {
                    return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '15');
                }else if ($res3 ==!null){
                    return redirect()->to(base_url('/administradorSAJGPDF/editPDF/'.$id))->with('mensaje', '16');
                }
        }
        return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '10');

    }

    private function _uploadImageConsejo($id)
    {
        if($imageFile = $this->request->getFile('imagenConsejo')){
            if($imageFile->isValid() && !$imageFile->hasMoved()){
                //validaciones 
                $validated = $this->validate([
                    'imagenConsejo' => [
                        'uploaded[imagenConsejo]',
                        'mime_in[imagenConsejo,image/jpg,image/jpeg,image/gif,image/png]'
                    ]
                ]);
                if($validated){
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'images_sajg/'.$id,$newName);

                    $generalObj = new General();
                    $respuesta= $generalObj->updateSAJG($id, [
                        'imagenConsejo' => $newName
                    ]);
                    return null;
                }else{
                    return  $this->validator->getError('imagenConsejo');
                }
            }
        }

        
    }

    private function _uploadImagePrograma($id)
    {
        if($imageFile = $this->request->getFile('imagenPrograma')){
            if($imageFile->isValid() && !$imageFile->hasMoved()){
                //validaciones 
                $validated = $this->validate([
                    'imagenPrograma' => [
                        'uploaded[imagenPrograma]',
                        'mime_in[imagenPrograma,image/jpg,image/jpeg,image/gif,image/png]'
                    ]
                ]);
                if($validated){
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'images_sajg/'.$id,$newName);

                    $generalObj = new General();
                    $respuesta= $generalObj->updateSAJG($id, [
                        'imagenPrograma' => $newName
                    ]);
                    return null;
                }else{
                    return  $this->validator->getError('imagenPrograma');
                }
            }
        }

        
    }
    
    private function _uploadDocPDF($id)
    {
        if($imageFile = $this->request->getFile('pdf')){
            if($imageFile->isValid() && !$imageFile->hasMoved()){
                //validaciones 
                $validated = $this->validate([
                    'pdf' => [
                        'uploaded[pdf]',
                        'ext_in[pdf,docx,pdf]'
                    ]
                ]);
                if($validated){
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH.'public/documentos_sajg_pdf/'.$id,$newName);
    
                    $pdfObj = new PdfConsejo();
                    $respuesta= $pdfObj->updatePDF($id, [
                        'pdf' => $newName
                    ]);
                    return null;
                }else{
                    return  $this->validator->getError('pdf');
                }
            }
        }

        
    }

    public function editSAJG($id){

        $generalObj = new General();

        $data = ["id_general" =>$id];
        $datos = $generalObj->obtenerIdGeneral($data);
        $mensaje=session('mensaje');
        $general = $generalObj->asObject()->find($id);
    
        if($general == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_general', ['validation' => $validation, 'general' => $general, 'datos'=>$datos, 'mensaje'=> $mensaje]);

    }

    public function editPDF($id){
        $generalObj = new General();
        $pdfObj = new PdfConsejo();
        
        $general = $generalObj->obtenerTodoGeneral();

        $data = ["id_pdfs" =>$id];
        $datos = $pdfObj->obtenerIdPdfGeneral($data);
        $mensaje=session('mensaje');
        $generalPDF = $pdfObj->asObject()->find($id);
    
        if($generalPDF == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_general_pdf', ['validation' => $validation,'general' =>$general, 'generalPDF' => $generalPDF, 'datos'=>$datos, 'mensaje'=> $mensaje]);

    }

    public function updateSAJG($id){

        $objetivoS = $this->request->getPost('objetivoS');
        $significado = $this->request->getPost('significado');
        $objetivoC = $this->request->getPost('objetivoC');
        $objetivoP = $this->request->getPost('objetivoP');
        $contruccion = $this->request->getPost('contruccion');
        $estatus = $this->request->getPost('estatus');
        $objetivoSI = $this->request->getPost('objetivoSI');
        $significadoSI = $this->request->getPost('significadoSI');
        $objetivoAF = $this->request->getPost('objetivoAF');
        $significadoAF = $this->request->getPost('significadoAF');
        $imagenConsejo = $this->request->getPost('imagenConsejo');
        $imagenPrograma = $this->request->getPost('imagenPrograma');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        
        if($imagenConsejo ==! null and $imagenPrograma ==! null){
            $datos= [
                "objetivoS" => $objetivoS,
                "significado" => $significado,
                "obejtivoC" => $objetivoC,
                "objetivoP" => $objetivoP,
                "contruccion" => $contruccion,
                "estatus" => $estatus,
                'objetivoSI' => $objetivoSI,
                'significadoSI' => $significadoSI,
                'objetivoAF' => $objetivoAF,
                'significadoAF' => $significadoAF,
                'imagenConsejo' => $imagenConsejo,
                'imagenPrograma' => $imagenPrograma,
                "fecha_modificacion" => date(DB_FORMAT_DATE),
            ];
        }elseif($imagenConsejo ==! null and $imagenPrograma == null){
            $datos= [
                "objetivoS" => $objetivoS,
                "significado" => $significado,
                "obejtivoC" => $objetivoC,
                "objetivoP" => $objetivoP,
                "contruccion" => $contruccion,
                "estatus" => $estatus,
                'objetivoSI' => $objetivoSI,
                'significadoSI' => $significadoSI,
                'objetivoAF' => $objetivoAF,
                'significadoAF' => $significadoAF,
                'imagenConsejo' => $imagenConsejo,
                "fecha_modificacion" => date(DB_FORMAT_DATE),
            ];
        }if($imagenConsejo == null and $imagenPrograma ==! null){
            $datos= [
                "objetivoS" => $objetivoS,
                "significado" => $significado,
                "obejtivoC" => $objetivoC,
                "objetivoP" => $objetivoP,
                "contruccion" => $contruccion,
                "estatus" => $estatus,
                'objetivoSI' => $objetivoSI,
                'significadoSI' => $significadoSI,
                'objetivoAF' => $objetivoAF,
                'significadoAF' => $significadoAF,
                'imagenPrograma' => $imagenPrograma,
                "fecha_modificacion" => date(DB_FORMAT_DATE),
            ];
        }else{
            $datos= [
                "objetivoS" => $objetivoS,
                "significado" => $significado,
                "obejtivoC" => $objetivoC,
                "objetivoP" => $objetivoP,
                "contruccion" => $contruccion,
                "estatus" => $estatus,
                'objetivoSI' => $objetivoSI,
                'significadoSI' => $significadoSI,
                'objetivoAF' => $objetivoAF,
                'significadoAF' => $significadoAF,
                "fecha_modificacion" => date(DB_FORMAT_DATE),
            ];
        }

        

        $id = $_POST['id_general'];

        $generalObj = new General();

        $respuesta= $generalObj->updateSAJG($id, $datos);

            $res=$this->_uploadImageConsejo($id);
            $res2=$this->_uploadImagePrograma($id);
            
            if ($res==null && $res2==null) {
                    return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '14');
                }else if ($res ==!null){
                    return redirect()->to(base_url('administradorSAJG/edit/'.$id))->with('mensaje', '15');
                }else if ($res2 ==!null){
                    return redirect()->to(base_url('administradorSAJG/edit/'.$id))->with('mensaje', '15');
                }
    }

     public function updateSAJGPDF($id){

        $id_general = $this->request->getPost('id_general');
        $nombre = $this->request->getPost('nombre');
        $estatus = $this->request->getPost('estatus');
        $pdf = $this->request->getPost('pdf');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

        if($pdf ==! null){
            $datos= [
                "id_general" => $id_general,
                "nombre" => $nombre,
                "pdf" => $pdf,
                "estatusPdf" => $estatus,
                "fecha_modificacion" => date(DB_FORMAT_DATE),
            ];
        }else{
            $datos= [
                "id_general" => $id_general,
                "nombre" => $nombre,
                "estatusPdf" => $estatus,
                "fecha_modificacion" => date(DB_FORMAT_DATE),
            ];
        }

        $id = $_POST['id_pdfs'];

        $pdfObj = new PdfConsejo();

        $respuesta= $pdfObj->updatePDF($id, $datos);

            $res=$this->_uploadDocPDF($id);
            
            if ($res==null ) {
                    return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '16');
                }else if ($res ==!null){
                    return redirect()->to(base_url('administradorSAJG/editPDF/'.$id))->with('mensaje', '16');
                }
    }



    // INTEGRANTES

    public function createIntegrante(){
        $integranteObj = new IntegrantesConsejo();

        $nombre = $this->request->getPost('nombre');
        $cargo = $this->request->getPost('cargo');
        $cargo_consejo = $this->request->getPost('cargo_consejo');
        $importancia = $this->request->getPost('importancia');
        $estatus = $this->request->getPost('estatus');
        
        if($this->validate('integrante_consejo')){
                $id = $integranteObj->insert(
                    [
                        'nombre' => $nombre,
                        'cargo' => $cargo,
                        'cargo_consejo' => $cargo_consejo,
                        'importancia' => $importancia,
                        'estatus' => $estatus
                    ]
                );

            $res=$this->_uploadImageIntegrante($id);
            
            if ($res==null) {
                return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '17');
            }else if ($res ==!null){
                return redirect()->to(base_url('administradorSAJG/edit/'.$id))->with('mensaje', '19');
            }

        }

        return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '17');

    }

    public function editIntegrante($id)
    {
        $integranteObj = new IntegrantesConsejo();
        $data = ["id_integrante" =>$id];
        $datos = $integranteObj->obtenerIntegrante($data);
        $mensaje=session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $integrante = $integranteObj->asObject()->find($id);

        if($integrante == null){
            throw PageNotFoundException::forPageNotFound();
        }
        
        $validation = \Config\Services::validation();
        return view('edit_integranteConsejo', ['validation' => $validation, 'integrante' => $integrante, 'datos'=>$datos, 'mensaje'=> $mensaje]);
    }

    public function updateIntegrante(){

        $id = $this->request->getPost('id_integrante');
        $nombre = $this->request->getPost('nombre');
        $cargo = $this->request->getPost('cargo');
        $cargo_consejo = $this->request->getPost('cargo_consejo');
        $importancia = $this->request->getPost('importancia');
        $imagen = $this->request->getPost('imagen');
        $estatus = $this->request->getPost('estatus');
        defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');
        
        if($imagen ==! null){
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                'nombre' => $nombre,
                'cargo' => $cargo,
                'cargo_consejo' => $cargo_consejo,
                'importancia' => $importancia,
                'imagen' => $imagen,
                'estatus' => $estatus
            ];
        }else{
            $datos= [
                "fecha_modificacion" => date(DB_FORMAT_DATE),
                'nombre' => $nombre,
                'cargo' => $cargo,
                'cargo_consejo' => $cargo_consejo,
                'importancia' => $importancia,
                'estatus' => $estatus
            ];
        }

        

        

        $integranteObj = new IntegrantesConsejo();

        $respuesta= $integranteObj->updateIntegrante($id, $datos);

        $res=$this->_uploadImageIntegrante($id);
        
        if ($res==null) {
                return redirect()->to(base_url('/sajgAdmin'))->with('mensaje', '18');
            }else if ($res ==!null){
                return redirect()->to(base_url('administradorSAJG/edit/'.$id))->with('mensaje', '18');
            }
    }


    private function _uploadImageIntegrante($id)
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
                $imageFile->move(ROOTPATH.'images_integrantesConsejo/'.$id,$newName);

                $integranteObj = new IntegrantesConsejo();
                $datos= [
                    'imagen' => $newName
                ];
                $respuesta= $integranteObj->updateIntegrante($id, $datos);
                return null;
            }else{
                return  $this->validator->getError('imagen');
            }
        }
    }

        
    }


}