<?php namespace App\Models;
    use CodeIgniter\Model;

    class Propuesta extends Model{

        protected $table ='propuesta_accion';
        protected $primaryKey ='id_propuesta';
        protected $allowedFields = ['nombreC', 'sexo','edad', 'actividad','correo','id_municipio','zona','detalle','justificacion', 'necesidades','fecha_registro'];
        
        
        public function obtenerSelect(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $builder->join('propuesta_accion', 'propuesta_accion.id_municipio = municipio.id_municipio');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
    }