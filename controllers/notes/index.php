<?php


use Core\App;

$db = App::resolve('Core\Database');

$notes = $db->query('select * from notes')->get();

$header = 'Notes';

view('notes/index.view.php', ["header" => $header, "notes" => $notes]);
