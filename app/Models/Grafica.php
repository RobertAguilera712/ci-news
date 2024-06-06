<?php namespace App\Models;
    use CodeIgniter\Model;

    class Grafica extends Model{

        protected $table ='graficas';
        protected $primaryKey ='id_grafica';
        protected $allowedFields = ['titulo', 
        'leyenda_x', 'leyenda_y', 'tipo','incluir_cero', 'prefijo', 
        'fecha_inicio','fecha_fin','estatus', 'fecha_modificacion'];

       public function crearGrafica($data){
            return $this->insert($data);
        }

        public function obtenerTodasGraficas(){
            return $this->findAll();
        }

        public function obtenerGraficas(){
            $builder= $this->db->table('graficas');
            $builder->select('*');
            $builder->where('estatus =', 'A');
            $builder->orderby('estatus');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateGrafica($id, $data){
            $grafica = $this->db->table('graficas');
			$grafica->set($data);
			$grafica->where('id_grafica', $id);
			return $grafica ->update();
        }


        public function obtenerGraficaById($id){
            $builder= $this->db->table('graficas');
            $builder->select('*');
            $builder->where('id_grafica =', $id);
             $query = $builder->get(); 
            return $query->getResultArray();

        }

        public function obtenerGraficaByNombre($nombre){
            $builder= $this->db->table('graficas');
            $builder->select('*');
            $builder->where('titulo =', $nombre);
            $query = $builder->get(); 
            return $query->getResultArray();

        }
        
    }