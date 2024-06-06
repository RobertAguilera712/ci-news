<?php namespace App\Models;
    use CodeIgniter\Model;

    class Temas_investigacion extends Model{

        protected $table ='temas_investigacion';
        protected $primaryKey ='id_tema';
        protected $allowedFields = ['nombre_tema', 'estatus','fecha_modificacion'];

        public function obtenerTemasActivosByDescripcion(){
            $tema = $this->db->table('temas_investigacion');
            $tema->select(array('nombre_tema','id_tema', 'count(*)'));
			$tema->where('estatus=', 'A');
            $tema->groupby(array('nombre_tema', 'id_tema'));
			return $tema->get()->getResultArray();
        }

        public function ByTema($tema){
            $usuario = $this->db->table('temas_investigacion');
            $usuario->select('*');
			$usuario->where('nombre_tema',$tema);
            $usuario->where('estatus=', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function ObtenerTemasInv($data){
            $usuario = $this->db->table('temas_investigacion');
            $usuario->select('*');
            $usuario->where('id_tema =', $data);
            return $usuario->get()->getResultArray();

        }

        public function updateTemaInv($id, $data){
            $tema = $this->db->table('temas_investigacion');
			$tema->set($data);
			$tema->where('id_tema', $id);
			return $tema ->update();
        }


       

    }