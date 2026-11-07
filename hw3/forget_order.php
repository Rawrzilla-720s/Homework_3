<?php
require 'order_functions.php';

unset($_SESSION['dessert'], $_SESSION['drink'], $_SESSION['drinkSize']);
$_SESSION = [];

// Expire the session ID cookie too, so the next visit starts a new session.
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

session_destroy();

header('Location: index.php');
exit;
