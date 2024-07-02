<?php

namespace App\Models;

use CodeIgniter\Model;

class SubcategoriasBancoDatos extends Model
{
    protected $table = 'subcategorias_banco_datos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_categoria_banco_datos', 'nombre', 'estatus', 'fecha_modificacion'];
    protected $returnType = 'array';

    protected $useTimestamps = false;
    protected $createdField = 'fecha_modificacion';
    protected $updatedField = 'fecha_modificacion';

    /**
     * Get all active categories (estatus = 'A').
     *
     * @return array
     */
    public function getAll()
    {
        return $this->select('subcategorias_banco_datos.*, categorias_banco_datos.nombre AS categoria_nombre')
            ->join('categorias_banco_datos', 'subcategorias_banco_datos.id_categoria_banco_datos = categorias_banco_datos.id')
            ->findAll();
    }

    public function getById($id)
    {
        $query = "SELECT sbd.*, cbd.nombre as nombre_categoria FROM subcategorias_banco_datos sbd
                    inner join categorias_banco_datos cbd ON sbd.id_categoria_banco_datos = cbd.id
                    WHERE sbd.id  = ?;";
        $queryResult = $this->db->query($query, [$id])->getFirstRow('array');

        return $queryResult;
    }

    public function getByCategoriaId($id)
    {
        $query = "SELECT * FROM subcategorias_banco_datos sbd  where sbd.id_categoria_banco_datos  = ?;";
        $queryResult = $this->db->query($query, [$id])->getResult();

        return $queryResult;
    }

    /**
     * Add a new category.
     *
     * @param array $data
     * @return bool|int|string
     */
    public function add($data)
    {
        return $this->insert($data);
    }

    /**
     * Edit an existing category.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function edit($id, $data)
    {
        return $this->update($id, $data);
    }
}
