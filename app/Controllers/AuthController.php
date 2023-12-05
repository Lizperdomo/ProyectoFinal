<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
$session = \Config\Services::session();

class AuthController extends Controller
{
    public function index()
    {
        return view('home/home');
    }

    public function login()
    {
        $usuarioModel = new UsuarioModel();

        // Obtén las credenciales del formulario
        $nombreUsuario = $this->request->getPost('nombreUsuario');
        $contraseña = $this->request->getPost('contraseña');

        // Busca el usuario en la base de datos
        $usuario = $usuarioModel->getUserByCredentials($nombreUsuario, $contraseña);

        if ($usuario) {
            $data = [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'perfil' => $usuario->perfil,
                'logged_in' => true
            ];

            // Guarda la información del usuario en la sesión
            session()->set($data);

            // Redirecciona a la vista según el perfil
            return redirect()->to($this->redirectByProfile($usuario->perfil));
        } else {
            // Autenticación fallida
            return view('home/home');
        }
    }

    private function redirectByProfile($perfil)
    {
        //se establece que de acuerdo al perfil va a depender el inicio al que se va a mandar
        switch ($perfil) {
            case 'Administrador':
                return '/inicios/inicioAdmin';
                break;
            case 'Cliente':
                return '/inicios/inicioCliente';
                break;

            default:
                return '/home'; 
                break;
        }
    }
    public function logout()
    {
    // Cierra la sesión y redirige al inicio de sesión
    session()->destroy();
    return redirect()->to('/');
    }
}
