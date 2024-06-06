<?php namespace App\Models;
    use CodeIgniter\Model;

    class Investigadores extends Model{

        protected $table ='investigadores';
        protected $primaryKey ='id_investigadores';
        protected $allowedFields = ['nombre', 'descripcion','imagen','estatus', 'fecha_modificacion'];
        
        
        public function obtenerInv($data){
            $usuario = $this->db->table('investigadores');
            $usuario->where($data);
            return $usuario->get()->getResultArray();
        }

        public function readInv(){
            return $this->findAll();
        }
        public function updateInv($id, $data){
            $usuario = $this->db->table('investigadores');
			$usuario->set($data);
			$usuario->where('id_investigadores', $id);
			return $usuario ->update();
        }

    }