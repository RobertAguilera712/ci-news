<?php namespace App\Models;
    use CodeIgniter\Model;

    class ArticulosRevista extends Model{

        protected $table ='articulos_revista';
        protected $primaryKey ='id_articulo';
        protected $allowedFields = ['id_revista','titulo', 'autor', 'contenido', 'imagen','estatus', 'fecha_modificacion'];

       public function crearArticulosRevista($data){
            return $this->insert($data);
        }

        public function obtenerTodasArticulosRevista(){
            return $this->findAll();
        }

        public function obtenerArticulosRevista($id){
            $builder= $this->db->table('articulos_revista');
            $builder->select('*');
            $builder->where('estatus =', 'A');
            $builder->where('id_revista =', $id);
            $builder->orderby('estatus');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerArticuloRevista($id){
            $builder= $this->db->table('articulos_revista');
            $builder->select('*');
            $builder->where('estatus =', 'A');
            $builder->where('id_articulo =', $id);
            $builder->orderby('estatus');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateArticuloRevista($id, $data){
            $revista = $this->db->table('articulos_revista');
			$revista->set($data);
			$revista->where('id_articulo', $id);
			return $revista ->update();
        }


        public function obtenerArticuloRevistaById($id){
            $builder= $this->db->table('articulos_revista');
            $builder->select('*');
            $builder->where('id_articulo =', $id);
             $query = $builder->get(); 
            return $query->getResultArray();

        }

        public function obtenerArticuloRevistaByNombre($nombre){
            $builder= $this->db->table('articulos_revista');
            $builder->select('*');
            $builder->where('titulo =', $nombre);
            $query = $builder->get(); 
            return $query->getResultArray();

        }
        
    }