<?php

namespace App\Controllers;

use App\Models\CategoriasBancoDatos;
use App\Models\DocumentoBancoDatos;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Regiones;
use App\Models\RegionesMunicipios;
use App\Models\SubcategoriasBancoDatos;
use CodeIgniter\CLI\CLI;


class BancoDatos extends BaseController
{

    protected CategoriasBancoDatos $categorias_obj;
    protected SubcategoriasBancoDatos $subcategorias_obj;
    protected Regiones $regiones_obj;
    protected RegionesMunicipios $regiones_municipios_obj;
    protected Municipios $munipios_obj;
    protected Estados $estados_obj;
    protected DocumentoBancoDatos $documentos_obj;

    public function __construct()
    {
        $this->categorias_obj = new CategoriasBancoDatos();
        $this->subcategorias_obj = new SubcategoriasBancoDatos();
        $this->regiones_obj = new Regiones();
        $this->regiones_municipios_obj = new RegionesMunicipios();
        $this->munipios_obj = new Municipios();
        $this->estados_obj = new Estados();
        $this->documentos_obj = new DocumentoBancoDatos();
    }

    public function index()
    {
        $mensaje = session('mensaje');
        $categorias = $this->categorias_obj->getAll();
        $subcategorias = $this->subcategorias_obj->getAll();
        $regiones = $this->regiones_obj->getAll();
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();
        $estados = $this->estados_obj->obtenerTodosEstados();
        $documentos = $this->documentos_obj->getAll();

        $validation = \Config\Services::validation();

        return view('banco_datos', [
            'validation' => $validation,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'regiones' => $regiones,
            'documentos' => $documentos,
            'municipios' => $municipios,
            'estados' => $estados,
            'mensaje' => $mensaje,
        ]);
    }

    public function browseCategories()
    {
        $mensaje = session('mensaje');
        $categorias = $this->categorias_obj->getAll();
        $subcategorias = $this->subcategorias_obj->getAll();
        $regiones = $this->regiones_obj->getAll();
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();
        $estados = $this->estados_obj->obtenerTodosEstados();

        $validation = \Config\Services::validation();

        return view('browse_categories', [
            'validation' => $validation,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'regiones' => $regiones,
            'municipios' => $municipios,
            'estados' => $estados,
            'mensaje' => $mensaje,
        ]);
    }

    public function browseSubcategories($id)
    {

        $mensaje = session('mensaje');

        $categorias = $this->categorias_obj->getAll();
        $subcategorias = $this->subcategorias_obj->getAll();
        $regiones = $this->regiones_obj->getAll();
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();
        $estados = $this->estados_obj->obtenerTodosEstados();
        $category = $this->categorias_obj->getById($id);

        if ($category == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $subcategorias_browse = $this->categorias_obj->getSubcategories($id);

        $validation = \Config\Services::validation();

        return view('browse_subcategories', [
            'validation' => $validation,
            'category' => $category,
            'subcategorias_browse' => $subcategorias_browse,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'regiones' => $regiones,
            'municipios' => $municipios,
            'estados' => $estados,
            'mensaje' => $mensaje,
        ]);
    }

    public function browseDocuments($id)
    {

        $mensaje = session('mensaje');

        $categorias = $this->categorias_obj->getAll();
        $subcategorias = $this->subcategorias_obj->getAll();
        $regiones = $this->regiones_obj->getAll();
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();
        $estados = $this->estados_obj->obtenerTodosEstados();
        $subcategory = $this->subcategorias_obj->getById($id);

        if ($subcategory == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $docs = $this->documentos_obj->getBySubcategory($id);

        $validation = \Config\Services::validation();

        return view('browse_docs', [
            'validation' => $validation,
            'subcategory' => $subcategory,
            'docs' => $docs,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'regiones' => $regiones,
            'municipios' => $municipios,
            'estados' => $estados,
            'mensaje' => $mensaje,
        ]);
    }

    public function browseDocumentsSearch()
    {
        $mensaje = session('mensaje');
        $categorias = $this->categorias_obj->getAll();
        $regiones = $this->regiones_obj->getAll();
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();
        $estados = $this->estados_obj->obtenerTodosEstados();

        $searchData = $this->request->getGet();

        $subcategorias = [];
        if (!empty($searchData['id_categoria'])) {
            $subcategorias = $this->subcategorias_obj->getByCategoriaId($searchData['id_categoria']);
        }

        $docs = $this->documentos_obj->searchDocuments($searchData);

        $validation = \Config\Services::validation();

        return view('browse_search', [
            'validation' => $validation,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'regiones' => $regiones,
            'municipios' => $municipios,
            'estados' => $estados,
            'docs' => $docs,
            'searchData' => $searchData,
            'mensaje' => $mensaje,
        ]);
    }

    public function getDocDetails()
    {
        $id_doc = $this->request->getGet("id_doc");
        $doc = $this->documentos_obj->getById($id_doc);
        return view('get_doc_details', ['doc' => $doc]);
    }

    public function getSubcategoriasOptions()
    {
        $id_categoria = $this->request->getGet("id_categoria");
        $subcategorias = [];
        if (is_numeric($id_categoria) && $id_categoria > 0) {
            $subcategorias = $this->subcategorias_obj->getByCategoriaId($id_categoria);
        }
        return view('get_subcategorias_banco', ['subcategorias' => $subcategorias]);
    }

    public function createDocBanco()
    {
        if (!$this->validate('doc_banco')) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar el documento. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'autor' => $this->request->getPost('autor'),
            'dependencia' => $this->request->getPost('dependencia'),
            'pais' => $this->request->getPost('pais'),
            'palabras_clave' => $this->request->getPost('palabras_clave'),
            'id_categoria' => $this->request->getPost('id_categoria'),
            'id_subcategoria' => $this->request->getPost('id_subcategoria'),
        ];

        // Optional fields

        // $optionalFields = ['id_estado'];
        // foreach ($optionalFields as $field) {
        //     if ($this->request->getPost($field)) {
        //         $data[$field] = $this->request->getPost($field);
        //     }
        // }

        if ($this->request->getPost('dia')) {
            $data['dia'] = $this->request->getPost('dia');
        }

        if ($this->request->getPost('mes')) {
            $data['mes'] = $this->request->getPost('mes');
        }

        if ($this->request->getPost('anio')) {
            $data['anio'] = $this->request->getPost('anio');
        }

        if ($this->request->getPost('fecha')) {

            $fecha = $this->request->getPost('fecha');
            $data['fecha'] = $fecha;
            $date = new \DateTime($fecha);

            // Extract the day, month, and year
            $day = $date->format('d');
            $month = $date->format('m');
            $year = $date->format('Y');
            $data['dia'] = $day;
            $data['mes'] = $month;
            $data['anio'] = $year;
        }


        if ($this->request->getPost('id_estado')) {
            $data['id_estado'] = $this->request->getPost('id_estado');
            $data['pais'] = "México";
        }
        if ($this->request->getPost('id_region')) {
            $data['id_region'] = $this->request->getPost('id_region');
            $data['id_estado'] = 11;
            $data['pais'] = "México";
        }
        if ($this->request->getPost('id_municipio')) {
            $data['id_municipio'] = $this->request->getPost('id_municipio');
            $data['id_estado'] = 11;
            $data['pais'] = "México";
        }

        // Insert the data
        $id = $this->documentos_obj->insert($data);
        if (!$id) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al agregar el documento')->with('type', 'error');
        }

        $error = $this->_uploadDoc($id);
        if ($error) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al subir el documento')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Documento agregado con éxito.')->with('type', 'success');
    }

    public function editDocumento($id)
    {

        $doc = $this->documentos_obj->getById($id);
        $categorias = $this->categorias_obj->getAll();
        $regiones = $this->regiones_obj->getAll();
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();
        $estados = $this->estados_obj->obtenerTodosEstados();
        $documentos = $this->documentos_obj->getAll();

        if ($doc == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $subcategorias = $this->subcategorias_obj->getByCategoriaId($doc['id_categoria']);

        $validation = \Config\Services::validation();
        return view('edit_doc_banco', [
            'validation' => $validation, 'doc' => $doc,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'regiones' => $regiones,
            'municipios' => $municipios,
            'estados' => $estados,
        ]);
    }

    public function editDocumentoPost($id)
    {

        if (!$this->validate('doc_banco')) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar el documento. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'autor' => $this->request->getPost('autor'),
            'dependencia' => $this->request->getPost('dependencia'),
            'pais' => $this->request->getPost('pais'),
            'palabras_clave' => $this->request->getPost('palabras_clave'),
            'id_categoria' => $this->request->getPost('id_categoria'),
            'estatus' => $this->request->getPost('estatus'),
            'id_subcategoria' => $this->request->getPost('id_subcategoria'),
        ];

        // Optional fields

        if ($this->request->getPost('dia')) {
            $data['dia'] = $this->request->getPost('dia');
        }

        if ($this->request->getPost('mes')) {
            $data['mes'] = $this->request->getPost('mes');
        }

        if ($this->request->getPost('anio')) {
            $data['anio'] = $this->request->getPost('anio');
        }

        if ($this->request->getPost('fecha')) {

            $fecha = $this->request->getPost('fecha');
            $data['fecha'] = $fecha;
            $date = new \DateTime($fecha);

            // Extract the day, month, and year
            $day = $date->format('d');
            $month = $date->format('m');
            $year = $date->format('Y');
            $data['dia'] = $day;
            $data['mes'] = $month;
            $data['anio'] = $year;
        }

        if ($this->request->getPost('id_estado')) {
            $data['id_estado'] = $this->request->getPost('id_estado');
            $data['pais'] = "México";
        }
        if ($this->request->getPost('id_region')) {
            $data['id_region'] = $this->request->getPost('id_region');
            $data['id_estado'] = 11;
            $data['pais'] = "México";
        }
        if ($this->request->getPost('id_municipio')) {
            $data['id_municipio'] = $this->request->getPost('id_municipio');
            $data['id_estado'] = 11;
            $data['pais'] = "México";
        }

        // Insert the data
        $updated = $this->documentos_obj->update($id, $data);
        if (!$updated) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al editar el documento')->with('type', 'error');
        }

        $error = $this->_uploadDoc($id);
        if ($error) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al subir el nuevo documento')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Documento editado con éxito.')->with('type', 'success');
    }


    private function _uploadDoc($id)
    {
        if ($imageFile = $this->request->getFile('archivo_documento')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                // Validations 
                $validated = $this->validate([
                    'archivo_documento' => [
                        'uploaded[archivo_documento]',
                        'ext_in[archivo_documento,docx,pdf,xlsx,xls,csv]'
                    ]
                ]);

                if ($validated) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(ROOTPATH . 'public/documentos_banco/' . $id, $newName);

                    // Get file extension
                    $fileExtension = $imageFile->getClientExtension();

                    $respuesta = $this->documentos_obj->updateDoc($id, [
                        'archivo' => $newName,
                        'tipo' => $fileExtension
                    ]);
                    if (!$respuesta) {
                        return "error";
                    }
                    return null;
                } else {
                    return $this->validator->getError('archivo_documento');
                }
            }
        }
    }


    /**
     * Add a new category.
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function createCategoria()
    {
        if (!$this->validate('categoria_banco_datos')) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar la categoría. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }
        $data = $this->request->getPost();
        $id = $this->categorias_obj->add($data);
        if (!$id) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al agregar la categoría')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Categoría agregada con éxito')->with('type', 'success');
    }

    public function createSubcategoria()
    {
        if (!$this->validate('subcategoria_banco_datos')) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar la subcategoría. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }
        $data = $this->request->getPost();
        $id = $this->subcategorias_obj->add($data);
        if (!$id) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al agregar la subcategoría')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Subcategoría agregada con éxito')->with('type', 'success');
    }

    public function createRegion()
    {
        $rules = [
            'nombre' => 'required|max_length[255]',
            'municipios' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar la region. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }

        $regionData = [
            'nombre' => $this->request->getPost('nombre'),
        ];

        $id = $this->regiones_obj->insert($regionData);
        if (!$id) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al agregar la región')->with('type', 'error');
        }

        $municipios = $this->request->getPost('municipios');
        foreach ($municipios as $municipioId) {
            $this->regiones_municipios_obj->insert([
                'id_region' => $id,
                'id_municipio' => $municipioId
            ]);
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Subcategoría agregada con éxito')->with('type', 'success');
    }

    public function editCategoria($id)
    {

        $categoria = $this->categorias_obj->getById($id);

        if ($categoria == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_categoria_banco', ['validation' => $validation, 'categoria' => $categoria]);
    }

    public function editSubcategoria($id)
    {

        $subcategoria = $this->subcategorias_obj->getById($id);
        $categorias = $this->categorias_obj->getAll();

        if ($subcategoria == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_subcategoria_banco', ['validation' => $validation, 'subcategoria' => $subcategoria, 'categorias' => $categorias]);
    }

    public function editRegion($id)
    {
        $region = $this->regiones_obj->getById($id);
        $municipios = $this->munipios_obj->obtenerTodosMunicipios();

        if ($region == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        return view('edit_region', ['validation' => $validation, 'region' => $region, 'municipios' => $municipios]);
    }

    public function editCategoriaPost($id)
    {

        if (!$this->validate('categoria_banco_datos')) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar la categoría. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }
        $data = $this->request->getPost();

        $res = $this->categorias_obj->edit($id, $data);
        if (!$res) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al editar la categoría')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Categoría editada con éxito')->with('type', 'success');
    }

    public function editSubcategoriaPost($id)
    {

        if (!$this->validate('subcategoria_banco_datos')) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al editar la subcategoría. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }
        $data = $this->request->getPost();

        $res = $this->subcategorias_obj->edit($id, $data);
        if (!$res) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al editar la subcategoria')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Subcategoría editada con éxito')->with('type', 'success');
    }

    public function editRegionPost($id)
    {

        $rules = [
            'nombre' => 'required|max_length[255]',
            'municipios' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->to(base_url('/banco-datos'))->with('mensaje', "Error al agregar la region. No has llenado todo los campos requeridos de manera correcta.")->with('type', 'error');
        }
        $regionData = [
            'nombre' => $this->request->getPost('nombre'),
            'estatus' => $this->request->getPost('estatus'),
        ];

        $res = $this->regiones_obj->edit($id, $regionData);
        if (!$res) {
            return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al editar la región')->with('type', 'error');
        }


        $municipios = $this->request->getPost('municipios');
        $this->regiones_municipios_obj->deleteMunicipiosByRegionId($id);
        foreach ($municipios as $municipioId) {
            $this->regiones_municipios_obj->insert([
                'id_region' => $id,
                'id_municipio' => $municipioId
            ]);
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Subcategoría agregada con éxito')->with('type', 'success');
    }
}
