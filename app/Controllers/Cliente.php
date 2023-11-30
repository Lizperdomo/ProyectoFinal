<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cliente extends BaseController
{
    public function index()
    {
        //
    }

    public function inicio()
    {
        return view('inicios/inicioCliente'); //manda al inicio del cliente
    }

    public function mostrar()
    {

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

        $coberturasModel = model('CoberturasModel');//toma los datos del modelo
        $data['coberturas'] = $coberturasModel->findAll();//se obtienen los datos del modelo

        //se muestra la informaciòn de todas las coberturas
        return 
        view('common/head') .
        view('common/menu') .
        view('cliente/coberturas', $data) .
        view('common/footer');
         
    }

    public function seguro(){

        $coberturasModel = model('CoberturasModel');//se toman los datos del modelo
        $data['coberturas'] = $coberturasModel->findAll(); //se obtienen los datos del modelo

        //muestra los datos del seguro de vida del cliente
        return 
        view('common/head') .
        view('common/menu') .
        view('cliente/seguro',$data) .
        view('common/footer');
         
    }

    public function comprar(){
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
            view('cliente/comprar',['validation' => $validation]) .
            view('common/footer');
        }
    }

    public function insertarCompra(){
        $ventasModel = model('VentasModel'); //se toma el modelo de ventas
        //se jalan los datos del modelo
        $data = [
            "numeroTarjeta" => $_POST['numeroTarjeta'],
            "cvv" => $_POST['cvv'],
            "monto" => $_POST['monto'],
            "cobertura" => $_POST['cobertura'],
        ];

        //redirecciona a la vista del seguro
        $ventasModel->insert($data, false);
        return redirect('cliente/seguro','refresh');
    }

    
}