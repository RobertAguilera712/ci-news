<?php namespace App\Models;
    use CodeIgniter\Model;

    class Dependencia extends Model{

        protected $table ='dependencia';
        protected $primaryKey ='id_dependencia';
        protected $allowedFields = ['descripcion_D','estatus_D', 'fecha_modificacion_D'];

        public function obtenerDependenciasActivas(){
            $tema = $this->db->table('dependencia');
            $tema->select('*');
			$tema->where('estatus_D =', 'A');
			return $tema->get()->getResultArray();
        }
        
        public function obtenerDependencia($descripcion){
            $tema = $this->db->table('dependencia');
            $tema->select('*');
			$tema->where('descripcion_D =', $descripcion);
			return $tema->get()->getResultArray();
        }
        
        public function obtenerTodasDependencias(){
            $tema = $this->db->table('dependencia');
            $tema->select('*');
			return $tema->get()->getResultArray();
        }

        public function editDependencias($data){
            $usuario = $this->db->table('dependencia');
            $usuario->select('*');
            $usuario->where('id_dependencia =', $data);
            return $usuario->get()->getResultArray();

        }

        public function updateDependencia($id, $data){
            $usuario = $this->db->table('dependencia');
			$usuario->set($data);
			$usuario->where('id_dependencia', $id);
			return $usuario ->update();
        }

        public function obtenerDependenciasActivasOrdenado(){
            $tema = $this->db->table('dependencia');
            $tema->select(array('id_dependencia', 'descripcion_D', 'count(*)'));
			$tema->where('estatus_D =', 'A');
            $tema->groupby(array('id_dependencia', 'descripcion_D'));
			return $tema->get()->getResultArray();
        }


    }