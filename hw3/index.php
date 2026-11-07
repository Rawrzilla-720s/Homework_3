<?php
require 'order_functions.php';
date_default_timezone_set('America/New_York');

$lastVisit = filter_var($_COOKIE['lastVisit'] ?? null, FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chez Session | Order Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="site-header">
        <p class="brand">Chez Session</p>
        <nav aria-label="Main">
            <a href="index.php" aria-current="page">Order</a>
            <a href="process_order.php">Receipt</a>
        </nav>
    </header>

    <main class="card">
        <h1>Place your order</h1>
        <?php if ($lastVisit): ?>
            <p class="greeting">Welcome back! Your last visit was <?= date('F j, Y \a\t g:i A', $lastVisit) ?>.</p>
        <?php endif; ?>
        <p class="intro">Pick a dessert, a drink and a size. We will remember your choices when you come back to order again.</p>

        <form action="process_order.php" method="post">
            <div class="field">
                <label for="dessert">Dessert</label>
                <select id="dessert" name="dessert">
                    <option value="none">Choose a dessert</option>
                    <?php foreach (DESSERTS as $dessert): ?>
                        <option value="<?= $dessert ?>" <?= dessertSelected($dessert) ?>><?= $dessert ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="field">
                <label for="drink">Drink</label>
                <select id="drink" name="drink">
                    <option value="none">Choose a drink</option>
                    <?php foreach (DRINKS as $drink): ?>
                        <option value="<?= $drink ?>" <?= drinkSelected($drink) ?>><?= $drink ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <fieldset class="field">
                <legend>Drink size</legend>
                <div class="sizes">
                    <?php foreach (DRINK_SIZES as $size): ?>
                        <label class="size">
                            <input type="radio" name="drinkSize" value="<?= $size ?>" <?= drinkSizeSelected($size) ?>>
                            <?= $size ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <div class="actions">
                <button type="submit">Send order</button>
                <a class="secondary" href="forget_order.php">Forget order</a>
            </div>
        </form>
    </main>
</body>
</html>
