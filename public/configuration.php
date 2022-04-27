<?php
$server = 'mysql';
$username = 'dissertation';
$password = 'dissertation';
$schema = 'dissertation';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
?>