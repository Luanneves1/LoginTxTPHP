<?php



class Usuario
{
    private $nome;
    private $email;
    private $senha;
    private $data;

    // Métodos para manipular o nome
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    // Métodos para manipular o email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    // Métodos para manipular a senha
    public function setSenha($senha)
    {
        $this->senha = md5 ($senha);
    }

    public function getSenha()
    {
        return $this->senha;
    }

    // Métodos para manipular a data
    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
?>
