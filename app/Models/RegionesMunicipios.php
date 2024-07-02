<?php

namespace App\Models;

use CodeIgniter\Model;

class RegionesMunicipios extends Model
{
    protected $table = 'regiones_municipios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_region', 'id_municipio'];
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = false;
    protected $createdField = 'fecha_modificacion';
    protected $updatedField = 'fecha_modificacion';

    public function deleteMunicipiosByRegionId($id)
    {
        $query = "DELETE FROM regiones_municipios WHERE id_region = ?";

        $queryResult = $this->db->query($query, [$id]);
        return $queryResult;
    }
}
