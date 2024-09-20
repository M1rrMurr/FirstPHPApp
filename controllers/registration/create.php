<?php

use Core\Session;


view("/registration/create.view.php", ["header" => "register", 'errors' => Session::get('errors')]);
