<?php namespace App\Models;
    use CodeIgniter\Model;

    class Estados extends Model{

        protected $table ='estado';
        protected $primaryKey ='id_estado';
        protected $allowedFields = ['nombre'];
        
        
        public function obtenerTodosEstados(){
            $builder= $this->db->table('estado');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerEstado($id){
            $builder = $this->db->table('estado');
            $builder->select('*');
            $builder->where('id_estado=',$id);
            return $builder->get()->getResultArray();
        }

        public function obtenerEstadistica($data){
            $builder = $this->db->table('estado');
            $builder->where($data);
            return $builder->get()->getResultArray();
        }

        public function updateEstado($id, $data){
            $builder = $this->db->table('estado');
			$builder->set($data);
			$builder->where('id_estado', $id);
			return $builder ->update();
        }

        public function obtenerTestimoniosEstado($id){
            $builder= $this->db->table('estado');
            $builder->select('*');
            $builder->where('id_estado', $id);
            $query = $builder->get(); 
            return $query->getResultArray();
        }

    }