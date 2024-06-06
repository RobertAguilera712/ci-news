<?php namespace App\Models;
    use CodeIgniter\Model;

    class EncuestasLargas extends Model{

        protected $table ='encuestaslargas';
        protected $primaryKey ='id_encuestasL';
        protected $allowedFields = ['descripcion','estatus', 'enlace', 'fecha_modificacion', 'fecha_inicio', 'fecha_fin'];

        public function getEncuestasL(){
            $builder= $this->db->table('encuestaslargas');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
       
        public function getEncuestasLActivo(){
            $builder= $this->db->table('encuestaslargas');
            $builder->select('*');
            $builder->where('estatus =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerEncuestaL($data){
            $usuario = $this->db->table('encuestaslargas');
            $usuario->select('*');
            $usuario->where('id_encuestasL =', $data);

            return $usuario->get()->getResultArray();

        }

        
        public function updateEncuestasLargas($id, $data){
            $usuario = $this->db->table('encuestaslargas');
			$usuario->set($data);
			$usuario->where('id_encuestasL', $id);
			return $usuario->update();
        }

        
        
        
   
    }