<?php

namespace App\Models;

use App\Core\Model;

class zakaznik extends Model
{
    protected  $id;
    protected $meno;
    protected $priezvisko;
    protected  $email;
    protected $tel_cislo;
    protected  $adresa;
   /* protected boolean $jeAdmin;*/
    protected  $login;
    protected  $password;



    public function __construct($login = '' , $password = '')
    {
        $this->login = $login;
        $this->password =$password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setIdZak(int $id): void
    {
        $this->id = $id;
    }

    public function getMeno(): string
    {
        return $this->meno;
    }

    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }

    public function setPriezvisko(string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelCislo(): string
    {
        return $this->tel_cislo;
    }

    public function setTelCislo(string $tel_cislo): void
    {
        $this->tel_cislo = $tel_cislo;
    }

    public function getAdresa(): string
    {
        return $this->adresa;
    }

    public function setAdresa(string $adresa): void
    {
        $this->adresa = $adresa;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


}