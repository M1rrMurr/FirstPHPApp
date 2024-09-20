<?php


use Core\Authenticator;
use Core\FormException;
use Http\Forms\LoginForm;


$email = $_POST['email'];

$password = $_POST['password'];


$form = LoginForm::validate(['email' => $email, 'password' => $password]);


if (! (new Authenticator)->attempt($email, $password)) {

    $form->add('credentials', 'Invalid credentials')->throw();
}

redirect('/login');
