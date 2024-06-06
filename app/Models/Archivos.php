<?php namespace App\Models;
    use CodeIgniter\Model;

    class Archivos extends Model{

        protected $table ='archivos_municipio';
        protected $primaryKey ='id_archivo';
        protected $allowedFields = ['nombre_archivo','fecha_archivo', 'id_municipio', 'archivo',
        'estatus_archivo', 'fecha_modificacion', 'tipo_archivo', 'categoria_archivo', 'palabras_clave'];

       public function createArc($data){
            return $this->insert($data);
        }

        public function readDoc(){
            return $this->findAll();
        }


         public function obtenerMunicipioDeArchivo($id){
            $municipios = $this->db->table('municipio');
            $municipios->select('*');
            $municipios->where('id_municipio=', $id);

            return $municipios->get()->getResultArray();
        }

        public function obtenerArchivos(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $builder->join('archivos_municipio', 'archivos_municipio.id_municipio = municipio.id_municipio');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerArchivosYMunicipios(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $builder->where('archivos_municipio.estatus_archivo =', 'A');
            $builder->join('archivos_municipio', 'archivos_municipio.id_municipio = municipio.id_municipio');
            $query = $builder->get(); 
            return $query->getResultArray();
        }


        public function obtenerMunicipioActivo(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $builder->where('municipio.estatus_municipio =', 'A');
            $builder->join('archivos_municipio', 'archivos_municipio.id_municipio = municipio.id_municipio');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateArchivo($id, $data){
            $documento = $this->db->table('archivos_municipio');
			$documento->set($data);
			$documento->where('id_archivo', $id);
			return $documento ->update();
        }

        public function ByNombre($data){
            $archivos = $this->db->table('municipio');
            $archivos->select('*');
			$archivos->like('nombre_archivo', $data);
            $archivos->where('archivos_municipio.estatus_archivo=', 'A');
            $archivos->join('archivos_municipio', 'archivos_municipio.id_municipio = municipio.id_municipio');
			$query = $archivos->get(); 
            return $query->getResultArray();
        }

        public function ByMunicipio($municipio){
            $archivos = $this->db->table('municipio');
            $archivos->select('*');
			$archivos->where('archivos_municipio.id_municipio', $municipio);
            $archivos->where('archivos_municipio.estatus_archivo=', 'A');
            $archivos->join('archivos_municipio', 'archivos_municipio.id_municipio = municipio.id_municipio');
			$query = $archivos->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerInfoArchivo($id){
            $builder= $this->db->table('archivos_municipio');
            $builder->select('nombre_archivo, archivo, id_archivo, fecha_archivo, tipo_archivo, categoria_archivo, palabras_clave, estatus_archivo, municipio.id_municipio, municipio.nombre');
            $builder->where('id_archivo=', $id);
            $builder->join('municipio', 'archivos_municipio.id_municipio = municipio.id_municipio');
            $query = $builder->get(); 
            return $query->getResultArray();

        }

        public function obtenerMunicipiosArchivo(){
            $builder= $this->db->table('municipio');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerArchivosDeMunicipio($data){
            $builder= $this->db->table('archivos_municipio');
            $builder->select('*');
            $builder->where('estatus_archivo =', 'A');
            $builder->where($data);
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerArchivosPorCategoria($data){
            $builder= $this->db->table('archivos_municipio');
            $builder->select('*');
            $builder->where('estatus_archivo =', 'A');
            $builder->where('categoria_archivo =',$data);
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerArchivosBusqueda($data){
            $builder= $this->db->table('archivos_municipio');
            $builder->select('*');
            $builder->where('estatus_archivo =', 'A');
            $builder->orWhere('nombre_archivo =', 'A');
            $builder->orWhere('palabras_clave =', $data);
            $builder->orWhere('categoria_archivo =', $data);
            $builder->orWhere('tipo_archivo =', $data);
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
    }