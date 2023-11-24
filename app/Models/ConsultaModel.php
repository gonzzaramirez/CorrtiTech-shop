<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['asunto', 'mensaje', 'usuario_id', 'visto'];

    public function getConsultasByUsuario($usuarioId)
    {
        return $this->where('usuario_id', $usuarioId)->findAll();
    }
}
