<?php

namespace App\Models;
use App\Core\Model;

class recenzie extends Model
{
   protected $id;
   protected $id_zak;

   protected $id_pr;
   protected $recenzia;
   protected $datum;
   protected $hodnotenie;

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
    public function getRecenzia()
    {
        return $this->recenzia;
    }

    /**
     * @param mixed $recenzia
     */
    public function setRecenzia($recenzia): void
    {
        $this->recenzia = $recenzia;
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

    /**
     * @return mixed
     */
    public function getHodnotenie()
    {
        return $this->hodnotenie;
    }

    /**
     * @param mixed $hodnotenie
     */
    public function setHodnotenie($hodnotenie): void
    {
        $this->hodnotenie = $hodnotenie;
    }

    /**
     * @return mixed
     */
    public function getIdPr()
    {
        return $this->id_pr;
    }

    /**
     * @param mixed $id_pr
     */
    public function setIdPr($id_pr): void
    {
        $this->id_pr = $id_pr;
    }

}