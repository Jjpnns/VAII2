<?php

namespace App\Models;

use App\Core\Model;

class produkty_v_objd extends Model
{
    protected $id;
    protected $id_objednavky;
    protected $id_pro;
    protected $datum_obj;

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
    public function getIdObjednavky()
    {
        return $this->id_objednavky;
    }

    /**
     * @param mixed $id_objednavky
     */
    public function setIdObjednavky($id_objednavky): void
    {
        $this->id_objednavky = $id_objednavky;
    }

    /**
     * @return mixed
     */
    public function getIdPro()
    {
        return $this->id_pro;
    }

    /**
     * @param mixed $id_pro
     */
    public function setIdPro($id_pro): void
    {
        $this->id_pro = $id_pro;
    }

    /**
     * @return mixed
     */
    public function getDatumObj()
    {
        return $this->datum_obj;
    }

    /**
     * @param mixed $datum_obj
     */
    public function setDatumObj($datum_obj): void
    {
        $this->datum_obj = $datum_obj;
    }

}