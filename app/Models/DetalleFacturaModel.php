<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleFacturaModel extends Model
{
    protected $table = 'DetallesFactura';
    protected $primaryKey = 'id_detalle_factura';
    protected $allowedFields = ['id_factura', 'id_producto', 'cantidad', 'subtotal'];

    public function getProducto($idProducto)
    {
        return $this->db->table('Productos')->getWhere(['id_producto' => $idProducto])->getRow();
    }

    public function guardarDetalleFactura($datos)
    {
        return $this->insert($datos);
    }
}