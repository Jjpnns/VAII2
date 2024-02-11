<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\zakaznik;

class RegisController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    public function reg(): Response
    {
        return  $this->html();
    }

    public function error(): Response
    {
        return  $this->html();
    }



    public function naplnenie() : Response
    {

        $data = $this->request()->getPost();
        $meno = $data['meno'];
        $priezvisko = $data['priezvisko'];
        $email = $data['email'];
        $login = $data['login'];

        $existujiciZakaznik = zakaznik::getAll("login = ?", [$login]);
        if ($existujiciZakaznik) {
            return $this->redirect("?c=regis&a=error&message=Login už existuje");
        }

        if( (isset($data["email"])  == false && isset($data["password"]) == false ) && (isset($data["login"]) == false)) {
            return $this->redirect("?c=regis&a=error");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->redirect("?c=regis&a=error");
        } else {
            $zakaznik = new zakaznik();
            $zakaznik->setMeno($meno);
            $zakaznik->setPriezvisko($priezvisko);
            $zakaznik->setEmail($email);
            $zakaznik->setLogin($login);
            $password = password_hash($data["password"], PASSWORD_BCRYPT);
            $zakaznik->setPassword($password);

            $zakaznik->save();
        }

        return $this->redirect("?c=regis&a=reg");

    }


    public function authorize(string $action)
    {
        return true; //
    }
}