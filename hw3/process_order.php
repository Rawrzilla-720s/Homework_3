<?php
require 'order_functions.php';

// A direct visit (no POST) shows the saved order instead of wiping it.
$summary = $_SERVER['REQUEST_METHOD'] === 'POST' ? order() : orderSummary();

setcookie('lastVisit', (string) time(), time() + 86400);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chez Session | Receipt</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <p class="brand">Chez Session</p>
        <nav aria-label="Main">
            <a href="index.php">Order</a>
            <a href="process_order.php" aria-current="page">Receipt</a>
        </nav>
    </header>

    <main class="card">
        <h1>Your receipt</h1>
        <p class="receipt"><?= $summary ?></p>

        <div class="actions">
            <a class="button" href="index.php">Order Again!</a>
            <a class="secondary" href="forget_order.php">Forget order</a>
        </div>
    </main>
</body>
</html>
