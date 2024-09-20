<?php


use Core\App;

use Core\Validator;

$db = App::resolve('Core\Database');


$errors = [];

$currentUser = 1;

$note = $_POST["body"];

if (! Validator::string($note, 1, 1000)) {
    $errors["body"] = "Note is required and has to be less than 1000 character";
}

if (! empty($errors)) {
    return view("notes/create.view.php", ["errors" => $errors, "header" => "Create Note"]);
}

$db->query("insert into notes (body, user_id) values (:body, :user_id)", ['body' => $note, 'user_id' => $currentUser]);

$notes = $db->query('select * from notes')->get();

view('notes/index.view.php', ["header" => "Notes", "notes" => $notes]);
