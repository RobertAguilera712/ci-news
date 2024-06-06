<?php namespace App\Models;
    use CodeIgniter\Model;

    class Slider extends Model{

        protected $table ='slider';
        protected $primaryKey ='id_slider';
        protected $allowedFields = ['descripcion','estatus', 'fecha_modificacion'];
        
        public function obtenerSlider(){
            $builder = $this->db->table('slider');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        public function obtenerSliderActivo(){
            $builder = $this->db->table('slider');
            $builder->select('*');
            $builder->where('estatus =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerSliderID($data){
            $usuario = $this->db->table('slider');
            $usuario->select('*');
            $usuario->where('id_slider =', $data);

            return $usuario->get()->getResultArray();
        }

            
        public function updateSlider($id, $data){
            $usuario = $this->db->table('slider');
			$usuario->set($data);
			$usuario->where('id_slider', $id);
			return $usuario ->update();
        }
        
    
    }