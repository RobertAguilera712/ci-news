<?php namespace App\Models;
    use CodeIgniter\Model;

    class IntegrantesConsejo extends Model{

        protected $table ='integrantes_consejo';
        protected $primaryKey ='id_integrante';
        protected $allowedFields = ['nombre', 'importancia','cargo', 'cargo_consejo','imagen', 'estatus', 'fecha_modificacion'];
        
        
        public function obtenerIntegrantesActivos(){
            $integrante = $this->db->table('integrantes_consejo');
            $integrante->where('estatus=', 'A');
            $integrante->orderby('importancia');
            return $integrante->get()->getResultArray();
        }

        public function obtenerIntegrante($data){
            $usuario = $this->db->table('integrantes_consejo');
            $usuario->where($data);
            return $usuario->get()->getResultArray();
        }

        public function obtenerTodosIntegrantes(){
            return $this->findAll();
        }

        public function updateIntegrante($id, $data){
            $integrante = $this->db->table('integrantes_consejo');
			$integrante->set($data);
			$integrante->where('id_integrante=', $id);
			return $integrante ->update();
        }

    }