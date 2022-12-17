<?php
require_once('Database.php');

$db = new Database();

$un = $_POST['email'];
$pass = md5($_POST['pwd']);

$db->signup($un, $pass);

?>