<?php

use Core\App;

$current_user = 1;

$db = App::resolve('Core\Database');

$id = $_GET["id"];

$note = $db->query('select * from notes where id=:id', ["id" => $id])->findOrFail();

authorize($current_user === $note["user_id"]);

view('notes/edit.view.php', ["header" => "Edit Note", "note" => $note]);
