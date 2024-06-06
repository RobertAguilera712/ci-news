<?php namespace App\Models;
    use CodeIgniter\Model;
    use Models\EncuestasCortas;

    class Pregunta extends Model{

        protected $table ='pregunta';
        protected $primaryKey ='id_pregunta';
        protected $allowedFields = ['pregunta','estatusP', 'fecha_modificacion'];
        
        
        public function obtenerPregunta(){
            $builder = $this->db->table('pregunta');
            $builder->select('*');
            $builder->join('encuestascortasc', 'encuestascortasc.id_pregunta = pregunta.id_pregunta');
            $builder->where('estatus =', 'A');
            $builder->where('estatusp =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerPreguntaActiva(){
            $builder = $this->db->table('pregunta');
            $builder->select('*');
            $builder->where('estatusp =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerPreguntaSeleccionada($data){
            $usuario = $this->db->table('pregunta');
            $usuario->select('*');
            $usuario->where('id_pregunta =', $data);

            return $usuario->get()->getResultArray();

        }

        public function obtenerTodasPreguntas(){
            $builder = $this->db->table('pregunta');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function votosTotales(){
            $builder = $this->db->table('encuestascortasc');
            $builder->selectSum('votos', 'votos_totales');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function updatePregunta($id, $data){
            $usuario = $this->db->table('pregunta');
			$usuario->set($data);
			$usuario->where('id_pregunta', $id);
			return $usuario ->update();
        }
    }