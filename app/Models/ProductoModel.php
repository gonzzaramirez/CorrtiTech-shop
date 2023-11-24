<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['id_categoria', 'nombre', 'descripcion', 'precio', 'cantidad', 'url_imagen', 'activo'];

    public function getCategoria($idCategoria)
    {
        return $this->db->table('categorias')->getWhere(['id_categoria' => $idCategoria])->getRow();
    }
}