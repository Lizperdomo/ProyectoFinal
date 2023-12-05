<?php

namespace App\Controllers;

use App\Controllers\BaseController;
$session = \Config\Services::session();


class Cliente extends BaseController
{
    public function index()
    {
        //
    }

    public function inicio()
    {
        //se protege la URL para que no se pueda acceder si no esta iniciada la sesion 
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Cliente'){
            $session->destroy();
            return redirect ('/');
        }
        return view('inicios/inicioCliente'); //manda al inicio del cliente
        
    }

    public function mostrar()
    {
        //se protege la URL para que no se pueda acceder si no esta iniciada la sesion 
        $session = session();
        if($session->get('logged_in') != TRUE){
            $session->destroy();
            return redirect ('/');
        }
         $id = session()->get('id'); //jala el id del usuario que inicio sesion 
        $usuarioModel = model('UsuarioModel'); //toma los datos del modelo
        $data['usuario'] = $usuarioModel->find($id); //se obtienen los datos del modelo

        //se muestra la informaciòn personal del cliente que inicio sesion en la vista de mostrar
        return 
        view('common/head') .
        view('common/menu') .
        view('cliente/mostrar',$data) .
        view('common/footer');
    }
    
    public function coberturas(){
        //se protege la URL para que no se pueda acceder si no esta iniciada la sesion 
        $session = session();
        if($session->get('logged_in') != TRUE){
            $session->destroy();
            return redirect ('/');
        }
        $coberturasModel = model('CoberturasModel');//toma los datos del modelo

        $data['coberturas'] = $coberturasModel->findAll();//se obtienen los datos del modelo

        //se muestra la informaciòn de todas las coberturas
        return 
        view('common/head') .
        view('common/menu') .
        view('cliente/coberturas', $data) .
        view('common/footer');
         
    }

    public function seguro() {
        //se protege la URL para que no se pueda acceder si no esta iniciada la sesion 
        $session = session();
        if ($session->get('logged_in') != TRUE) {
            $session->destroy();
            return redirect('/');
        }
    
        $usuario_id = $session->get('id');
        $ventasModel = model('VentasModel');
        $coberturasModel = model('CoberturasModel');
    
        // Obtén las ventas y coberturas asociadas al usuario con un join
        $ventas = $ventasModel
            ->select('ventas.*, coberturas.nombre as nombre_cobertura')
            ->join('coberturas', 'ventas.cobertura = coberturas.id')
            ->where('ventas.usuario', $usuario_id)
            ->findAll();
    
        $data['ventas'] = $ventas;
    
        // Muestra los datos del seguro de vida del cliente
        return view('common/head') .
            view('common/menu') .
            view('cliente/seguro', $data) .
            view('common/footer');
    }
    
    
    

    public function comprar($nombre = null, $monto = null) { //se toman los campos de nombre y monto para insertarlos en la compra
        //se protege la URL para que no se pueda acceder si no esta iniciada la sesion 
        $session = session();
        if($session->get('logged_in') != TRUE){
            $session->destroy();
            return redirect ('/');
        }

        $coberturasModel = model('CoberturasModel');//se toman los datos del modelo
        $data['coberturas'] = $coberturasModel->findAll();
        $ventasModel = model('VentasModel');//se toman los datos del modelo
        $data['ventas'] = $ventasModel->findAll();

        helper(['form', 'url']);

        $validation =  \Config\Services::validation(); //validacion de datos
        if ((strtolower($this->request->getMethod()) !== 'get')) {
    
            //manda al formulario de comprar
        return 
        view('common/head') .
        view('common/menu') .
        view('cliente/comprar') .
        view('common/footer');
        }

        $rules = [];

        if (! $this->validate($rules)) {
            //manda al formulario de comprar

            return 
            view('common/head') .
            view('common/menu') .
            view('cliente/comprar', $data, ['validation' => $validation]) .
            view('common/footer');
        }
    }

    public function insertarCompra() {
        $ventasModel = model('VentasModel');
        $coberturasModel = model('CoberturasModel');
    
        //se toman los campos que se jalan del modelo de coberturas
        $nombreCobertura = $_POST['nombre']; 
        $montoCobertura = $_POST['monto'];
        $cobertura = $coberturasModel->where('nombre', $nombreCobertura)->first();
    
        if ($cobertura) {
            $data = [
                "numeroTarjeta" => $_POST['numeroTarjeta'],
                "cvv" => $_POST['cvv'],
                "monto" => $_POST['monto'],
                "usuario" => session()->get('id'),
                "cobertura" => $cobertura->id,
                "created_at" => $_POST['created_at']
            ];
    
            $ventasModel->insert($data);
            return redirect()->to('cliente/seguro')->with('success', 'Venta realizada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'La cobertura seleccionada no existe.');
        }
    }    
    
}
