<?php
require('classes/Database.php');

$config = require('config/database.php');

return new Database($config['host'], $config['username'], $config['password'], $config['database']);
?>