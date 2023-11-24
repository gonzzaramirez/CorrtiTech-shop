<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ContactoModel;
use App\Models\consultaModel;
use App\Models\ProductoModel;
use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;

class ProfileController extends Controller
{

    public function index()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        return view('indexIngresado', ['session' => $session]);
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        $perfil_id = $session->get('perfil_id');

        if ($perfil_id != 1) {
            return redirect()->to(base_url('indexIngresado'));
        }

        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->orderBy('id_producto', 'ASC')->findAll();

        return view('listarProductos', $data);
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        $session->set('logout', true);

        return redirect()->to(base_url('ingresar'));
    }

    public function comercializacion()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        return view('comercializacionIngresado', ['session' => $session]);
    }

    public function quienes_somos()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        return view('quienes-somosIngresado', ['session' => $session]);
    }


    public function terminos_usos()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        return view('terminos-usosIngresado', ['session' => $session]);
    }

    public function productos()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        return view('productosIngresado', ['session' => $session]);
    }

    public function consulta()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        return view('consulta', ['session' => $session]);
    }



    public function listar()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        $perfil_id = $session->get('perfil_id');

        if ($perfil_id != 1) {
            return redirect()->to(base_url('indexIngresado'));
        }


        $usuarioModel = new UserModel();

        // Obtener el valor de búsqueda
        $busqueda = $this->request->getPost('busqueda');

        // Verificar si se realizó una búsqueda
        if ($busqueda) {
            $usuarios = $usuarioModel->like('nombre', $busqueda)->findAll();
            if (empty($usuarios)) {
                $data['error'] = 'No se encontraron usuarios con ese nombre.';
            } else {
                $data['usuario'] = $usuarios;
            }
        } else {
            $data['usuario'] = $usuarioModel->orderBy('id', 'ASC')->findAll();
        }

        return view('listar', $data);
    }



    public function facturas($usuarioId)
    {
        // Obtener las facturas del usuario
        $facturaModel = new FacturaModel();
        $facturas = $facturaModel->where('id_usuario', $usuarioId)->findAll();
    
        // Obtener los detalles de las facturas
        $detalleFacturaModel = new DetalleFacturaModel();
        $productoModel = new ProductoModel();
    
        foreach ($facturas as &$factura) {
            $detalles = $detalleFacturaModel->where('id_factura', $factura['id'])->findAll();
            $factura['detalles'] = [];
    
            foreach ($detalles as $detalle) {
                $producto = $productoModel->find($detalle['id_producto']);
    
                if ($producto) {
                    $detalle['producto'] = $producto;
                    $factura['detalles'][] = $detalle;
                }
            }
        }
    
        // Cargar la vista de detalles de las facturas
        return view('adminFacturas', [
            'facturas' => $facturas
        ]);
    }

    public function listarbaja()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        $perfil_id = $session->get('perfil_id');

        if ($perfil_id != 1) {
            return redirect()->to(base_url('indexIngresado'));
        }


        $usuario = new UserModel();
        $datos['usuario'] = $usuario->orderBy('id', 'ASC')->findAll();
        return view('dadosDeBaja', $datos);
    }

    public function darDeBaja($id)
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new UserModel();

        // Obtener los datos del usuario por su ID
        $usuario = $usuariosModel->find($id);

        if ($usuario) {
            // Actualizar el campo "baja" a "si"
            $usuario['baja'] = 'si';
            $usuariosModel->save($usuario);

            // Establecer mensaje de sesión
            session()->setFlashdata('success', 'El usuario ha sido dado de baja Correctamente.');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('listar'));
        }
    }
    public function darDeAlta($id)
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new UserModel();

        // Obtener los datos del usuario por su ID
        $usuario = $usuariosModel->find($id);

        if ($usuario) {
            // Actualizar el campo "baja" a "si"
            $usuario['baja'] = 'no';
            $usuariosModel->save($usuario);

            // Establecer mensaje de sesión
            session()->setFlashdata('success', 'El usuario ha sido dado de alta Correctamente.');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('bajausuarios'));
        }
    }

    public function listarContacto()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        $perfil_id = $session->get('perfil_id');

        if ($perfil_id != 1) {
            return redirect()->to(base_url('indexIngresado'));
        }


        $usuario = new contactoModel();
        $datos['usuarios'] = $usuario->orderBy('id', 'ASC')->findAll();
        return view('listaContacto', $datos);
    }



    public function listarConsulta()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        $perfil_id = $session->get('perfil_id');

        if ($perfil_id != 1) {
            return redirect()->to(base_url('indexIngresado'));
        }

        $consultaModel = new ConsultaModel();
        $consultaData = $consultaModel->orderBy('id', 'ASC')->findAll();

        // Obtener los datos de usuarios relacionados para cada consulta
        $userModel = new UserModel();
        foreach ($consultaData as &$consulta) {
            $usuario = $userModel->find($consulta['usuario_id']);
            $consulta['usuario'] = $usuario;
        }

        $datos['usuarios'] = $consultaData;
        return view('listarConsulta', $datos);
    }
    public function leidoConsulta($id)
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new consultaModel();

        // Obtener los datos del usuario por su ID
        $usuario = $usuariosModel->find($id);

        if ($usuario) {
            // Actualizar el campo "baja" a "si"
            $usuario['visto'] = 'si';
            $usuariosModel->save($usuario);

            // Establecer mensaje de sesión
            session()->setFlashdata('success', 'Mensaje marcado como visto correctamente');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('listarConsulta'));
        }
    }
    public function leidoContacto($id)
    {
        $usuariosModel = new contactoModel();

        // Obtener los datos del usuario por su ID
        $usuario = $usuariosModel->find($id);

        if ($usuario) {
            // Actualizar el campo "baja" a "si"
            $usuario['visto'] = 'si';
            $usuariosModel->save($usuario);

            // Establecer mensaje de sesión
            session()->setFlashdata('success', 'Mensaje marcado como visto correctamente');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('listarContacto'));
        }
    }






}