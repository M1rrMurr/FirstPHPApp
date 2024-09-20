<?php

namespace Core;

class Authenticator
{
    public static function find($email)
    {
        $db = App::resolve('Core\Database');

        return $db->query('select * from users where email = :email', ['email' => $email])->find();
    }

    public function attempt($email, $password)
    {
        $db = App::resolve('Core\Database');

        $user = $db->query('select * from users where email = :email', ['email' => $email])->find();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $this->login(['email' => $email]);

                return true;
            };
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;

        session_regenerate_id(true);
    }

    public function logout()
    {

        Session::destroy();

        exit();
    }
}
