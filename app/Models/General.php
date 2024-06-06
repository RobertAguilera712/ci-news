<?php namespace App\Models;
    use CodeIgniter\Model;

    class General extends Model{

        protected $table ='generales';
        protected $primaryKey ='id_general';
        protected $allowedFields = ['objetivoS','significado', 'obejtivoC', 'objetivoP', 'contruccion', 
        'objetivoSI', 'significadoSI','objetivoAF','significadoAF','estatus', 'fecha_modificacion', 'pdf'];

        public function getGeneral(){
            $builder = $this->db->table('generales');
            $builder->select('*');
            $builder->where('estatus =', 'A');
			return $builder->get()->getResultArray();
        }
        public function obtenerTodoGeneral(){
            $builder = $this->db->table('generales');
            $builder->select('*');
			return $builder->get()->getResultArray();
        }
        public function updateSAJG($id, $data){
            $builder = $this->db->table('generales');
			$builder->set($data);
			$builder->where('id_general', $id);
			return $builder ->update();
        }

        public function obtenerIdGeneral($data){
            $builder = $this->db->table('generales');
            $builder->select('*');
            $builder->where('id_general =', $data);

            return $builder->get()->getResultArray();

        }

    }