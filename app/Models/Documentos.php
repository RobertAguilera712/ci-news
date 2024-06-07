<?php namespace App\Models;
    use CodeIgniter\Model;

    class Documentos extends Model{

        protected $table ='documentos_cendoc';
        protected $primaryKey ='id_documento';
        protected $allowedFields = ['nombre_documento', 
        'autor_documento', 'palabras_clave', 'descripcion_documento','fecha_documento', 
        'id_categoria_cendoc', 'archivo_documento','estatus_documento', 'fecha_modificacion'];

       public function createDoc($data){
            return $this->insert($data);
        }

        public function readDoc(){
            return $this->findAll();
        }


         public function obtenerCat($data){
            $categorias = $this->db->table('categorias_cendoc');
            $categorias->select('*');
            $categorias->where('id_documento =', $data);
            $categorias->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');

            return $categorias->get()->getResultArray();

        }

        public function obtenerDocumentos(){
            $builder= $this->db->table('categorias_cendoc');
            $builder->select('*');
            $builder->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

        public function obtenerDocsYCategorias(){
            $builder= $this->db->table('categorias_cendoc');
            $builder->select('*');
            $builder->where('documentos_cendoc.estatus_documento =', 'A');
            $builder->where('categorias_cendoc.estatus_categoria_cendoc =', 'A');
            $builder->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');
            $query = $builder->get(); 
            return $query->getResultArray();
        }


        public function obtenerCategoriaActivo(){
            $builder= $this->db->table('categorias_cendoc');
            $builder->select('*');
            $builder->where('categorias_cendoc.estatus_categoria_cendoc =', 'A');
            $builder->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateDoc($id, $data){
            $documento = $this->db->table('documentos_cendoc');
			$documento->set($data);
			$documento->where('id_documento', $id);
			return $documento ->update();
        }

        public function ByNombre($data){
            $documentos = $this->db->table('categorias_cendoc');
            $documentos->select('*');
			$documentos->like('nombre_documento', $data);
            $documentos->where('documentos_cendoc.estatus_documento=', 'A');
            $documentos->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');
			$query = $documentos->get(); 
            return $query->getResultArray();
        }

        public function ByTema($tema){
            $documentos = $this->db->table('categorias_cendoc');
            $documentos->select('*');
			$documentos->where('documentos_cendoc.id_categoria_cendoc', $tema);
            $documentos->where('documentos_cendoc.estatus_documento=', 'A');
            $documentos->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');
			$query = $documentos->get(); 
            return $query->getResultArray();
        }
        
        public function obtenerDocumentoById($id){
            $builder= $this->db->table('documentos_cendoc');
            $builder->select('*');
            $builder->where('id_documento =', $id);
            $query = $builder->get(); 
            return $query->getResultArray();

        }
        
        public function obtenerDocumentoByNombre($nombre){
            $builder= $this->db->table('documentos_cendoc');
            $builder->select('*');
            $builder->where('nombre_documento =', $nombre);
            $query = $builder->get(); 
            return $query->getResultArray();

        }

        public function obtenerCategoriasDocumento(){
            $builder= $this->db->table('categorias_cendoc');
            $builder->select('*');
            $query = $builder->get(); 
            return $query->getResultArray();
        }
        
    }