<?php namespace App\Models;
    use CodeIgniter\Model;

    class DatosGrafica extends Model{

        protected $table ='datos_grafica';
        protected $primaryKey ='id_dato';
        protected $allowedFields = ['id_grafica', 'dato_x_fecha', 'dato_x',
        'dato_y','label'];

        public function obtenerDatosGrafica($id){
            $builder = $this->db->table('datos_grafica');
            $builder->select('*');
            $builder->join('graficas', 'graficas.id_grafica = datos_grafica.id_grafica');
            $builder->where('graficas.id_grafica =', $id);
			return $builder->get()->getResultArray();
        }

        public function guardarDato($data){
            return $this->insert($data);
        }


        public function deleteDatosGrafica($id){
            $grafica = $this->db->table('datos_grafica');
            $grafica->where('id_grafica', $id);
            $deleted = $grafica->delete();
        
            return $deleted;
        }
        
    
    }