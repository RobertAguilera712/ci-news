<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentoBancoDatos extends Model
{
    protected $table = 'documento_banco_datos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_categoria',
        'id_subcategoria',
        'id_municipio',
        'id_estado',
        'id_region',
        'nombre',
        'palabras_clave',
        'archivo',
        'autor',
        'dependencia',
        'pais',
        'fecha',
        'dia',
        'mes',
        'anio',
        'tipo',
        'estatus',
        'fecha_modificacion'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Method to get all documents with joined related tables
    public function getAll()
    {
        return $this->select('
                documento_banco_datos.*, 
                categorias_banco_datos.nombre AS nombre_categoria, 
                subcategorias_banco_datos.nombre AS nombre_subcategoria, 
                municipio.nombre AS nombre_municipio, 
                estado.nombre AS nombre_estado,
                regiones.nombre AS nombre_region
            ')
            ->join('categorias_banco_datos', 'documento_banco_datos.id_categoria = categorias_banco_datos.id', 'left')
            ->join('subcategorias_banco_datos', 'documento_banco_datos.id_subcategoria = subcategorias_banco_datos.id', 'left')
            ->join('municipio', 'documento_banco_datos.id_municipio = municipio.id_municipio', 'left')
            ->join('estado', 'documento_banco_datos.id_estado = estado.id_estado', 'left')
            ->join('regiones', 'documento_banco_datos.id_region = regiones.id', 'left')
            ->findAll();
    }

    public function getBySubcategory($id)
    {

        return $this->select('
                documento_banco_datos.*, 
                categorias_banco_datos.nombre AS nombre_categoria, 
                subcategorias_banco_datos.nombre AS nombre_subcategoria, 
                municipio.nombre AS nombre_municipio, 
                estado.nombre AS nombre_estado,
                regiones.nombre AS nombre_region
            ')
            ->join('categorias_banco_datos', 'documento_banco_datos.id_categoria = categorias_banco_datos.id', 'left')
            ->join('subcategorias_banco_datos', 'documento_banco_datos.id_subcategoria = subcategorias_banco_datos.id', 'left')
            ->join('municipio', 'documento_banco_datos.id_municipio = municipio.id_municipio', 'left')
            ->join('estado', 'documento_banco_datos.id_estado = estado.id_estado', 'left')
            ->join('regiones', 'documento_banco_datos.id_region = regiones.id', 'left')
            ->where('documento_banco_datos.id_subcategoria', $id)
            ->findAll();
    }

    public function updateDoc($id, $data)
    {
        $documento = $this->db->table('documento_banco_datos');
        $documento->set($data);
        $documento->where('id', $id);
        return $documento->update();
    }

    // Method to get document by ID with joined related tables
    public function getById($id)
    {
        return $this->select('
                documento_banco_datos.*, 
                categorias_banco_datos.nombre AS nombre_categoria, 
                subcategorias_banco_datos.nombre AS nombre_subcategoria, 
                municipio.nombre AS nombre_municipio, 
                estado.nombre AS nombre_estado,
                regiones.nombre AS nombre_region
            ')
            ->join('categorias_banco_datos', 'documento_banco_datos.id_categoria = categorias_banco_datos.id', 'left')
            ->join('subcategorias_banco_datos', 'documento_banco_datos.id_subcategoria = subcategorias_banco_datos.id', 'left')
            ->join('municipio', 'documento_banco_datos.id_municipio = municipio.id_municipio', 'left')
            ->join('estado', 'documento_banco_datos.id_estado = estado.id_estado', 'left')
            ->join('regiones', 'documento_banco_datos.id_region = regiones.id', 'left')
            ->where('documento_banco_datos.id', $id)
            ->first();
    }

    public function searchDocuments($searchData)
    {
        $builder = $this->db->table('documento_banco_datos');

        if (!empty($searchData['nombre'])) {
            $builder->like('nombre', $searchData['nombre']);
        }
        if (!empty($searchData['autor'])) {
            $builder->like('autor', $searchData['autor']);
        }
        if (!empty($searchData['dependencia'])) {
            $builder->like('dependencia', $searchData['dependencia']);
        }
        if (!empty($searchData['pais'])) {
            $builder->like('pais', $searchData['pais']);
        }
        if (!empty($searchData['palabras_clave'])) {
            $builder->like('palabras_clave', $searchData['palabras_clave']);
        }
        if (!empty($searchData['fecha'])) {
            $builder->where('fecha', $searchData['fecha']);
        }

        if (!empty($searchData['dia'])) {
            $builder->where('dia', $searchData['dia']);
        }
        if (!empty($searchData['mes'])) {
            $builder->where('mes', $searchData['mes']);
        }
        if (!empty($searchData['anio'])) {
            $builder->where('anio', $searchData['anio']);
        }
        if (!empty($searchData['id_categoria'])) {
            $builder->where('id_categoria', $searchData['id_categoria']);
        }
        if (!empty($searchData['id_subcategoria'])) {
            $builder->where('id_subcategoria', $searchData['id_subcategoria']);
        }
        if (!empty($searchData['id_municipio'])) {
            $builder->where('id_municipio', $searchData['id_municipio']);
        }
        if (!empty($searchData['id_region'])) {
            $builder->where('id_region', $searchData['id_region']);
        }
        if (!empty($searchData['id_estado'])) {
            $builder->where('id_estado', $searchData['id_estado']);
        }

        return $builder->get()->getResult('array');
    }
}
