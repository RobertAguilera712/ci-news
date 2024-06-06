<?php namespace App\Models;
    use CodeIgniter\Model;

    class Revista extends Model{

        protected $table ='revistas';
        protected $primaryKey ='id_revista';
        protected $allowedFields = ['volumen', 'numero_year', 'descripcion', 'fecha','archivo', 'portada','estatus', 'fecha_modificacion'];

       public function crearRevista($data){
            return $this->insert($data);
        }

        public function obtenerTodasRevistas(){
            return $this->findAll();
        }

        public function obtenerRevistas(){
            $builder= $this->db->table('revistas');
            $builder->select('*');
            $builder->where('estatus =', 'A');
            $builder->orderby('estatus');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateRevista($id, $data){
            $revista = $this->db->table('revistas');
			$revista->set($data);
			$revista->where('id_revista', $id);
			return $revista ->update();
        }


        public function obtenerRevistaById($id){
            $builder= $this->db->table('revistas');
            $builder->select('*');
            $builder->where('id_revista =', $id);
             $query = $builder->get(); 
            return $query->getResultArray();

        }

        public function obtenerRevistaByNombre($nombre){
            $builder= $this->db->table('revistas');
            $builder->select('*');
            $builder->where('volumen =', $nombre);
            $query = $builder->get(); 
            return $query->getResultArray();

        }
        
    }