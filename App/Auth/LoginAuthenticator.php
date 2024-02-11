<?php

namespace App\Auth;

use App\Core\DB\Connection;
use App\Models\zakaznik;
use http\Client\Curl\User;

class LoginAuthenticator extends DummyAuthenticator
{
    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */

    public function login($login, $password): bool
    {
        $zakaznik = zakaznik::getAll("login = ?", [$login]);

        if (count($zakaznik) == 1) {
            $zakaznik = $zakaznik[0];
            if (password_verify($password, $zakaznik->getPassword())) {
                $_SESSION['user'] = $login;
                return true;
            } else {
                return false;
            }
        }else {
                return false;
            }
        }


    function isLogged() : bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }



}