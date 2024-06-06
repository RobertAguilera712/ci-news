<?php namespace App\Models;
    use CodeIgniter\Model;

    class Testimonios extends Model{

        protected $table ='testimonios';
        protected $primaryKey ='id_testimonios';
        protected $allowedFields = ['id_municipio', 'descripcion','estatus', 'fecha_modificacion', 
        'nombreM', 'imagenT', 'correo', 'telefono'];

        public function obtenerTestimoniosActivos(){
            $builder= $this->db->table('municipio');
            $builder->select(array('id_testimonios','imagenT', 'nombreM', 'testimonios.id_municipio', 'descripcion', 'nombre'));
            $builder->where('estatus =', 'A');
            $builder->join('testimonios', 'testimonios.id_municipio = municipio.id_municipio');
            $builder->orderby('nombreM', 'desc');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerTodosTestimonios(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $builder->join('testimonios', 'testimonios.id_municipio = municipio.id_municipio');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function updateTestimonios($id, $data){
            $builder = $this->db->table('testimonios');
			$builder->set($data);
			$builder->where('id_testimonios', $id);
			return $builder ->update();
        }

        public function obtenerIdTestimonio($data){
            $usuario = $this->db->table('testimonios');
            $usuario->select('*');
            $usuario->where('id_testimonios =', $data);

            return $usuario->get()->getResultArray();

        }

        

    
    }