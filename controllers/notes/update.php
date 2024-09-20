<?php


use Core\App;
use Core\Validator;

$errors = [];

$currentUser = 121;

$db = App::resolve('Core\Database');

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Body is required, needs to be less than 1000 character';
};

$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();

authorize($currentUser === $note['user_id']);

if (! empty($errors)) {
    return view('notes/edit.view.php', ['header' => 'Edit Note', 'errors' => $errors, 'note' => $note]);
}

$db->query('update notes set body = :note where id = :id', ['note' => $_POST['body'], 'id' => $_POST['id']]);

header('Location: /notes');

die();
