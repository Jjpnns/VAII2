<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\produkt;


/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {

        $pole = $this->RandomStyri();
        return $this->html([$pole]);

    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function contact(): Response
    {
        return $this->html();
    }


    /**
     * Get all categories from the database
     * @return array
     * @throws \Exception
     */
    public function getAllCategories()
    {
        try {
            $sql = "SELECT * FROM kategoria";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new \Exception('Failed to get categories: ' . $e->getMessage());
        }
    }


    private function RandomStyri(): array
    {
        $id = [11, 12, 13, 14, 15, 21, 22, 23, 24, 25, 31, 32, 33, 34, 35, 41, 42, 43, 44];
        $vybrateProdukty = [];

        while (count($vybrateProdukty) < 4) {
            $randomID = array_rand($id);
            $produkt = produkt::getOne($randomID);


            $existuje = false;


            if ($produkt != null) {
                foreach ($vybrateProdukty as $vybranyProdukt) {
                    if ($vybranyProdukt->getIdPr() == $produkt->getIdPr()) {
                        $existuje = true;
                        break;
                    }
                }
            }

            if (!$existuje && $produkt != null) {
                $vybrateProdukty[] = $produkt;
            }
        }

        return $vybrateProdukty;
    }
}
