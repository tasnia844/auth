<?php 
require 'core/boot.php';
$message = '';
session_start();
if ( isset ($_SESSION['user_id']) ) {
  header('location: /');
}
if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ) {
  $message = $query->register_user($_POST);
}
require 'views/register.view.php';
