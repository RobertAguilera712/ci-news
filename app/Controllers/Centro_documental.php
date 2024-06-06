<?php

namespace App\Controllers;
use App\Models\Investigaciones;
use App\Models\Documentos;
use App\Models\Temas_investigacion;
use App\Models\CategoriasCendoc;
use App\Models\DocumentoFisico;
use App\Models\Visita;

class Centro_documental extends BaseController
{
    public function index()
    {
        $mensaje=session('mensaje');

        $documentosObj = new Documentos();
        $categoriaObj = new CategoriasCendoc();
        $documentoFisicoObj = new DocumentoFisico();
        
        $documentosFisicos = $documentoFisicoObj->obtenerTodosDocumentosFisicos();
        $documentos = $documentosObj->obtenerDocumentos();
        $categorias = $categoriaObj->obtenerCategoriaActivo();

        return view('centro_documental',['documentos' => array_reverse($documentos), 'documentosFisicos' => $documentosFisicos,
        'categorias' => $categorias, 'mensaje'=> $mensaje]);
    }
    
    public function fisico()
    {
        $mensaje=session('mensaje');

        $documentosObj = new DocumentoFisico();
        $documentos = $documentosObj->obtenerTodosDocumentosFisicos();

        $visita = new Visita();
        $visita->sumarVisita('Centro Documental Físico');

        return view('centro_documental_fisico',['documentos' => $documentos, 'mensaje'=> $mensaje]);
    }

    public function ByNombre(){
        $mensaje=session('mensaje');
        $text = $this->request->getPost('nombre');
        $tema = $this->request->getPost('id_categoria_cendoc');
        
        $documentoObj = new Documentos();
        $categoriaObj = new CategoriasCendoc();

        $documentos = null;
        
        $categorias = $categoriaObj->obtenerCategoriaActivo();

        if (!empty($text)) {
            $documentos = $documentoObj->ByNombre($text);
            if (!empty($documentos)) {
                return view('centro_documental', ['mensaje' => '4', 'documentos' => $documentos, 'categorias' => $categorias]);
            }
            $documentos = $documentoObj->obtenerDocumentos();
            return view('centro_documental', ['mensaje' => '1', 'documentos' => $documentos, 'categorias' => $categorias]);
        } elseif (!empty($tema)) {
            $documentos = $documentoObj->ByTema($tema);
            if (!empty($documentos)) {
                return view('centro_documental', ['mensaje' => '4', 'documentos' => $documentos, 'categorias' => $categorias]);
            }
            return view('centro_documental', ['mensaje' => '3', 'documentos' => $documentos, 'categorias' => $categorias]);
        }
        $documentos = $documentoObj->obtenerDocumentos();
        return view('centro_documental', ['mensaje' => '2', 'documentos' => $documentos, 'categorias' => $categorias]); 
       
    }
    
    public function FisicoByNombre(){
        $mensaje=session('mensaje');
        $text = $this->request->getPost('nombre');
        
        $documentoObj = new DocumentoFisico();

        $documentos = null;

        if (!empty($text)) {
            $documentos = $documentoObj->ByNombre($text);
            if (!empty($documentos)) {
                return view('centro_documental_fisico', ['mensaje' => '3', 'documentos' => $documentos]);
            }
            return redirect()->to(base_url('/centro-documental-fisico'))->with('mensaje','1');
        }
        $documentos = $documentoObj->obtenerTodosDocumentosFisicos();
        return view('centro_documental_fisico', ['mensaje' => '2', 'documentos' => $documentos]); 
       
    }

    public function FisicoByClave(){
        $mensaje=session('mensaje');
        $text = $this->request->getPost('clave');
        
        $documentoObj = new DocumentoFisico();

        $documentos = null;

        if (!empty($text)) {
            $documentos = $documentoObj->ByClave($text);
            if (!empty($documentos)) {
                return view('centro_documental_fisico', ['mensaje' => '3', 'documentos' => $documentos]);
            }
            return redirect()->to(base_url('/centro-documental-fisico'))->with('mensaje','1');
        }
        $documentos = $documentoObj->obtenerTodosDocumentosFisicos();
        return view('centro_documental_fisico', ['mensaje' => '2', 'documentos' => $documentos]); 
       
    }

    public function FisicoByEditorial(){
        $mensaje=session('mensaje');
        $text = $this->request->getPost('editorial');
        
        $documentoObj = new DocumentoFisico();

        $documentos = null;

        if (!empty($text)) {
            $documentos = $documentoObj->ByEditorial($text);
            if (!empty($documentos)) {
                return view('centro_documental_fisico', ['mensaje' => '3', 'documentos' => $documentos]);
            }
            return redirect()->to(base_url('/centro-documental-fisico'))->with('mensaje','1');
        } 
        $documentos = $documentoObj->obtenerTodosDocumentosFisicos();
        return view('centro_documental_fisico', ['mensaje' => '2', 'documentos' => $documentos]); 
       
    }
}
