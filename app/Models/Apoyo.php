<?php namespace App\Models;
    use CodeIgniter\Model;
    use App\Models\Temas;
    use App\Models\Dependencia;
    use App\Models\Derecho_Social;
    use App\Models\Tipo_Apoyo;
    use App\Model\Normatividad;

    class Apoyo extends Model{

        protected $table ='apoyos';
        protected $primaryKey ='id_apoyos';
        protected $allowedFields = [
            'fecha_modificacion_AP, orden_gobierno','id_derecho','id_tema', 
            'id_dependencia','programa_Social','estatus_apoyo','año',
        'objetivo_General','poblacion_Objetivo','rango_Edad','edad','id_tipo_apoyo',
        'monto_Anual','presupuesto','telefono',
        'correo','pagina_Web','id_normatividad','link_normartividad', 'responsable'];

        public function ByTema($tema){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
			$usuario->where('apoyos.id_tema', $tema);
            $usuario->where('estatus_apoyo =', 'A');
            $usuario->where('estatusTema =', 'A');
            $usuario->where('estatus =', 'A');
            $usuario->where('estatus_A =', 'A');
            $usuario->where('estatus_D =', 'A');
            $usuario->where('estatus_N =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function obtenerTodosApoyosByDerecho($derecho){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
            $usuario->where('apoyos.id_derecho', $derecho);
            $usuario->where('estatus_apoyo =', 'A');
            $usuario->where('estatusTema =', 'A');
            $usuario->where('estatus =', 'A');
            $usuario->where('estatus_A =', 'A');
            $usuario->where('estatus_D =', 'A');
            $usuario->where('estatus_N =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function obtenerTodosApoyosByDependencia($dependencia){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
            $usuario->where('apoyos.id_dependencia', $dependencia);
            $usuario->where('estatus_apoyo =', 'A');
            $usuario->where('estatusTema =', 'A');
            $usuario->where('estatus =', 'A');
            $usuario->where('estatus_A =', 'A');
            $usuario->where('estatus_D =', 'A');
            $usuario->where('estatus_N =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }


        public function obtenerTodosApoyosByTipo($apoyo){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
            $usuario->where('apoyos.id_tipo_apoyo', $apoyo);
            $usuario->where('estatus_apoyo =', 'A');
            $usuario->where('estatusTema =', 'A');
            $usuario->where('estatus =', 'A');
            $usuario->where('estatus_A =', 'A');
            $usuario->where('estatus_D =', 'A');
            $usuario->where('estatus_N =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        
        public function obtenerTodosApoyosByYear($año){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
			$usuario->where('apoyos.año', $año);
            $usuario->where('estatus_apoyo =', 'A');
            $usuario->where('estatusTema =', 'A');
            $usuario->where('estatus =', 'A');
            $usuario->where('estatus_A =', 'A');
            $usuario->where('estatus_D =', 'A');
            $usuario->where('estatus_N =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function obtenerTodosApoyosB(){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function obtenerTodosApoyos(){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->join('derecho_social', 'apoyos.id_derecho = derecho_social.id_derecho');
            $usuario->join('tipo_apoyo', 'apoyos.id_tipo_apoyo = tipo_apoyo.id_tipo_apoyo');
            $usuario->join('tema', 'apoyos.id_tema = tema.id_tema');
            $usuario->join('dependencia', 'apoyos.id_dependencia = dependencia.id_dependencia');
            $usuario->join('normatividad', 'apoyos.id_normatividad = normatividad.id_normatividad');
            $usuario->where('estatus_apoyo =', 'A');
            $usuario->where('estatusTema =', 'A');
            $usuario->where('estatus =', 'A');
            $usuario->where('estatus_A =', 'A');
            $usuario->where('estatus_D =', 'A');
            $usuario->where('estatus_N =', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function editApoyo($data){
            $usuario = $this->db->table('apoyos');
            $usuario->select('*');
            $usuario->where('id_apoyos =', $data);
            return $usuario->get()->getResultArray();

        }

        public function updateApoyo($id, $data){
            $usuario = $this->db->table('apoyos');
			$usuario->set($data);
			$usuario->where('id_apoyos', $id);
			return $usuario ->update();
        }
    }