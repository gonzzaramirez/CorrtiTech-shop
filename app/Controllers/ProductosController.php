<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class ProductosController extends BaseController
{
    public function listarProductos()
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

        // Obtener el valor de búsqueda
        $busqueda = $this->request->getPost('busqueda');

        // Verificar si se realizó una búsqueda
        if ($busqueda) {
            $productos = $productoModel->like('nombre', $busqueda)->findAll();
            if (empty($productos)) {
                $data['error'] = 'No se encontraron productos con ese nombre.';
            } else {
                $data['productos'] = $productos;
            }
        } else {
            $data['productos'] = $productoModel->orderBy('id_producto', 'ASC')->findAll();
        }

        return view('listarProductos', $data);
    }


    public function create()
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
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->findAll();

        return view('agregarProductos', $data);
    }

    public function store()
    {
        $productoModel = new ProductoModel();

        $imagen = $this->request->getFile('imagen');

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'uploads', $nombreImagen);

            $data = [
                'id_categoria' => $this->request->getPost('categoria'),
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio' => $this->request->getPost('precio'),
                'cantidad' => $this->request->getPost('cantidad'),
                'url_imagen' => $nombreImagen,
                'activo' => 'si'

            ];

            $productoModel->insert($data);

            session()->setFlashdata('success', 'El producto se a cargado correctamente.');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('listarProductos'));
        }
    }

    public function editar($id = NULL)
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
        $producto = new ProductoModel();
        $datos['producto'] = $producto->where('id_producto', $id)->first();
        $categoriaModel = new CategoriaModel();
        $datos['categorias'] = $categoriaModel->findAll();
        return view('editarProducto', $datos);
    }

    public function actualizar()
    {
        $productoModel = new ProductoModel();

        if ($this->request->getMethod() === 'post') {
            $idProducto = $this->request->getPost('id');
            $nuevosDatos = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio' => $this->request->getPost('precio'),
                'cantidad' => $this->request->getPost('cantidad'),
                'id_categoria' => $this->request->getPost('categoria')
            ];

            // Procesar la imagen si se ha cargado un nuevo archivo
            $imagen = $this->request->getFile('imagen');
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                // Mover la imagen a la carpeta de uploads y obtener su nombre
                $nombreImagen = $imagen->getRandomName();
                $imagen->move(ROOTPATH . 'uploads', $nombreImagen);
                $nuevosDatos['url_imagen'] = $nombreImagen;
            }

            // Actualizar el producto en la base de datos
            $productoModel->update($idProducto, $nuevosDatos);

            // Redireccionar o mostrar un mensaje de éxito
            session()->setFlashdata('success', 'el producto se a actualizado correctamente.');
            return redirect()->to(base_url('listarProductos'));
        }
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


        $producto = new ProductoModel();
        $datos['productos'] = $producto->orderBy('id_producto', 'ASC')->findAll();
        return view('ProductosDadosDeBaja', $datos);
    }
    public function darDeBaja($id)
    {
        $productoModel = new ProductoModel();

        $producto = $productoModel->find($id);
        if ($producto) {
            // Actualizar el campo "baja" a "si"
            $producto['activo'] = 'no';
            $productoModel->save($producto);

            // Establecer mensaje de sesión
            session()->setFlashdata('success', 'El producto ha sido dado de baja Correctamente.');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('listarProductos'));
        }
    }

    public function darDeAlta($id)
    {

        $productoModel = new ProductoModel();

        $producto = $productoModel->find($id);
        if ($producto) {
            // Actualizar el campo "baja" a "si"
            $producto['activo'] = 'si';
            $productoModel->save($producto);

            // Establecer mensaje de sesión
            session()->setFlashdata('success', 'El producto ha sido dado de alta Correctamente.');

            // Redirigir a la vista de listar usuarios

            return redirect()->to(base_url('productosDadosDeBaja'));
        }
    }


    public function catalogo()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->findAll(); // Obtener todos los productos

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll(); // Obtener todas las categorías

        // Obtener la categoría de cada producto
        foreach ($productos as &$producto) {
            $categoria = $categoriaModel->find($producto['id_categoria']);
            if ($categoria && isset($categoria['nombre'])) {
                $producto['categoria'] = $categoria['nombre'];
            }
        }

        $data = [
            'productos' => $productos,
            'categorias' => $categorias
        ];

        return view('catalogo', $data);
    }

    public function catalogoIngresado()
    {
        $session = session();
        if (!$session->has('nombre')) {
            return redirect()->to(base_url('ingresar'));
        }

        if ($session->get('logout')) {
            return redirect()->to(base_url('ingresar'));
        }

        $productoModel = new ProductoModel();
        $productos = $productoModel->findAll(); // Obtener todos los productos

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll(); // Obtener todas las categorías

        // Obtener la categoría de cada producto
        foreach ($productos as &$producto) {
            $categoria = $categoriaModel->find($producto['id_categoria']);
            if ($categoria && isset($categoria['nombre'])) {
                $producto['categoria'] = $categoria['nombre'];
            }
        }

        $data = [
            'productos' => $productos,
            'categorias' => $categorias
        ];

        return view('catalogoIngresado', $data, ['session' => $session]);
    }




    public function listarCategorias()
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

        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->orderBy('id_categoria', 'ASC')->findAll();

        return view('listarCategorias', $data);
    }

    public function createCategorias()
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
        ;

        return view('agregarCategorias');
    }


    public function storeCategorias()
    {
        $categoriaModel = new CategoriaModel();
        $data = [

            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'activo' => 'si'
        ];
        $categoriaModel->insert($data);
        session()->setFlashdata('success', 'la categoria se a cargado correctamente.');
        return redirect()->to(base_url('listarCategorias'));
    }



    public function editarCategorias($id = NULL)
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


        $categoria = new CategoriaModel();
        $datos['categoria'] = $categoria->where('id_categoria', $id)->first();

        return view('editarCategorias', $datos);
    }

    public function actualizarCategorias()
    {
        $categoriaModel = new CategoriaModel();

        if ($this->request->getMethod() === 'post') {
            $idCategoria = $this->request->getPost('id');
            $nuevosDatos = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),

            ];
            $categoriaModel->update($idCategoria, $nuevosDatos);

            session()->setFlashdata('success', 'la categoria se a actualizado correctamente.');
            return redirect()->to(base_url('listarCategorias'));
        }
    }



    public function darDeBajaCategorias($id)
    {
        $categoriaModel = new CategoriaModel();

        $categoria = $categoriaModel->find($id);
        if ($categoria) {

            $categoria['activo'] = 'no';
            $categoriaModel->save($categoria);
            session()->setFlashdata('success', 'la categoria ha sido dado de baja Correctamente.');
            return redirect()->to(base_url('listarCategorias'));
        }
    }

    public function darDeAltaCategorias($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);
        if ($categoria) {
            $categoria['activo'] = 'si';
            $categoriaModel->save($categoria);
            session()->setFlashdata('success', 'la categoria ha sido dado de alta Correctamente.');
            return redirect()->to(base_url('categoriasDadosDeBaja'));
        }
    }

    public function listarbajaCategorias()
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


        $categoria = new CategoriaModel();
        $datos['categorias'] = $categoria->orderBy('id_categoria', 'ASC')->findAll();
        return view('categoriasDadosDeBaja', $datos);
    }
}