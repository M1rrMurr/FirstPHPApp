<?php


use Core\Validator;

use Core\Authenticator;

use Core\Session;


$email = $_POST['email'];

$password = $_POST['password'];

$errors = [];


if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email address';
};

if (! Validator::string($_POST['password'], 7, 255)) {
    $errors['password'] = 'Password needs to be at least seven character long';
};


if (! empty($errors)) {

    Session::flash('errors', $errors);
    redirect('/register');
};


if (Authenticator::find($email)) {
    // if so redirect
    redirect('/register');
} else {
    //if not register in the db
    $db->query('insert into users (email, password) values (:email, :password)', ['email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT)]);

    $_SESSION['user'] = ['email' => $email];
}

header('Location: /');

die();
