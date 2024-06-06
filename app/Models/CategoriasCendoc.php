<?php namespace App\Models;
    use CodeIgniter\Model;

    class CategoriasCendoc extends Model{

        protected $table ='categorias_cendoc';
        protected $primaryKey ='id_categoria_cendoc';
        protected $allowedFields = ['nombre_categoria_cendoc', 'estatus_categoria_cendoc','fecha_modificacion'];

        public function obtenerCategoriaActivo(){
            $categoria = $this->db->table('categorias_cendoc');
            $categoria->select(array('categorias_cendoc.nombre_categoria_cendoc',
                                    'categorias_cendoc.id_categoria_cendoc', 'count(*)'));
            $categoria->join('documentos_cendoc', 'documentos_cendoc.id_categoria_cendoc = categorias_cendoc.id_categoria_cendoc');
			$categoria->where('estatus_categoria_cendoc=', 'A');
            $categoria->where('estatus_documento=', 'A');
            $categoria->groupby(array('nombre_categoria_cendoc', 'categorias_cendoc.id_categoria_cendoc'));
			return $categoria->get()->getResultArray();
        }

        public function ByCategoria($categoria){
            $usuario = $this->db->table('categorias_cendoc');
            $usuario->select('*');
			$usuario->where('nombre_categoria_cendoc',$categoria);
            $usuario->where('estatus_categoria_cendoc=', 'A');
			$query = $usuario->get(); 
            return $query->getResultArray();
        }

        public function ObtenerCategoriasDoc($data){
            $usuario = $this->db->table('categorias_cendoc');
            $usuario->select('*');
            $usuario->where('id_categoria_cendoc =', $data);
            return $usuario->get()->getResultArray();

        }
        
        public function ObtenerCategoria($nombre){
            $usuario = $this->db->table('categorias_cendoc');
            $usuario->select('*');
            $usuario->where('nombre_categoria_cendoc =', $nombre);
            return $usuario->get()->getResultArray();

        }

        public function updateCategoriaDoc($id, $data){
            $categoria = $this->db->table('categorias_cendoc');
			$categoria->set($data);
			$categoria->where('id_categoria_cendoc', $id);
			return $categoria ->update();
        }


       

    }