<?php

namespace App\Models;

use App\Core\Model;

class poukaz extends Model
{
    protected  $id;

    protected $email;
    protected string $meno;
    protected string $priezvisko;
    protected $hodnota;

    protected $datum;
    protected string $sposob_platby;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
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

    /**
     * @return mixed
     */
    public function getHodnota()
    {
        return $this->hodnota;
    }

    /**
     * @param mixed $hodnota
     */
    public function setHodnota($hodnota): void
    {
        $this->hodnota = $hodnota;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum): void
    {
        $this->datum = $datum;
    }

    public function getSposobPlatby(): string
    {
        return $this->sposob_platby;
    }

    public function setSposobPlatby(string $sposob_platby): void
    {
        $this->sposob_platby = $sposob_platby;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

}