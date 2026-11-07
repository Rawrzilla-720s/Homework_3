# Chez Session — Homework 3

A bistro order form that remembers the customer's dessert, drink and drink size with PHP sessions.

Live site: https://codd.cs.gsu.edu/~smurugavvel1/Web/HW/hw3/index.php

## How it works

1. `index.php` shows the form. The restore helpers mark the saved options as `selected` / `checked`.
2. The form POSTs to `process_order.php`, which calls `order()` to save the three choices in `$_SESSION` and prints the receipt.
3. **Order Again!** links back to `index.php` with the same session, so the choices come back.
4. `forget_order.php` clears the order, destroys the session and redirects to a blank form.

All session logic lives in `order_functions.php`. A missing, empty, `none` or off-menu value is stored as `(not selected)`.
The receipt page also sets a `lastVisit` cookie, used only for the "Welcome back" greeting.

## Run locally

```bash
php -S localhost:8000 -t hw3
```

Then open http://localhost:8000/index.php.
