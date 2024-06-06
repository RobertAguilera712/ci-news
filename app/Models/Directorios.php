<?php namespace App\Models;
    use CodeIgniter\Model;

    class Directorios extends Model{

        protected $table ='directorio';
        protected $primaryKey ='id_directorio';
        protected $allowedFields = ['descripcion','descripcionMas', 'link','estatus', 'fecha_modificacion'];

        public function readDirectorio(){
            $tema = $this->db->table('directorio');
            $tema->select('*');
			return $tema->get()->getResultArray();
        }

            
        public function updateDirectorio($id, $data){
            $usuario = $this->db->table('directorio');
			$usuario->set($data);
			$usuario->where('id_directorio', $id);
			return $usuario ->update();
        }

        public function editOrganizacion($data){
            $usuario = $this->db->table('directorio');
            $usuario->select('*');
            $usuario->where('id_directorio =', $data);
            return $usuario->get()->getResultArray();

        }


        

    }