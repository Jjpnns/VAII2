<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\kategoria;
use App\Models\produkt;


class ProduktyController extends AControllerBase
{

    public function index(): Response
    {
        $kvety = produkt::getAll("id_kategorie = 1");
        $rastliny = produkt::getAll("id_kategorie = 2");
        $bylinky = produkt::getAll("id_kategorie = 3");
        $doplnky = produkt::getAll("id_kategorie = 4");

        return $this->html([$kvety, $rastliny, $bylinky, $doplnky]);

    }


    public function kvety(): Response {

        $kvety = produkt::getAll("id_kategorie = 1");
        return $this->html([$kvety]);


    }

    public function rastliny(): Response {

        $rastliny = produkt::getAll("id_kategorie = 2");
        return $this->html([$rastliny]);


    }

    public function bylinky(): Response {

        $bylinky = produkt::getAll("id_kategorie = 3");
        return $this->html([$bylinky]);


    }

    public function doplnky(): Response {

        $doplnky = produkt::getAll("id_kategorie = 4");
        return $this->html([$doplnky]);


    }



    public function showProducts()
    {
        try {
            $connection = \App\Core\DB\Connection::connect();
            $dataKategoria = $connection->getAllCategories();

            $allProductsHTML = '';

            foreach ($dataKategoria as $kategoria) {
                $kategoriaID = $kategoria['id_kategorie'];
                $kategoriaName = $this->getCategoryName($kategoriaID);

                $dataProdukty = "SELECT * FROM produkt WHERE id_kategorie = :categoryId";
                $stmtProdukty = $connection->prepare($dataProdukty);
                $stmtProdukty->execute([':categoryId' => $kategoriaID]);
                $produktys = $stmtProdukty->fetchAll(PDO::FETCH_ASSOC);

                ob_start();
                include 'views/' . strtolower($kategoriaName) . '.php';
                $categoryProductsHTML = ob_get_clean();

                $allProductsHTML .= "<h1>Kategória: $kategoriaName</h1>";
                $allProductsHTML .= $categoryProductsHTML;
            }

            include 'views/products.php';
        } catch (\Exception $e) {
            echo "Chyba: " . $e->getMessage();
        }
    }

    private function getCategoryName($categoryId)
    {
        switch ($categoryId) {
            case 1:
                return 'Kvety';
            case 2:
                return 'Rastliny';
            case 3:
                return 'Bylinky';
            default:
                return 'Doplnky';
        }
    }



}