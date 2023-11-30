<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'apellidoP', 'apellidoM', 'fechaNac', 'calle', 'colonia', 'municipio', 'estado', 'ciudad', 'CURP', 'RFC', 'telefono', 'perfil', 'nombreUsuario', 'contraseña', 'idCobertura', 'created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    //funcion para buscar los usuarios
    public function buscarUsuarios($nombre, $apellidoM)
    {
        return $this->like('nombre', $nombre)
            ->like('apellidoM', $apellidoM)
            ->findAll();
    }

    //funcion para tomar los datos para el inicio de sesion
    public function getUserByCredentials($username, $password)
    {
        return $this->where('nombreUsuario', $username)
            ->where('contraseña', $password)
            ->first();
    }
}
