<?php

session_start();

$products = [
    ['id' => 1, 'name' => 'pan', 'price' => 10],
    ['id' => 2, 'name' => 'lays', 'price' => 20],
    ['id' => 3, 'name' => 'cannon', 'price' => 30],
    ['id' => 4, 'name' => 'car', 'price' => 40],
    ['id' => 5, 'name' => 'phone', 'price' => 50],
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 0;
    }
    $_SESSION['cart'][$id]++;
    header('Location: index.php');
    exit;
}

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]--;
        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
    header('Location: index.php');
    exit;
}

if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Shopping Cart</h1>

<table>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    <?php
    $total = 0;
    foreach ($products as $product) {
        $id = $product['id'];
        $name = $product['name'];
        $price = $product['price'];
        $quantity = isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id] : 0;
        $subtotal = $quantity * $price;
        $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $name; ?></td>
            <td>$<?php echo number_format($price, 2); ?></td>
            <td><?php echo $quantity; ?></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
            <td>
                <a href="?add=<?php echo $id; ?>">Add to Cart</a>
                <a href="?remove=<?php echo $id; ?>">Remove from Cart</a>
            </td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td colspan="3" style="text-align: right;">Total:</td>
        <td>$<?php echo number_format($total, 2); ?></td>
        <td>
            <a href="?clear">Clear Cart</a>
        </td>
    </tr>