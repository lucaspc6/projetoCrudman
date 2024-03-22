<?php

namespace App\Model;

class Cliente
{
    private $cliente_id;
    private $nome;
    private $email;
    private $cidade;
    private $estado;

    public function getId()
    {
        return $this->cliente_id;
    }

    public function setId(int $cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
