<?php namespace App\Models;
    use CodeIgniter\Model;
    use App\Models\Pregunta;



    class EncuestasCortas extends Model{

        protected $table ='encuestascortasc';
        protected $primaryKey ='id_encuestasC';
        protected $allowedFields = ['id_pregunta','respuesta1','respuesta2','respuesta3','respuesta4', 'votos1','votos2','votos3','votos4', 'estatus', 'fecha_modificacion', 'fecha_inicio','fecha_fin'];


        public function obtenerPregunta(){
            $builder = $this->db->table('pregunta');
            $builder->select('*');
            $builder->join('encuestascortasc', 'encuestascortasc.id_pregunta = pregunta.id_pregunta');
            $builder->where('estatus =', 'A');
            $builder->where('estatusp =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerTodasPregunta(){
            $builder = $this->db->table('pregunta');
            $builder->select('*');
            $builder->join('encuestascortasc', 'encuestascortasc.id_pregunta = pregunta.id_pregunta');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerEncuesta($data){
            $usuario = $this->db->table('pregunta');
            $usuario->select('*');
            $usuario->where('id_encuestasC =', $data);
            $usuario->join('encuestascortasc', 'encuestascortasc.id_pregunta = pregunta.id_pregunta');

            return $usuario->get()->getResultArray();

        }

        public function votos1($opcion){
            $builder = $this->db->table('encuestascortasc');
			$builder->set('votos1', 'votos1+1',FALSE);
			$builder->where('id_encuestasC',$opcion);
			return $builder ->update();

        }
        public function votos2($opcion){
            $builder = $this->db->table('encuestascortasc');
			$builder->set('votos2', 'votos2+1',FALSE);
			$builder->where('id_encuestasC',$opcion);
			return $builder ->update();

        }
        public function votos3($opcion){
            $builder = $this->db->table('encuestascortasc');
			$builder->set('votos3', 'votos3+1',FALSE);
			$builder->where('id_encuestasC',$opcion);
			return $builder ->update();

        }
        public function votos4($opcion){
            $builder = $this->db->table('encuestascortasc');
			$builder->set('votos4', 'votos4+1',FALSE);
			$builder->where('id_encuestasC',$opcion);
			return $builder ->update();

        }
        public function getVotos(){
            $builder= $this->db->table('encuestascortasc');
            $builder->select('votos1');
            $builder->where('estatus =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function votosTotales(){
            $db      = \Config\Database::connect();
            $builder = $db->table('encuestascortasc');
            $builder->select('(SELECT SUM(encuestascortasc.votos1+encuestascortasc.votos2+encuestascortasc.votos3+encuestascortasc.votos4) FROM encuestascortasc) AS votos_totales', false);
            $builder->where('estatus =', 'A');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function updateEncuesta($id, $data){
            $usuario = $this->db->table('encuestascortasc');
			$usuario->set($data);
			$usuario->where('id_encuestasC', $id);
			return $usuario ->update();
        }

    }