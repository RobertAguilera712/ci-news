<?php namespace App\Models;
    use CodeIgniter\Model;

    class Comisiones extends Model{

        protected $table ='comisiones';
        protected $primaryKey ='id_comisiones';
        protected $allowedFields = ['descripcion','imagen','estatus', 'fecha_modificacion'];
        
        public function obtenerCom($data){
            $usuario = $this->db->table('comisiones');
            $usuario->where($data);
            return $usuario->get()->getResultArray();
        }

        public function readCom(){
            return $this->findAll();
        }
        public function updateCom($id, $data){
            $usuario = $this->db->table('comisiones');
			$usuario->set($data);
			$usuario->where('id_comisiones', $id);
			return $usuario ->update();
        }

    
    }