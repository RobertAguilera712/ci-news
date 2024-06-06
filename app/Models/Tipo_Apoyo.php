<?php namespace App\Models;
    use CodeIgniter\Model;

    class Tipo_Apoyo extends Model{

        protected $table ='tipo_apoyo';
        protected $primaryKey ='id_tipo_apoyo';
        protected $allowedFields = ['descripcion_A','estatus_A', 'fecha_modificacion_A'];

        public function obtenerApoyosActivos(){
            $tema = $this->db->table('tipo_apoyo');
            $tema->select('*');
			$tema->where('estatus_A =', 'A');
			return $tema->get()->getResultArray();
        }
        
        public function obtenerApoyo($tipo){
            $tema = $this->db->table('tipo_apoyo');
            $tema->select('*');
			$tema->where('descripcion_A =', $tipo);
			return $tema->get()->getResultArray();
        }

        public function obtenerTodosApoyos(){
            $tema = $this->db->table('tipo_apoyo');
            $tema->select('*');
			return $tema->get()->getResultArray();
        }

        public function editTApoyos($data){
            $usuario = $this->db->table('tipo_apoyo');
            $usuario->select('*');
            $usuario->where('id_tipo_apoyo =', $data);
            return $usuario->get()->getResultArray();

        }

        public function updateTApoyo($id, $data){
            $usuario = $this->db->table('tipo_apoyo');
			$usuario->set($data);
			$usuario->where('id_tipo_apoyo', $id);
			return $usuario ->update();
        }

        public function obtenerApoyosActivosOrdenado(){
            $tema = $this->db->table('tipo_apoyo');
            $tema->select(array('id_tipo_apoyo', 'descripcion_A', 'count(*)'));
			$tema->where('estatus_A =', 'A');
            $tema->groupby(array('id_tipo_apoyo', 'descripcion_A'));
			return $tema->get()->getResultArray();
        }

    }