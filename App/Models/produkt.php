<?php

namespace App\Models;
use App\Core\Model;

class produkt extends Model
{
   protected $id_pr;
   protected $nazov_pr;
   protected $cena;
   protected $dos_mnozstvo;
   protected $id_kategorie;
   protected $obrazok;
   protected $popis_pr;

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

    /**
     * @return mixed
     */
    public function getNazovPr()
    {
        return $this->nazov_pr;
    }

    /**
     * @param mixed $nazov_pr
     */
    public function setNazovPr($nazov_pr): void
    {
        $this->nazov_pr = $nazov_pr;
    }

    /**
     * @return mixed
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @param mixed $cena
     */
    public function setCena($cena): void
    {
        $this->cena = $cena;
    }

    /**
     * @return mixed
     */
    public function getDosMnozstvo()
    {
        return $this->dos_mnozstvo;
    }

    /**
     * @param mixed $dos_mnozstvo
     */
    public function setDosMnozstvo($dos_mnozstvo): void
    {
        $this->dos_mnozstvo = $dos_mnozstvo;
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

    /**
     * @return mixed
     */
    public function getObrazok()
    {
        return $this->obrazok;
    }

    /**
     * @param mixed $obrazok
     */
    public function setObrazok($obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    public static function getDbColumns(): array
    {
        return [ 'id_pr', 'nazov_pr','cena','dos_mnozstvo','id_kategorie','obrazok'];
    }

    public static function getPkColumnName(): string
    {
        return 'id_pr';
    }

    /**
     * @return mixed
     */
    public function getPopisPr()
    {
        return $this->popis_pr;
    }

    /**
     * @param mixed $popis_pr
     */
    public function setPopisPr($popis_pr): void
    {
        $this->popis_pr = $popis_pr;
    }


}