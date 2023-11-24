<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;
use App\Models\UserModel;

class CarritoController extends BaseController
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
        // Obtener productos del carrito desde la sesión
        $carrito = session()->get('carrito');

        // Verificar si el carrito está vacío
        if (!is_array($carrito)) {
            $carrito = [];
        }

        // Calcular el total de los productos en el carrito
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['subtotal'];
        }

        // Pasar los datos a la vista
        $data = [
            'productos' => $carrito,
            'total' => $total,
            'cantidadProductos' => count($carrito)
        ];

        return view('carrito', $data);
    }

    public function agregar($idProducto)
    {
        // Obtener el producto desde la base de datos
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($idProducto);

        if ($producto) {
            // Obtener el carrito desde la sesión
            $carrito = session()->get('carrito');

            // Verificar si el producto ya existe en el carrito
            if (isset($carrito[$idProducto])) {
                // Verificar si la cantidad en el carrito es menor a la cantidad disponible
                if ($carrito[$idProducto]['cantidad'] < $producto['cantidad']) {
                    // Actualizar la cantidad y subtotal del producto existente
                    $carrito[$idProducto]['cantidad']++;
                    $carrito[$idProducto]['subtotal'] = $carrito[$idProducto]['cantidad'] * $producto['precio'];
                } else {
                    // Si la cantidad en el carrito es igual o mayor a la cantidad disponible, mostrar un mensaje de error o redireccionar a donde desees
                    $stockMaximo = $producto['cantidad'];
                    session()->setFlashdata('mensaje', 'No se puede agregar más de ' . $stockMaximo . ' unidades. El stock máximo disponible es ' . $stockMaximo);
                    return redirect()->to(base_url('carrito'));
                }
            } else {
                // Verificar si la cantidad disponible es mayor a 0
                if ($producto['cantidad'] > 0) {
                    // Agregar el producto al carrito
                    $carrito[$idProducto] = [
                        'id_producto' => $producto['id_producto'],
                        'nombre' => $producto['nombre'],
                        'precio' => $producto['precio'],
                        'cantidad' => 1,
                        'subtotal' => $producto['precio']
                    ];
                } else {
                    // Si la cantidad disponible es igual o menor a 0, mostrar un mensaje de error o redireccionar a donde desees
                    $stockMaximo = $producto['cantidad'];
                    session()->setFlashdata('mensaje', 'No se puede agregar más de ' . $stockMaximo . ' unidades. El stock máximo disponible es ' . $stockMaximo);
                    return redirect()->to(base_url('carrito'));
                }
            }

            // Guardar el carrito en la sesión
            session()->set('carrito', $carrito);

            // Establecer un mensaje flash para indicar que se agregó el producto
            session()->setFlashdata('mensaje', 'El producto se agregó al carrito.');

            // Redireccionar de vuelta a la página del catálogo
            return redirect()->to(base_url('catalogoIngresado'));
        }

        // Si el producto no existe, redireccionar a la página de error o a donde desees
        session()->setFlashdata('mensaje', 'El producto no existe.');
        return redirect()->to(base_url('carrito'));
    }

    public function eliminar($idProducto)
    {
        // Obtener el carrito desde la sesión
        $carrito = session()->get('carrito');

        // Verificar si el producto existe en el carrito
        if (isset($carrito[$idProducto])) {
            // Eliminar el producto del carrito
            unset($carrito[$idProducto]);

            // Guardar el carrito en la sesión
            session()->set('carrito', $carrito);
        }

        // Redireccionar al carrito de compras
        return redirect()->to(base_url('carrito'));
    }





    public function obtenerCantidad()
    {
        $carrito = session()->get('carrito');
        $cantidad = count($carrito);

        // Devolver la cantidad de productos en formato JSON
        return $this->response->setJSON(['cantidad' => $cantidad]);
    }

    public function vaciar()
    {
        // Vaciar el carrito eliminando la variable de sesión
        session()->remove('carrito');

        // Establecer un mensaje flash para indicar que se vació el carrito
        session()->setFlashdata('mensaje', 'El carrito se ha vaciado.');

        // Redireccionar al carrito de compras
        return redirect()->to(base_url('carrito'));
    }

    public function aumentar($idProducto)
    {
        // Obtener el carrito desde la sesión
        $carrito = session()->get('carrito');

        // Obtener el producto desde la base de datos
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($idProducto);

        // Verificar si el producto existe en el carrito y en la base de datos
        if (isset($carrito[$idProducto]) && $producto) {
            // Verificar si la cantidad en el carrito es menor a la cantidad disponible
            if ($carrito[$idProducto]['cantidad'] < $producto['cantidad']) {
                // Aumentar la cantidad del producto
                $carrito[$idProducto]['cantidad']++;

                // Calcular el nuevo subtotal
                $carrito[$idProducto]['subtotal'] = $carrito[$idProducto]['cantidad'] * $carrito[$idProducto]['precio'];

                // Guardar el carrito actualizado en la sesión
                session()->set('carrito', $carrito);
            } else {
                // Si la cantidad en el carrito es igual o mayor a la cantidad disponible, mostrar un mensaje de error o redireccionar a donde desees
                $nombreproducto = $producto['nombre'];
                $stockMaximo = $producto['cantidad'];
                session()->setFlashdata('mensaje', 'No se puede agregar más de ' . $stockMaximo . '  unidades del producto [' . $nombreproducto . '] . El stock actual disponible es de ' . $stockMaximo . ' unidades.');
                return redirect()->to(base_url('carrito'));
            }
        }

        // Redireccionar al carrito de compras
        return redirect()->to(base_url('carrito'));
    }

    public function disminuir($idProducto)
    {
        // Obtener el carrito desde la sesión
        $carrito = session()->get('carrito');

        // Verificar si el producto existe en el carrito
        if (isset($carrito[$idProducto])) {
            // Verificar si la cantidad del producto es mayor a 1
            if ($carrito[$idProducto]['cantidad'] > 1) {
                // Disminuir la cantidad del producto
                $carrito[$idProducto]['cantidad']--;

                // Calcular el nuevo subtotal
                $carrito[$idProducto]['subtotal'] = $carrito[$idProducto]['cantidad'] * $carrito[$idProducto]['precio'];

                // Guardar el carrito actualizado en la sesión
                session()->set('carrito', $carrito);
            }
        }

        // Redireccionar al carrito de compras
        return redirect()->to(base_url('carrito'));
    }
    private function restarCantidadProducto($idProducto, $cantidad)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($idProducto);

        if ($producto) {
            $nuevaCantidad = $producto['cantidad'] - $cantidad;

            // Verificar si la cantidad restante es mayor o igual a 0
            if ($nuevaCantidad >= 0) {
                // Actualizar la cantidad del producto en la base de datos
                $productoModel->update($idProducto, ['cantidad' => $nuevaCantidad]);

                return true;
            }
        }


    }

    public function checkout()
    {
        // Obtener los datos del usuario actual
        $userModel = new UserModel();
        $session = session();
        $userId = $session->get('id');
        $usuario = $userModel->find($userId);

        // Verificar si el usuario está autenticado
        if (!$usuario) {
            return redirect()->to(base_url('ingresar'));
        }

        // Obtener el carrito desde la sesión
        $carrito = session()->get('carrito');

        // Verificar si el carrito está vacío
        if (!is_array($carrito)) {
            return redirect()->to(base_url('carrito'));
        }

        // Verificar si hay suficiente stock disponible para los productos en el carrito
        $productoModel = new ProductoModel();
        $insuficienteStock = false;

        foreach ($carrito as $item) {
            $producto = $productoModel->find($item['id_producto']);

            if ($producto && $producto['cantidad'] < $item['cantidad']) {
                $insuficienteStock = true;
                break;
            }
        }

        if ($insuficienteStock) {
            session()->setFlashdata('mensaje', 'No hay suficiente stock disponible para completar la compra.');
            return redirect()->to(base_url('carrito'));
        }

        // Calcular el importe total de la factura
        $importeTotal = 0;
        foreach ($carrito as $item) {
            $importeTotal += $item['subtotal'];
        }

        // Crear la factura en la base de datos
        $facturaModel = new FacturaModel();
        $facturaData = [
            'id_usuario' => $userId,
            'importe_total' => $importeTotal,
            'activo' => 1,
            'fecha' => date('Y-m-d')
        ];
        $facturaId = $facturaModel->guardarFactura($facturaData);

        // Guardar los detalles de la factura en la base de datos
        $detalleFacturaModel = new DetalleFacturaModel();
        foreach ($carrito as $item) {
            $detalleData = [
                'id_factura' => $facturaId,
                'id_producto' => $item['id_producto'],
                'cantidad' => $item['cantidad'],
                'subtotal' => $item['subtotal']
            ];
            $detalleFacturaModel->guardarDetalleFactura($detalleData);

            // Restar la cantidad comprada del stock del producto en la base de datos
            $this->restarCantidadProducto($item['id_producto'], $item['cantidad']);
        }

        // Vaciar el carrito eliminando la variable de sesión
        session()->remove('carrito');

        // Redireccionar a la página de éxito con el ID de la factura
        return redirect()->to(base_url('carrito/exito/' . $facturaId));
    }


    public function exito($idFactura)
    {
        $facturaModel = new FacturaModel();
        $detalleFacturaModel = new DetalleFacturaModel();

        // Obtener la factura desde la base de datos
        $factura = $facturaModel->find($idFactura);

        if ($factura) {
            // Obtener el usuario asociado a la factura
            $usuario = $facturaModel->getUsuario($factura['id_usuario']);

            // Obtener los detalles de la factura
            $detalles = $detalleFacturaModel->where('id_factura', $idFactura)->findAll();

            // Obtener los productos correspondientes a los detalles
            $productos = [];
            foreach ($detalles as $detalle) {
                $producto = $detalleFacturaModel->getProducto($detalle['id_producto']);
                $detalle['producto'] = $producto;
                $productos[] = $detalle;
            }

            // Calcular el importe total de la factura
            $importeTotal = $factura['importe_total'];

            // Pasar los datos a la vista
            $data = [
                'factura' => $factura,
                'usuario' => $usuario,
                'detalles' => $productos,
                'importeTotal' => $importeTotal
            ];

            return view('exito', $data);
        }

        // Si la factura no existe, redireccionar a la página de error o a donde desees
        session()->setFlashdata('mensaje', 'La factura no existe.');
        return redirect()->to(base_url('carrito'));
    }

    public function compraUsuario()
    {
        $facturaModel = new FacturaModel();
        $userModel = new UserModel();
        $detalleFacturaModel = new DetalleFacturaModel();

        // Obtener el ID del usuario actual desde la sesión
        $session = session();
        $userId = $session->get('id');

        // Verificar si el usuario está autenticado
        if (!$userId) {
            return redirect()->to(base_url('ingresar'));
        }

        // Obtener las compras del usuario desde la base de datos
        $compras = $facturaModel->where('id_usuario', $userId)->findAll();

        // Obtener los nombres de usuario asociados a las compras
        $usuarios = [];
        $detalles = [];
        foreach ($compras as $compra) {
            $usuario = $userModel->find($compra['id_usuario']);
            $usuarios[$compra['id']] = $usuario['nombre'] . ' ' . $usuario['apellido'];

            // Obtener los detalles de la compra
            $detalles[$compra['id']] = $detalleFacturaModel->where('id_factura', $compra['id'])->findAll();

            // Obtener los productos correspondientes a los detalles
            foreach ($detalles[$compra['id']] as &$detalle) {
                $detalle['producto'] = $detalleFacturaModel->getProducto($detalle['id_producto']);
            }
        }

        // Pasar los datos a la vista
        $data = [
            'compras' => $compras,
            'usuarios' => $usuarios,
            'detalles' => $detalles
        ];

        return view('comprasUsuario', $data);
    }
}