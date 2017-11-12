<?php
session_start();
$message = '';
require 'core/boot.php';
if ( isset ($_SESSION['user_id']) ) {
  header('location: /');
}
if (isset($_POST['email']) && isset($_POST['password'])) {
  $return_value = $query->check_login($_POST);
  if ($return_value === 'login') {
    $_SESSION['user_id'] = 'whate ever you like';
    header('Location: /');
  }
  if ($return_value == 'wrong') {
    $message = 'wrong email or password';
  }
  if ($return_value == 'not-registered') {
    $message = 'You didn\'t registered yet';
  }
}

require 'views/login.view.php';