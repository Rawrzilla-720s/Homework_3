<?php
session_start();

const NOT_SELECTED = '(not selected)';
const DESSERTS = ['Cheesecake', 'Chocolate Cake', 'Carrot Cake', 'Tiramisu'];
const DRINKS = ['Coffee', 'Hot Chocolate', 'Root Beer', 'Tea', 'Milk'];
const DRINK_SIZES = ['Small', 'Medium', 'Large'];

// Anything not on the menu (missing, empty, "none" or tampered) falls back.
function cleanChoice(string $field, array $menu): string
{
    $value = trim($_POST[$field] ?? '');
    return in_array($value, $menu, true) ? $value : NOT_SELECTED;
}

function order(): string
{
    $_SESSION['dessert'] = cleanChoice('dessert', DESSERTS);
    $_SESSION['drink'] = cleanChoice('drink', DRINKS);
    $_SESSION['drinkSize'] = cleanChoice('drinkSize', DRINK_SIZES);

    return orderSummary();
}

function orderSummary(): string
{
    return 'Dessert: ' . savedChoice('dessert') . '<br>'
        . 'Drink: ' . savedChoice('drink') . '<br>'
        . 'Drink size: ' . savedChoice('drinkSize');
}

function savedChoice(string $key): string
{
    return htmlspecialchars($_SESSION[$key] ?? NOT_SELECTED);
}

function dessertSelected(string $dessert): string
{
    return ($_SESSION['dessert'] ?? '') === $dessert ? 'selected' : '';
}

function drinkSelected(string $drink): string
{
    return ($_SESSION['drink'] ?? '') === $drink ? 'selected' : '';
}

function drinkSizeSelected(string $size): string
{
    return ($_SESSION['drinkSize'] ?? '') === $size ? 'checked' : '';
}
