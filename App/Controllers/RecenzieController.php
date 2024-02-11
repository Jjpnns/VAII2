<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\produkt;
use App\Models\recenzie;
use App\Models\zakaznik;


class RecenzieController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $recenzie = \App\Models\recenzie::getAll();
        $produkty = produkt::getAll();
        return $this->html([$recenzie, $produkty]);


    }

    public function naplnenie(): Response
    {
        $data = $this->request()->getPost();

        if (!empty($data['nazovProduktu']) && !empty($data['hodnotenie']) && !empty($data['recenzia'])) {
            $nazovPr = $data['nazovProduktu'];
            $hodnotenie = $data['hodnotenie'];
            $textrecenzia = $data['recenzia'];
            $login = $_SESSION['user'];
            $datum = date("Y-m-d");

            $recenzia = new recenzie();

            $recenzia->setRecenzia($textrecenzia);
            $recenzia->setHodnotenie(intval($hodnotenie));
            $recenzia->setDatum($datum);
            $tenZakaznik = zakaznik::getAll('login = ?', [$login]);
            $recenzia->setIdZak($tenZakaznik[0]->getId());
            $recenzia->setIdPr(intval($nazovPr));

        } try {
                $recenzia->save();
        }  catch (Exception $e) {
            error_log("Error" . $e->getMessage());

            return $this->errorResponse("Error");
        }
        return $this->redirect("?c=recenzie");
    }


        public function editRecenzie(): Response {

        $recenzia = $_POST['editRecenzie'];
        $id = $this->request()->getValue('id');

        try {
            $editRecenzia = recenzie::getOne($id);
            $editRecenzia->setRecenzia($recenzia);

            $editRecenzia->save();
        } catch (Exception $e) {
            error_log("Error" . $e->getMessage());

            return $this->errorResponse("Error");
        }

        return $this->redirect("?c=recenzie");

    }
    public function vymazanieRecenzie(): Response {

        $id = $this->request()->getValue('id');

        $vymazanieRecenzie = recenzie::getOne($id);

        if ($vymazanieRecenzie) {
            $vymazanieRecenzie->delete();
        } else {
            return $this->errorResponse("Vymazanie bolo neúspešné");
        }

        return $this->redirect("?c=recenzie");

    }
}