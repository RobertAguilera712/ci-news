<?php

namespace App\Models;

use CodeIgniter\Model;

class Regiones extends Model
{
    protected $table = 'regiones';
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
        $query = "SELECT r.id, r.nombre, r.estatus, r.fecha_modificacion, STRING_AGG(m.nombre, ', ') AS municipios
                    FROM regiones r
                    LEFT JOIN regiones_municipios rm ON r.id = rm.id_region
                    LEFT JOIN municipio m ON rm.id_municipio = m.id_municipio 
                    GROUP BY r.id, r.nombre, r.estatus , r.fecha_modificacion ;";
        $queryResult = $this->db->query($query)->getResult();

        return $queryResult ;
    }

    public function getById($id)
    {
        $query = "SELECT r.id, r.nombre, r.estatus, r.fecha_modificacion AS nombre_region, STRING_AGG(m.id_municipio, ',') AS municipios
                    FROM regiones r
                    LEFT JOIN regiones_municipios rm ON r.id = rm.id_region
                    LEFT JOIN municipio m ON rm.id_municipio = m.id_municipio 
                    WHERE r.id = ?
                    GROUP BY r.id, r.nombre, r.estatus , r.fecha_modificacion;";

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
