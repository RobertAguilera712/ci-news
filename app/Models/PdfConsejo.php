<?php namespace App\Models;
    use CodeIgniter\Model;

    class PdfConsejo extends Model{

        protected $table ='pdfsConsejo';
        protected $primaryKey ='id_pdfs';
        protected $allowedFields = ['id_general', 'nombre', 'estatusPdf','pdf','estatus', 'fecha_modificacion'];

        public function obtenertodosPdfs(){
            $builder = $this->db->table('pdfsConsejo');
            $builder->select('*');
            $builder->join('generales', 'generales.id_general = pdfsConsejo.id_general');
			return $builder->get()->getResultArray();
        }

        public function obtenerPdfsActivos(){
            $builder = $this->db->table('pdfsConsejo');
            $builder->select('*');
            $builder->join('generales', 'generales.id_general = pdfsConsejo.id_general');
            $builder->where('pdfsConsejo.estatusPdf =', 'A');
            $builder->where('generales.estatus =', 'A');
			return $builder->get()->getResultArray();
        }

        public function updatePDF($id, $data){
            $builder = $this->db->table('pdfsConsejo');
			$builder->set($data);
			$builder->where('id_pdfs', $id);
			return $builder ->update();
        }

        public function obtenerIdPdfGeneral($data){
            $builder = $this->db->table('pdfsConsejo');
            $builder->select('*');
            $builder->where('id_pdfs =', $data);
            return $builder->get()->getResultArray();

        }
    
    }