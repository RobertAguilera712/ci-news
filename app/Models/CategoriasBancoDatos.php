<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasBancoDatos extends Model
{
    protected $table = 'categorias_banco_datos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['nombre', 'estatus', 'fecha_modificacion'];
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
        return $this->findAll();
    }

    public function getSubcategories($id)
    {
        $query = "SELECT * FROM subcategorias_banco_datos sbd WHERE sbd.id_categoria_banco_datos  = ?;";

        $queryResult = $this->db->query($query, [$id])->getResult();
        return $queryResult;
    }


    public function getById($id)
    {
        return $this->find($id);
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
