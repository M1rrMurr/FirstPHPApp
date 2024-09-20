<?php


use Core\App;

$current_user = 1;

$id = $_GET["id"];

$db = App::resolve('Core\Database');

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

authorize($current_user === $note["user_id"]);

$header = 'Note';

view('notes/show.view.php', ["header" => $header, "note" => $note]);
