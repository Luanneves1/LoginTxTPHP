<?php
require_once("Model/Usuario.php");




$usuario = new Usuario();



class UsuarioDAO
{
    private $debug = true;
    private $dir = "Arquivos";

    public function Cadastrar(Usuario $usuario)
    {
        try {
            $fileName = $usuario->getEmail() . ".txt";
            if (!$this->VerificarArquivoExiste($fileName)) {
                $diretorioCompleto = $this->dir . "/" . $fileName;
                $fp = fopen($diretorioCompleto, "w");
                
                $str = "{$usuario->getNome()};{$usuario->getEmail()};{$usuario->getSenha()};{$usuario->getData()}";
                
                if (fwrite($fp, $str)) {
                    fclose($fp);
                    return 1; // Usuario cadastrado com sucesso
                } else {
                    fclose($fp);
                    return -10; // Erro ao tentar cadastrar
                }
            } else {
                return -1; // Usuario já cadastrado
            }
        } catch (Exception $ex) {
            if ($this->debug) {
                echo $ex->getMessage();
            }
            return -10; // Retorne um código de erro
        }
    }

    private function VerificarArquivoExiste(string $nomeArquivo)
    {
        $diretorioCompleto = $this->dir . "/" . $nomeArquivo;
        return file_exists($diretorioCompleto);
    }
}
