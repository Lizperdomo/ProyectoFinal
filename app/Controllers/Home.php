<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('home/home'); //muestra el inicio de sesiòn
    }


    public function registro(){
        helper(['form', 'url']);

        $validation =  \Config\Services::validation();//valida los datos
        if ((strtolower($this->request->getMethod()) !== 'get')) {
    
        //Muestra las vistas de la funciòn de agregar
        return 
        view('common/head') .
        view('home/registro') .
        view('common/footer');
        }

        $rules = [];

        if (! $this->validate($rules)) {
                    
            //Muestra las vistas de la funciòn de agregar cuando se han validado los datos
            return 
            view('common/head') .
            view('home/registro',['validation' => $validation]) .
            view('common/footer');
        }
    }


    public function insert(){
        /*Como tal dentro de esta funcion se obtienen los datos de la tabla de usuarios la cual se encuentra dentro del 
        modelo "usuarioModel", se toman los datos y se redirecciona a la vista de mostrar clientes*/
        $usuarioModel = model('UsuarioModel');
        $data = [
            "nombre" => $_POST['nombre'],
            "apellidoP" => $_POST['apellidoP'],
            "apellidoM" => $_POST['apellidoM'],
            "fechaNac" => $_POST['fechaNac'],
            "calle" => $_POST['calle'],
            "colonia" => $_POST['colonia'],
            "municipio" => $_POST['municipio'],
            "estado" => $_POST['estado'],
            "ciudad" => $_POST['ciudad'],
            "CURP" => $_POST['CURP'],
            "RFC" => $_POST['RFC'],
            "telefono" => $_POST['telefono'],
            "nombreUsuario" => $_POST['nombreUsuario'],
            "contraseña" => $_POST['contraseña'],
            "perfil" => $_POST['perfil']
        ];
        $usuarioModel->insert($data, false);
        return redirect('/','refresh');
    }
}

