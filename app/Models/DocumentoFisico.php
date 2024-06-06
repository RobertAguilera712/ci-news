<?php namespace App\Models;
    use CodeIgniter\Model;

    class DocumentoFisico extends Model{

        protected $table ='documentos_fisicos';
        protected $primaryKey ='id_documento';
        protected $allowedFields = ['titulo', 
        'clave', 'tipo','editorial', 
        'ejemplares','estatus', 'fecha_modificacion'];

       public function createDoc($data){
            return $this->insert($data);
        }

        public function readDoc(){
            return $this->findAll();
        }

        public function obtenerTodosDocumentosFisicos(){
            $builder= $this->db->table('documentos_fisicos');
            $builder->select('*');
            $builder->orderby('estatus');
            $query = $builder->get(); 
            return $query->getResultArray();
        }

      
        public function updateDoc($id, $data){
            $documento = $this->db->table('documentos_fisicos');
			$documento->set($data);
			$documento->where('id_documento', $id);
			return $documento ->update();
        }

        public function ByNombre($data){
            $documentos = $this->db->table('documentos_fisicos');
            $documentos->select('*');
			$documentos->like('titulo', $data);
            // $documentos->where('estatus=', 'A');
            $query = $documentos->get(); 
            return $query->getResultArray();
        }

        public function ByClave($data){
            $documentos = $this->db->table('documentos_fisicos');
            $documentos->select('*');
			$documentos->like('clave', $data);
            // $documentos->where('estatus=', 'A');
            $query = $documentos->get(); 
            return $query->getResultArray();
        }

        public function ByEditorial($data){
            $documentos = $this->db->table('documentos_fisicos');
            $documentos->select('*');
			$documentos->like('editorial', $data);
            // $documentos->where('estatus=', 'A');
            $query = $documentos->get(); 
            return $query->getResultArray();
        }


        public function obtenerDocumentoById($id){
            $builder= $this->db->table('documentos_fisicos');
            $builder->select('*');
            $builder->where('id_documento =', $id);
             $query = $builder->get(); 
            return $query->getResultArray();

        }
        
        public function obtenerDocumentoByClave($clave){
            $builder= $this->db->table('documentos_fisicos');
            $builder->select('*');
            $builder->where('clave =', $clave);
             $query = $builder->get(); 
            return $query->getResultArray();

        }
        
    }