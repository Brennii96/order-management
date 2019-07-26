<?php
require_once 'core/init.php';

return DB::getInstance("SELECT * FROM clients WHERE client_name LIKE '%".Input::get('clientname')."%'")->results();