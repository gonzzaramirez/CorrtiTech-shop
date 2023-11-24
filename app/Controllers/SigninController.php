<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $usuario = $this->request->getVar('usuario');
        $password = $this->request->getVar('password');

        $data = $userModel->where('usuario', $usuario)->first();

        if ($data) {
            // Verificar si el usuario está dado de baja
            if ($data['baja'] === 'si') {
                $session->setFlashdata('msg', 'El usuario está dado de baja.');
                return redirect()->to(base_url('ingresar'));
            }

            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                $session->setFlashdata('success', '¡Sesión iniciada con éxito!');

                if ($data['perfil_id'] == 1) {
                    return redirect()->to(base_url('dashboard'));
                } else {
                    return redirect()->to(base_url('indexIngresado'));
                }

            } else {
                $session->setFlashdata('msg', 'La contraseña es incorrecta.');
                return redirect()->to(base_url('ingresar'));
            }
        } else {
            $session->setFlashdata('msg', 'El usuario no existe.');
            return redirect()->to(base_url('ingresar'));
        }
    }
}