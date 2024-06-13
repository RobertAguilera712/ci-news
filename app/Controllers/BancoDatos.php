<?php

namespace App\Controllers;

use App\Models\CategoriasBancoDatos;
use CodeIgniter\CLI\CLI;


class BancoDatos extends BaseController
{

    protected CategoriasBancoDatos $categorias_obj;

    public function __construct()
    {
        $this->categorias_obj = new CategoriasBancoDatos();
    }

    public function index()
    {
        $mensaje = session('mensaje');
        $categorias = $this->categorias_obj->getActiveCategories();

        $validation = \Config\Services::validation();

        return view('banco_datos', [
            'validation' => $validation, 'categorias' => $categorias,
            'mensaje' => $mensaje,
        ]);
    }

    /**
     * Add a new category.
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function createCategoria()
    {

        $data = $this->request->getPost();
        $id = $this->categorias_obj->addCategory($data);
        if (!$id){
        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Error al agregar la categoría')->with('type', 'error');
        }

        return redirect()->to(base_url('/banco-datos'))->with('mensaje', 'Categoría agregada con éxito')->with('type', 'success');
    }

}

