<?php

namespace App\Models;

use App\Core\Model;

class kategoria extends Model
{
protected $id_kategorie;
protected $nazov;
protected  $popis;


    public function getNazov()
    {
        return $this->nazov;
    }

    public function setNazov(string $nazov): void
    {
        $this->nazov = $nazov;
    }

    public function getPopis()
    {
        return $this->popis;
    }

    public function setPopis(string $popis): void
    {
        $this->popis = $popis;
    }

    /**
     * @return mixed
     */
    public function getIdKategorie()
    {
        return $this->id_kategorie;
    }

    /**
     * @param mixed $id_kategorie
     */
    public function setIdKategorie($id_kategorie): void
    {
        $this->id_kategorie = $id_kategorie;
    }
}