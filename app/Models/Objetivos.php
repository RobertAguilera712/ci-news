<?php namespace App\Models;
    use CodeIgniter\Model;

    class Objetivos extends Model{

        protected $table ='objetivos';
        protected $primaryKey ='id_objetivos';
        protected $allowedFields = ['nombre', 'descripcion','estatus', 'fecha_modificacion'];
        
        public function obtenerObj($data){
            $usuario = $this->db->table('objetivos');
            $usuario->where($data);
            return $usuario->get()->getResultArray();
        }

        public function readObj(){
            return $this->findAll();
        }
        public function updateObj($id, $data){
            $usuario = $this->db->table('objetivos');
			$usuario->set($data);
			$usuario->where('id_objetivos', $id);
			return $usuario ->update();
        }

    
    }