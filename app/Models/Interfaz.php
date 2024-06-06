<?php namespace App\Models;
    use CodeIgniter\Model;

    class Interfaz extends Model{

        protected $table ='interfaz';
        protected $primaryKey ='id_config';
        protected $allowedFields = ['nombre', 'auxiliar','estatus', 'fecha_modificacion'];

        

        public function obtenerTodos(){
            $usuario = $this->db->table('interfaz');
            $usuario->select('*');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerActivos(){
            $usuario = $this->db->table('interfaz');
            $usuario->select('*');
            $usuario->where('estatus =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function obtenerById($id){
            $usuario = $this->db->table('interfaz');
            $usuario->select('*');
            $usuario->where('id_config =', $id);
            return $usuario->get()->getResultArray();

        }

        public function updateConfig($id, $data){
            $usuario = $this->db->table('interfaz');
			$usuario->set($data);
			$usuario->where('id_config', $id);
			return $usuario ->update();
        }
    }