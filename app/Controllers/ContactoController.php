<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContactoModel;

class ContactoController extends Controller
{

    public function store()
    {
        $rules = [
            'nombre' => 'required|min_length[1]|max_length[50]',
            'apellido' => 'required|min_length[1]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|',
            'asunto' => 'required|min_length[1]|max_length[250]|',
            'mensaje' => 'required|min_length[2]|max_length[250]',

        ];

        if ($this->validate($rules)) {
            $contacto = new contactoModel();

            $contacto->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'email' => $this->request->getVar('email'),
                'asunto' => $this->request->getVar('asunto'),
                'mensaje' => $this->request->getVar('mensaje'),
                'visto' => 'no'
            ]);

            session()->setFlashdata('success', '¡El mensaje a sido enviado con exito!');

            return redirect()->to(base_url('contacto'));
        } else {
            $data['validation'] = $this->validator;
            echo view('contacto', $data);
        }
    }
}