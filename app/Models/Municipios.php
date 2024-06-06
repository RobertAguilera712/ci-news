<?php namespace App\Models;
    use CodeIgniter\Model;

    class Municipios extends Model{

        protected $table ='municipio';
        protected $primaryKey ='id_municipio';
        protected $allowedFields = ['nombre', 'Fecha_Captura', 'pdf'];
        
        
        public function obtenerTodosMunicipios(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerMunicipio($id){
            $builder = $this->db->table('municipio');
            $builder->select('*');
            $builder->where('id_municipio=',$id);
            return $builder->get()->getResultArray();
        }

        public function obtenerEstadistica($data){
            $builder = $this->db->table('municipio');
            $builder->where($data);
            return $builder->get()->getResultArray();
        }

        public function updateMunicipio($id, $data){
            $builder = $this->db->table('municipio');
			$builder->set($data);
			$builder->where('id_municipio', $id);
			return $builder ->update();
        }

        public function obtenerTestimoniosMunicipio($id){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $builder->where('id_municipio', $id);
            $query = $builder->get(); 
            return $query->getResultArray();
        }

    }