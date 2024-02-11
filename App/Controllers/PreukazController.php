<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\poukaz;

class PreukazController  extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }


    public function odosliPoukaz(): Response
    {

        $novaObjednavka = new poukaz();
        $novaObjednavka->setMeno($_POST['meno']);
        $novaObjednavka->setPriezvisko($_POST['priezvisko']);
        $novaObjednavka->setEmail($_POST['email']);
        $novaObjednavka->setHodnota($_POST['hodnota']);
        $novaObjednavka->setSposobPlatby($_POST['platba']);
        $novaObjednavka->setDatum(date('Y-m-d H:i:s'));

        $novaObjednavka->save();

       /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $meno = $_POST['meno'];
            $priezvisko = $_POST['priezvisko'];
            $email = $_POST['email'];
            $hodnota = $_POST['hodnota'];
            $platba = $_POST['platba'];

            if ($hodnota == 50) {
                $obrazok = "public/voucher/voucher50.jpg";
            } else if ($hodnota == 25) {
                $obrazok = "public/voucher/voucher25.jpg";
            } else if ($hodnota == 10) {
                $obrazok = "public/voucher/voucher10.jpg";
            }

            $to = $email;
            $subject = "Poukaz";
            $txt = $obrazok;
            $headers = "From: greeny777SK@gmail.com";

            if (mail($to, $subject, $txt, $headers)) {
                echo "Email bol odoslaný.";
            } else {
                echo "Nastala chyba.";
            }
        }
        */

        return $this->redirect("?c=preukaz&a=submit");

    }

    public function submit()
    {
        return $this->html();
    }


}