<?php

namespace App\Controllers;

use App\Models\CategoriasCendoc;
use App\Models\Documentos;
use App\Models\DocumentoFisico;
use App\Models\Municipios;
use App\Models\Investigaciones;
use App\Models\Temas_investigacion;
use App\Models\Visita;
use DateTime;

class Cendoc extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');

        $documentosObj = new Documentos();
        $categorias = $documentosObj->obtenerCategoriasDocumento();
        $documentos = $documentosObj->obtenerDocumentos();

        $documentoFisicoObj = new DocumentoFisico();
        $documentosFisicos = $documentoFisicoObj->obtenerTodosDocumentosFisicos();

        $validation = \Config\Services::validation();

        return view('cendoc_admin', [
            'validation' => $validation, 'categorias' => $categorias,
            'mensaje' => $mensaje, 'documentos' => $documentos, 'documentosFisicos' => $documentosFisicos
        ]);
    }

    public function createDoc()
    {

        $documentoObj = new Documentos();


        $nombre = $this->request->getPost('nombre');
        $autor = $this->request->getPost('autor');
        $fecha = $this->request->getPost('fecha');
        $id_categoria = $this->request->getPost('id_categoria');
        $archivo_documento = $this->request->getPost('archivo_documento');
        $estatus_documento = $this->request->getPost('estatus_documento');
        $descripcion = $this->request->getPost('descripcion');

        $documento = $documentoObj->obtenerDocumentoByNombre($nombre);


        if ($documento == null) {
            if ($this->validate('documento_cendoc')) {
                $id = $documentoObj->insert(
                    [
                        'nombre_documento' => $nombre,
                        'autor_documento' => $autor,
                        'fecha_documento' => $fecha,
                        'id_categoria_cendoc' => $id_categoria,
                        'archivo_documento' => $archivo_documento,
                        'estatus_documento' => $estatus_documento,
                        'descripcion_documento' => $descripcion
                    ]
                );

                $res = $this->_uploadDoc($id);

                if ($res == null) {
                    return redirect()->to(base_url('/cendoc'))->with('mensaje', '2');
                } else if ($res == !null) {
                    return redirect()->to(base_url('/cendoc/edit/' . $id))->with('mensaje', '4');
                }

                return redirect()->to(base_url('/cendoc'))->with('mensaje', '2');
            }
            return redirect()->to(base_url('/cendoc'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('/cendoc'))->with('mensaje', '9');
    }

    public function ByNombre()
    {
        $text = $this->request->getPost('nombre');
        $tema = $this->request->getPost('id_categoria_cendoc');

        $documentoObj = new Documentos();
        $documentosNombre = $documentoObj->ByNombre($text);
        $documentosCategoria = $documentoObj->ByTema($tema);
        $categoriaObj = new CategoriasCendoc();
        $categorias = $categoriaObj->obtenerCategoriaActivo();

        $estadisticas = new Municipios();
        $mensaje = session('mensaje');
        $municipio = $estadisticas->obtenerTodosMunicipios();

        $status = 'A';
        $temasObj = new Temas_investigacion();
        $temas = $temasObj->obtenerTemasActivosByDescripcion();
        $investigacionR = new Investigaciones();
        $investigaciones = $investigacionR->where('estatus', $status)->obtenerTemasInvestigacionesActivos();

        if ($text == !null) {

            if ($documentosNombre == !null) {
                return view('estadisticas e indicadores', [
                    'investigaciones' => $investigaciones, 'itemsTabla' => $temas,
                    'mensaje' => $mensaje, 'municipio' => $municipio, 'documentos' => $documentosNombre, 'categorias' => $categorias
                ]);
            }
            return redirect()->to(base_url('estadisticas e indicadores'))->with('mensaje', '1');
        } else if ($tema == !null) {
            if ($documentosCategoria == !null) {
                return view('estadisticas e indicadores', [
                    'investigaciones' => $investigaciones, 'itemsTabla' => $temas,
                    'mensaje' => $mensaje, 'municipio' => $municipio, 'documentos' => $documentosCategoria, 'categorias' => $categorias
                ]);
            }
            return redirect()->to(base_url('estadisticas e indicadores'))->with('mensaje', '3');
        }
        return redirect()->to(base_url('estadisticas e indicadores'))->with('mensaje', '2');
    }

    public function editDoc($id)
    {
        $documentoObj = new Documentos();
        $temas = new CategoriasCendoc();

        $data = ["id_documento" => $id];
        $datos = $documentoObj->obtenerCat($data);
        $tema = $temas->findAll();
        $mensaje = session('mensaje');
        $data = [
            "datos" => $datos,
        ];
        $investigacion = $documentoObj->asObject()->find($id);

        if ($investigacion == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_documento', ['validation' => $validation, 'investigacion' => $investigacion, 'datos' => $datos, 'mensaje' => $mensaje, 'tema' => $tema]);
    }

    public function updateDoc($id)
    {

        $id_categoria_cendoc = $this->request->getPost('id_categoria_cendoc');
        $archivo_documento = $this->request->getPost('archivo_documento');

        if ($archivo_documento == !null) {
            $datos = [
                // "fecha_modificacion" => date(DB_FORMAT_DATE),
                "nombre_documento" => $_POST['nombre_documento'],
                "descripcion_documento" => $_POST['descripcion_documento'],
                "fecha_documento" => $_POST['fecha_documento'],
                "archivo_documento" => $archivo_documento,
                "estatus_documento" => $_POST['estatus_documento'],
                "id_categoria_cendoc" => $id_categoria_cendoc
            ];
        } else {
            $datos = [
                // "fecha_modificacion" => date(DB_FORMAT_DATE),
                "nombre_documento" => $_POST['nombre_documento'],
                "descripcion_documento" => $_POST['descripcion_documento'],
                "fecha_documento" => $_POST['fecha_documento'],
                "estatus_documento" => $_POST['estatus_documento'],
                "id_categoria_cendoc" => $id_categoria_cendoc
            ];
        }


        $id = $_POST['id_documento'];

        $documentoObj = new Documentos();

        $respuesta = $documentoObj->updateDoc($id, $datos);

        $res = $this->_uploadDoc($id);


        if ($res == null) {
            return redirect()->to(base_url('/cendoc'))->with('mensaje', '1');
        } else if ($res  == !null) {
            return redirect()->to(base_url('/cendoc/editDoc/' . $id))->with('mensaje', '3');
        }
    }

    private function _uploadDoc($id)
    {
        if ($imageFile = $this->request->getFile('archivo_documento')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                //validaciones 
                $validated = $this->validate([
                    'archivo_documento' => [
                        'uploaded[archivo_documento]',
                        'ext_in[archivo_documento,docx,pdf]'
                    ]
                ]);
                if ($validated) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/documentos_cendoc/' . $id, $newName);

                    $documentoObj = new Documentos();
                    $respuesta = $documentoObj->updateDoc($id, [
                        'archivo_documento' => $newName
                    ]);
                    return null;
                } else {
                    return  $this->validator->getError('archivo_documento');
                }
            }
        }
    }

    public function agregarVisitaCendocDigital()
    {
        $visita = new Visita();
        $visita->sumarVisita('Centro Documental Digital');

        $response = [
            'success' => true,
            'message' => 'Visit added successfully',
        ];

        header('Content-Type: application/json');

        echo json_encode($response);
    }



    // ---------------------- CATEGORIAS --------------

    public function createCategoriaDoc()
    {

        $categoriasObj = new CategoriasCendoc();

        $estatus_categoria = $this->request->getPost('estatus_categoria');
        $nombre_categoria = $this->request->getPost('nombre_categoria');

        $categoria = $categoriasObj->ObtenerCategoria($nombre_categoria);

        if ($categoria == null) {
            if ($this->validate('categorias_cendoc')) {
                $id = $categoriasObj->insert(
                    [
                        'nombre_categoria_cendoc' => $nombre_categoria,
                        'estatus_categoria_cendoc' => $estatus_categoria,
                    ]
                );
            }
            return redirect()->to(base_url('/cendoc'))->with('mensaje', '2');
        }
        return redirect()->to(base_url('/cendoc'))->with('mensaje', '11');
    }

    public function edit($id)
    {
        $categoriasObj = new CategoriasCendoc();
        $data = ["id_categoria_cendoc" => $id];
        $datos = $categoriasObj->ObtenerCategoriasDoc($data);
        $categoria = $categoriasObj->asObject()->find($id);

        $mensaje = session('mensaje');

        $data = [

            "datos" => $datos,
        ];



        if ($categoria == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_categoriaCendoc', [
            'validation' => $validation, 'categoria' => $categoria,
            'datos' => $datos, 'mensaje' => $mensaje
        ]);
    }

    public function updateCategoriaDocumento($id)
    {

        $datos = [
            // "fecha_modificacion" => date(DB_FORMAT_DATE),
            "nombre_categoria_cendoc" => $_POST['nombre_categoria_cendoc'],
            "estatus_categoria_cendoc" => $_POST['estatus_categoria_cendoc']
        ];

        $id = $_POST['id_categoria_cendoc'];

        $categoriaObj = new CategoriasCendoc();

        $respuesta = $categoriaObj->updateCategoriaDoc($id, $datos);
        return redirect()->to(base_url('/cendoc'))->with('mensaje', '6');
    }


    //------------ DOCUMENTOS FISICOS ----------------------------------

    public function createDocFisico()
    {

        $documentoObj = new DocumentoFisico();


        $titulo = $this->request->getPost('titulo');
        $clave = $this->request->getPost('clave');
        $editorial = $this->request->getPost('editorial');
        $tipo = $this->request->getPost('tipo');
        $ejemplares = $this->request->getPost('ejemplares');
        $estatus = $this->request->getPost('estatus');

        $documento = $documentoObj->obtenerDocumentoByClave($clave);

        if ($documento == null) {
            if ($this->validate('documento_fisico')) {
                $id = $documentoObj->insert(
                    [
                        'titulo' => $titulo,
                        'clave' => $clave,
                        'editorial' => $editorial,
                        'tipo' => $tipo,
                        'ejemplares' => $ejemplares,
                        'estatus' => $estatus
                    ]
                );
            }
            return redirect()->to(base_url('/cendoc'))->with('mensaje', '8');
        }
        return redirect()->to(base_url('/cendoc'))->with('mensaje', '10');
    }

    public function editDocFisico($id)
    {
        $documentoObj = new DocumentoFisico();
        $documento = $documentoObj->obtenerDocumentoById($id);
        $mensaje = session('mensaje');

        $validation = \Config\Services::validation();
        return view('edit_documento_fisico', ['validation' => $validation, 'documento' => $documento,  'mensaje' => $mensaje]);
    }

    public function updateDocFisico($id)
    {

        $datos = [
            "titulo" => $_POST['titulo'],
            "clave" => $_POST['clave'],
            "editorial" => $_POST['editorial'],
            "ejemplares" => $_POST['ejemplares'],
            "tipo" => $_POST['tipo'],
            "estatus" => $_POST['estatus'],
            // "fecha_modificacion" => date(DB_FORMAT_DATE),
        ];

        $id = $_POST['id_documento'];

        $documentoObj = new DocumentoFisico();

        $respuesta = $documentoObj->updateDoc($id, $datos);

        return redirect()->to(base_url('/cendoc'))->with('mensaje', '7');
    }
}
