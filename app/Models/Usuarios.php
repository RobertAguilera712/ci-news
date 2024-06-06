<?php namespace App\Models;
    use CodeIgniter\Model;

    class Usuarios extends Model{

        protected $table ='users';
        protected $primaryKey ='id_user';
        protected $allowedFields = ['nombre', 'apellidos', 'correo','telefono','usuario', 'contrasena', 'estatus', 'fecha_modificacion'];


        public function obtenerUsuario($data){
            $usuario = $this->db->table('users');
            $usuario->where($data);
            return $usuario->get()->getResultArray();
        }

        public function readUsers(){
            return $this->findAll();
        }

        public function readUser($id){
            return $this->find($id);
        }

        public function createUser($data){
            return $this->insert($data);
        }

        public function updateUser($data, $id){
            $usuario = $this->db->table('users');
			$usuario->set($data);
			$usuario->where('id_user', $id);
			return $usuario ->update();
        }

        public function obtenerDatos($correo){
            $usuario = $this->db->table('users');
			$usuario->select('contrasena');
			$usuario->where('correo', $correo);
			return $usuario->get()->getResultArray();;

        }
    }
