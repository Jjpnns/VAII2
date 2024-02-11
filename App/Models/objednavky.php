<?php

namespace App\Models;

use App\Core\Model;

class objednavky extends Model
{
protected  $id;
protected  $id_zak;
protected  $datum;
protected string $stav;
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

    /**
     * @return mixed
     */
    public function getIdZak()
    {
        return $this->id_zak;
    }

    /**
     * @param mixed $id_zak
     */
    public function setIdZak($id_zak): void
    {
        $this->id_zak = $id_zak;
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

    public function getStav()
    {
        return $this->stav;
    }

    public function setStav(string $stav): void
    {
        $this->stav = $stav;
    }

    public function getSposobPlatby()
    {
        return $this->sposob_platby;
    }

    public function setSposobPlatby(string $sposob_platby): void
    {
        $this->sposob_platby = $sposob_platby;
    }

}