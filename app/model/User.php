<?php

use Marcelo\Database\Connection;

class User
{
    private $id;
    private $nome;
    private $email;
    private $password;

    public function validateLogin(){
        $conn = Connection::getConn();
        $sql = 'SELECT * FROM usuario WHERE email = :email';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        if($stmt->rowCount()){
            $result = $stmt->fetch();

            if($result['senha'] === $this->password){
                $_SESSION['usr'] = $result['id'];

                return true;
            }
        }

        throw new \Exception('Login Inválido');
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->senha = $password;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }


}