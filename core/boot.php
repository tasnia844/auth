<?php
require 'core/Db.php';
require 'config.php';
require 'core/Query.php';
$connection = Db::connection($config);
$query = new Query($connection);




