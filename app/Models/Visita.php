<?php namespace App\Models;
    use CodeIgniter\Model;

    class Visita extends Model{

        protected $table ='visitas';
        protected $primaryKey ='id';
        protected $allowedFields = ['nombre_pagina', 'visitas', 'ultima_visita'];

       
        public function obtenerTodasVisitas(){
            $builder= $this->db->table('visitas');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerVisitasByPagina($pagina){
            $builder= $this->db->table('visitas');
            $builder->select('*');
            $builder->where('nombre_pagina', $pagina);
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function sumarVisita( $pagina){
            $count = $this->obtenerVisitasByPagina($pagina);
            defined('DB_FORMAT_DATE') OR define('DB_FORMAT_DATE', 'd/m/Y h:i:s');

            $builder = $this->db->table('visitas');
			$builder->set('visitas', ($count[0]['visitas'] + 1));
			$builder->set('ultima_visita', date(DB_FORMAT_DATE));
			$builder->where('nombre_pagina', $pagina);
			return $builder ->update();
        }

    
    }