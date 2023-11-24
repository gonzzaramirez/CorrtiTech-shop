<?php

namespace App\Controllers;

use App\Models\ConsultaModel;
use CodeIgniter\Controller;

class ConsultaController extends Controller
{
    public function guardarConsulta()
    {
        $session = session();
        $usuarioId = $session->get('id');


        // Obtener los datos del formulario
        $asunto = $this->request->getPost('asunto');
        $mensaje = $this->request->getPost('mensaje');


        // Validar los datos (puedes agregar tus propias reglas de validación aquí)

        // Crear una nueva instancia del modelo de consulta
        $consultaModel = new ConsultaModel();

        // Preparar los datos para guardar en la base de datos
        $data = [
            'asunto' => $asunto,
            'mensaje' => $mensaje,
            'usuario_id' => $usuarioId,
            'visto' => 'no'
        ];

        // Insertar los datos en la tabla 'consultas'
        $consultaModel->insert($data);

        session()->setFlashdata('success', '¡El mensaje a sido enviado con exito!');

        return redirect()->to(base_url('consulta'));

    }
}