<?php
require_once("Dao/UsuarioDAO");

class UsuarioController
{
    private $usuarioDAO;


    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function Cadastrar (Usuario $usuario){

if (strlen ($usuario->getNome())> 3 && strlen($usuario->getSenha()) >=7 && strpos($usuario->getEmail(),"@") >=0 ){
    return $this->usuarioDAO->Cadastrar($usuario);

}else{
    return -2; 
}


    }

}
