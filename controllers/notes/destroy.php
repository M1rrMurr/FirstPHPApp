<?php


use \Core\App;

$current_user = 1;


$id = $_POST["id"];

$db = App::resolve('Core\Database');

$note = $db->query("select * from notes where id = :id", ["id" => $id])->findOrFail();

authorize($note["user_id"] === $current_user);

$db->query("delete from notes where id = :id", ["id" => $_POST["id"]]);

header('Location: /notes');

exit();
