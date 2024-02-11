<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\objednavky;
use App\Models\poukaz;
use App\Models\produkt;
use App\Models\produkty_v_objd;
use App\Models\recenzie;
use App\Models\zakaznik;

class KosikController extends AControllerBase
{
    public function index(): Response
    {
        if (isset($_SESSION['user'])) {
            $login = $_SESSION['user'];
        } else {
            return $this->html();
        }
        $zakaz = zakaznik::getAll("login = ?", [$login]);
        if($zakaz == null) {
            return $this->html();
        }
        $zakazID = $zakaz[0]->getId();
        $objednavka = objednavky::getAll("id_zak = ? and stav = ? and sposob_platby = ?", [$zakazID, "Rozpracovaná", "Nezaplatená"],"id desc");
       if ($objednavka == null) {
           return $this->html();
       }
        $objednavkaID = $objednavka[0]->getId();
        $_SESSION['id_objednavky'] = $objednavkaID;
        $produkty = produkty_v_objd::getAll("id_objednavky = ?", [$objednavkaID]);
        $produktyVOBJ = [];
        foreach ($produkty as $prod) {
            $produkt = produkt::getOne($prod->getIdPro());
            $produktyVOBJ[] = $produkt;
        }
        return $this->html([$produktyVOBJ]);

    }
    public function vytvorObjednavku(): void {



        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $idProduktu = $_POST['id'];

            if (!isset($_SESSION['id_objednavky'])) {
                $_SESSION['id_objednavky'] = $this->getPosledneNevyuziteId();
            }

            $idObjednavky = $_SESSION['id_objednavky'];

            $novaObjednavka = new produkty_v_objd();
            $novaObjednavka->setIdObjednavky($idObjednavky);
            $novaObjednavka->setIdPro($idProduktu);
            $novaObjednavka->setDatumObj(date('Y-m-d H:i:s'));

            try {
                $novaObjednavka->save();
                echo json_encode(['success' => true, 'message' => 'Objednávka bola úspešne vytvorená.']);
            } catch (\Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Chyba pri ukladaní objednávky: ' . $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Chyba pri spracovaní požiadavky.']);
        }
    }

    private function getPosledneNevyuziteId(): int {

        $obj = new objednavky();
        $login = $_SESSION['user'];
        $zakaz = zakaznik::getAll("login = ?", [$login]);
        $obj->setIdZak($zakaz[0]->getId());
        $obj->setStav("Rozpracovaná");
        $obj->setSposobPlatby("Nezaplatená");
        $obj->setDatum(date('Y-m-d H:i:s'));
        $obj->save();


        return $obj->getId();
    }


    public function odosliObjednavku(): Response {

        $obj = $_SESSION['id_objednavky'];
        $objednavka = objednavky::getOne($obj);
        $objednavka->setStav("Odoslaná");
        $platba = $_REQUEST['platba'];
        $objednavka->setSposobPlatby($platba);
        $objednavka->save();

        return $this->redirect("?c=kosik&a=submit");

    }

    public function submit() {

        return $this->html();


    }

    public function vymazanieProduktu(): Response {

        $id_produktu = $this->request()->getValue('id_pro');
        $id_objednavky = $_SESSION['id_objednavky'];

        $vymazanieProduktu = produkty_v_objd::getAll("id_pro = ? and id_objednavky = ?", [$id_produktu,$id_objednavky]);

        if ($vymazanieProduktu) {
            $vymazanieProduktu[0]->delete();
        }

        return $this->redirect("?c=kosik");

    }







}