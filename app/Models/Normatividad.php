<?php namespace App\Models;
    use CodeIgniter\Model;

    class Normatividad extends Model{

        protected $table ='normatividad';
        protected $primaryKey ='id_normatividad';
        protected $allowedFields = ['descripcion_N','estatus_N', 'fecha_modificacion_N'];

        public function obtenerNormatividadesActivas(){
            $builder = $this->db->table('normatividad');
            $builder->select('*');
			$builder->where('estatus_N =', 'A');
			return $builder->get()->getResultArray();
        }
        
        public function obtenerNormatividad($norma){
            $builder = $this->db->table('normatividad');
            $builder->select('*');
			$builder->where('descripcion_N =', $norma);
			return $builder->get()->getResultArray();
        }

        public function obtenerTodasNormatividades(){
            $builder = $this->db->table('normatividad');
            $builder->select('*');
			return $builder->get()->getResultArray(); 
        }

        public function editNormatvidad($data){
            $builder = $this->db->table('normatividad');
            $builder->select('*');
            $builder->where('id_normatividad =', $data);
            return $builder->get()->getResultArray();

        }

        public function obtenerNormatividadesActivasOrdenado(){
            $builder = $this->db->table('normatividad');
            $builder->select(array('id_normatividad', 'descripcion_N', 'count(*)'));
			$builder->where('estatus_N =', 'A');
            $builder->groupby(array('id_normatividad', 'descripcion_N'));
			return $builder->get()->getResultArray();
        }

        public function updateNormatividad($id, $data){
            $builder = $this->db->table('normatividad');
			$builder->set($data);
			$builder->where('id_normatividad', $id);
			return $builder ->update();
        }
    }