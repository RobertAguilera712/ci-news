<?php namespace App\Models;
    use CodeIgniter\Model;

    class ArchivosEstados extends Model{

        protected $table ='archivos_estado';
        protected $primaryKey ='id_archivo';
        protected $allowedFields = ['nombre_archivo','fecha_archivo', 'id_estado', 'archivo',
        'estatus_archivo', 'fecha_modificacion', 'tipo_archivo', 'categoria_archivo', 'palabras_clave'];

       public function createArc($data){
            return $this->insert($data);
        }

        public function readDoc(){
            return $this->findAll();
        }


         public function obtenerEstadoDeArchivo($id){
            $estados = $this->db->table('estado');
            $estados->select('*');
            $estados->where('id_estado=', $id);

            return $estados->get()->getResultArray();
        }

        public function obtenerArchivos(){
            $builder= $this->db->table('estado');
            $builder->select('*');
            $builder->join('archivos_estado', 'archivos_estado.id_estado = estado.id_estado');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerArchivosYEstados(){
            $builder= $this->db->table('estado');
            $builder->select('*');
            $builder->where('archivos_estado.estatus_archivo =', 'A');
            $builder->join('archivos_estado', 'archivos_estado.id_estado = estado.id_estado');
            $query = $builder->get(); 
            return $query->getResultArray();
        }


        public function obtenerEstadoActivo(){
            $builder= $this->db->table('estado');
            $builder->select('*');
            $builder->where('estado.estatus_estado =', 'A');
            $builder->join('archivos_estado', 'archivos_estado.id_estado = estado.id_estado');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateArchivo($id, $data){
            $documento = $this->db->table('archivos_estado');
			$documento->set($data);
			$documento->where('id_archivo', $id);
			return $documento ->update();
        }

        public function ByNombre($data){
            $archivos = $this->db->table('estado');
            $archivos->select('*');
			$archivos->like('nombre_archivo', $data);
            $archivos->where('archivos_estado.estatus_archivo=', 'A');
            $archivos->join('archivos_estado', 'archivos_estado.id_estado = estado.id_estado');
			$query = $archivos->get(); 
            return $query->getResultArray();
        }

        public function ByEstado($estado){
            $archivos = $this->db->table('estado');
            $archivos->select('*');
			$archivos->where('archivos_estado.id_estado', $estado);
            $archivos->where('archivos_estado.estatus_archivo=', 'A');
            $archivos->join('archivos_estado', 'archivos_estado.id_estado = estado.id_estado');
			$query = $archivos->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerInfoArchivo($id){
            $builder= $this->db->table('archivos_estado');
            $builder->select('nombre_archivo, archivo, id_archivo, fecha_archivo, tipo_archivo, categoria_archivo, palabras_clave, estatus_archivo, estado.id_estado, estado.nombre');
            $builder->where('id_archivo=', $id);
            $builder->join('estado', 'archivos_estado.id_estado = estado.id_estado');
            $query = $builder->get(); 
            return $query->getResultArray();

        }

        public function obtenerEstadosArchivo(){
            $builder= $this->db->table('estado');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerArchivosDeEstado($data){
            $builder= $this->db->table('archivos_estado');
            $builder->select('*');
            $builder->where('estatus_archivo =', 'A');
            $builder->where($data);
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerArchivosPorCategoria($data){
            $builder= $this->db->table('archivos_estado');
            $builder->select('*');
            $builder->where('estatus_archivo =', 'A');
            $builder->where('categoria_archivo =',$data);
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
    }