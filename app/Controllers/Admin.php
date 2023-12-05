<?php

namespace App\Controllers;

use App\Controllers\BaseController;
$session = \Config\Services::session();


class Admin extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        //
    }

    public function inicio()
    {
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }
        
        return view('inicios/inicioAdmin'); //Direcciona al menù del administrador
    }

    public function mostrar(){

        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }

        $usuarioModel = model('UsuarioModel'); //Se obtienen los datos del modelo de los usuarios
        $data['usuarios'] = $usuarioModel->findAll(); //Se obtienen los datos del modelo de los usuarios
        if (!empty($data['usuarios'])) { //Se establece que no se muestre el primer registro ya que es el del administrador
            array_shift($data['usuarios']);
        }

        return //muestra las vistas del menù y como tal de la tabla que muestra la informaciòn de los clientes
        view('common/head') .
        view('common/menuAdmin') .
        view('admin/mostrar',$data) .
        view('common/footer');
    }

    public function agregar(){
        
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }

        helper(['form', 'url']);

        $validation =  \Config\Services::validation();//valida los datos
        if ((strtolower($this->request->getMethod()) !== 'get')) {
    
        //Muestra las vistas de la funciòn de agregar
        return 
        view('common/head') .
        view('common/menuAdmin') .
        view('admin/agregar') .
        view('common/footer');
        }

        $rules = [];

        if (! $this->validate($rules)) {
                    
            //Muestra las vistas de la funciòn de agregar cuando se han validado los datos
            return 
            view('common/head') .
            view('common/menuAdmin') .
            view('admin/agregar',['validation' => $validation]) .
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
            "telefono" => $_POST['telefono']
        ];
        $usuarioModel->insert($data, false);
        return redirect('admin/mostrar','refresh');
    }


    public function delete($id)
    {
        //Se toma el id del usuario el cual se va a eliminar y redirecciona a la tabla de los clientes con los datos ya eliminados
        $usuarioModel = model('UsuarioModel');
        $usuarioModel->delete($id);
        return redirect()->to('admin/mostrar');
    }

    public function editar($id)
    {
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }

        $usuarioModel = model('UsuarioModel'); //Se toma el modelo de usuarios
        $data['usuario'] = $usuarioModel->find($id);//Se obtienen los datos dentro del modelo pero solo se mostraran los datos del usuario que tenga el id al que se este accediendo

        //Retorna a la vista de editar jalando los datos antes obtenidos
        return 
        view('common/head') .
        view('common/menuAdmin') .
        view('admin/editar',$data) .
        view('common/footer');
    }


    public function update (){

        $usuarioModel = model('UsuarioModel'); //Se toma el modelo de usuarios
        $id = $this->request->getVar('id'); //Se tomo el id del usuario

        $data = [ //Se obtienen todos los datos dentro de la tabla usuarios
            "nombre" => $this->request->getVar('nombre'),
            "apellidoP" => $this->request->getVar('apellidoP'),
            "apellidoM" => $this->request->getVar('apellidoM'),
            "fechaNac" => $this->request->getVar('fechaNac'),
            "calle" => $this->request->getVar('calle'),
            "colonia" => $this->request->getVar('colonia'),
            "municipio" => $this->request->getVar('municipio'),
            "estado" => $this->request->getVar('estado'),
            "ciudad" => $this->request->getVar('ciudad'),
            "CURP" => $this->request->getVar('CURP'),
            "RFC" => $this->request->getVar('RFC'),
            "telefono" => $this->request->getVar('telefono')
        ];

        //Se jalan los datos almacenados y redirecciona a la vista de mostrar clientes
        $usuarioModel->update($id,$data);
        return redirect()->to(base_url('admin/mostrar'));
    }

    public function buscar()
    {
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }

        $usuarioModel = model('UsuarioModel');//Se toma el modelo de usuarios

        //Se jalan los datos por los cuales se va a buscar y se van almacenar en data
        if (isset($_GET['nombre'])) {
            $nombre = $_GET['nombre'];
            $apellidoM = $_GET['apellidoM'];
            $data['usuarios'] = $usuarioModel->buscarUsuarios($nombre, $apellidoM);
        } else {
            $nombre = "";
            $data['usuarios'] = $usuarioModel->findAll();
        }

        //Se se cumple la bùsqueda va a redireccionar a la vista de buscar cliente
        return view('common/head') .
            view('common/menuAdmin') .
            view('admin/buscar', $data) .
            view('common/footer');
    }
     

    //Funciones de las coberturas 

    public function mostrarCoberturas(){
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }
        $coberturasModel = model('CoberturasModel'); //Se toma el modelo de las coberturas
        $data['coberturas'] = $coberturasModel->findAll(); //Se almacenan los datos

        //Se muestran los datos en la vista de las coberturas
        return 
        view('common/head') .
        view('common/menuAdmin') .
        view('admin/mostrarCoberturas',$data) .
        view('common/footer');
    }

    public function agregarCobertura(){
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }
        helper(['form', 'url']);

        //se establece la validacion de los datos
        $validation =  \Config\Services::validation();
        
        if ((strtolower($this->request->getMethod()) !== 'get')) {
    
            //redirecciona a la vista de agregar una cobertura
        return 
        view('common/head') .
        view('common/menuAdmin') .
        view('admin/agregarCobertura') .
        view('common/footer');
        }

        $rules = [];

        if (! $this->validate($rules)) {
            //redirecciona a la vista de agregar una cobertura ya con la validacion 
            return 
            view('common/head') .
            view('common/menuAdmin') .
            view('admin/agregarCobertura',['validation' => $validation]) .
            view('common/footer');
        }
    }

    public function insertCobertura(){
        $coberturasModel = model('CoberturasModel'); //Se toma el modelo de las coberturas
        $data = [
            //Se obtienen los datos almacenados en la tabla de las coberturas
            "nombre" => $_POST['nombre'],
            "descripcion" => $_POST['descripcion'],
            "status" => $_POST['status'],
            "monto" => $_POST['monto']
        ];
        //se jalan los datos y se muestran en la vista de mostrar coberturas
        $coberturasModel->insert($data, false);
        return redirect('admin/mostrarCoberturas','refresh');
    }

    public function deleteCobertura($id)
    {
        $coberturasModel = model('CoberturasModel');//Se toma el modelo de las coberturas
        $coberturasModel->delete($id); //se obtiene el id para eliminar solo los datos de la cobertura seleccionada
        return redirect()->to('admin/mostrarCoberturas');//redirecciona a la vista de mostrar coberturas
    }

    public function editarCobertura($id)//se jala el id de la cobertura a editar
    {
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }
        $coberturasModel = model('CoberturasModel');//Se toma el modelo de las coberturas
        $data['cobertura'] = $coberturasModel->find($id);//se jala el id de la cobertura a editar

        //redirecciona a la vista de editar cobertura para poder editar los datos
        return 
        view('common/head') .
        view('common/menuAdmin') .
        view('admin/editarCobertura',$data) .
        view('common/footer');
    }


    public function updateCobertura (){

        $coberturasModel = model('CoberturasModel');//Se toma el modelo de las coberturas
        $id = $this->request->getVar('id');//se toma el id de la cobertura

        $data = [
            //se obtienen los datos de las coberturas para realizar la actualizacion de ellos
            "nombre" => $this->request->getVar('nombre'),
            "descripcion" => $this->request->getVar('descripcion'),
            "status" => $this->request->getVar('status'),
            "monto" => $this->request->getVar('monto'),
        ];

        //se almacenan los datos y redirecciona al mostrar de las coberturas
        $coberturasModel->update($id,$data);
        return redirect()->to(base_url('admin/mostrarCoberturas'));
    }

    public function buscarCobertura()
    {
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }
        $coberturasModel = model('CoberturasModel');//Se toma el modelo de las coberturas
    
        $nombre = $this->request->getGet('nombre');//se jalan los datos a 
        $status = $this->request->getGet('status'); // editar en este caso el nombre y status de las coberturas
    
        if (!empty($nombre) || !empty($status)) {
            $nombre = !empty($nombre) ? $nombre : "";
    
            $status = !empty($status) ? $status : "";
            // se establece que el status solo puede ser "No disponible" o "Disponible" para hacer la bùsqueda
            if ($status == "No disponible" || $status == "Disponible") {
                $data['coberturas'] = $coberturasModel//se jalan los datos del modelo
                    ->like('nombre', $nombre)
                    ->where('status', $status)
                    ->findAll();
            } else {
                $data['coberturas'] = $coberturasModel//se jalan los datos del modelo
                    ->like('nombre', $nombre)
                    ->like('status', $status)
                    ->findAll();
            }
        } else {
            $data['coberturas'] = $coberturasModel->findAll();//se almacenan los datos del modelo
        }
    
        //redirecciona a la vista de buscar cobertura ya jalando los datos
        return view('common/head') .
            view('common/menuAdmin') .
            view('admin/buscarCobertura', $data) .
            view('common/footer');
    }
    
    

    public function estadisticas(){
        $session = session();
        if($session->get('logged_in') != TRUE || $session->get('perfil') != 'Administrador'){
            $session->destroy();
            return redirect ('/');
        }
        $coberturasModel = model('CoberturasModel'); //Se toma el modelo de las coberturas
        $data['coberturas'] = $coberturasModel->findAll(); //se obtienen los datos de las coberturas
        $ventasModel = model('VentasModel'); //Se toma el modelo de las ventas
         $data['ventas'] = $ventasModel->findAll(); //se obtienen los datos de las ventas

         //se muestran los datos en la gràfica
         return 
         view('common/head') .
         view('common/menuAdmin') .
         view('admin/estadisticas', $data) .
         view('common/footer');
         
     }

    
}

