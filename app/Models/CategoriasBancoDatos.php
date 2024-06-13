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
    public function getActiveCategories()
    {
        return $this->where('estatus', 'A')->findAll();
    }

    /**
     * Add a new category.
     *
     * @param array $data
     * @return bool|int|string
     */
    public function addCategory($data)
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
    public function editCategory($id, $data)
    {
        $data['fecha_modificacion'] = date('Y-m-d H:i:s');
        return $this->update($id, $data);
    }
}
