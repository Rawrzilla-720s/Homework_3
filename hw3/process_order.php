<?php
require 'order_functions.php';

// A direct visit (no POST) shows the saved order instead of wiping it.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    order();
}

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

    <main class="page page--single">
        <div>
            <h1>Your receipt</h1>
            <section class="ticket ticket--receipt" aria-labelledby="receipt-title">
                <h2 id="receipt-title">Chez Session, table order</h2>
                <dl>
                    <?php foreach (ORDER_FIELDS as $key => $name): ?>
                        <div class="ticket-row">
                            <dt><?= $name ?></dt>
                            <dd><?= savedChoice($key) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </section>

            <div class="actions">
                <a class="button" href="index.php">Order Again!</a>
                <a class="secondary" href="forget_order.php">Forget order</a>
            </div>
        </div>
    </main>
</body>
</html>
