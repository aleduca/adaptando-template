<?php

function addToCart(int $productId)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    where('id', '=', $productId);
    $product = first('products', 'price');

    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = ['qty' => 1, 'subtotal' => $product->price];
    } else {
        $qty = $_SESSION['cart'][$productId]['qty'];
        $_SESSION['cart'][$productId] = ['qty' => $qty+=1, 'subtotal' => $product->price *$qty ];
    }
}


function getCart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
    }

    return [];
}
