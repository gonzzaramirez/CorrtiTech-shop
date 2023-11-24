<?php

namespace App\Models;

use CodeIgniter\Model;

class FacturaModel extends Model
{
    protected $table = 'Facturas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'importe_total', 'activo', 'fecha'];

    public function getUsuario($idUsuario)
    {
        return $this->db->table('Usuarios')->getWhere(['id' => $idUsuario])->getRow();
    }

    public function guardarFactura($datos)
    {
        return $this->insert($datos);
    }
}