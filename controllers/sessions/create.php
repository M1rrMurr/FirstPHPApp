<?php

use Core\Session;

//dd(Session::get('errors'));

view('/sessions/create.view.php', ['header' => 'Log In', 'errors' => Session::get('errors')],);
