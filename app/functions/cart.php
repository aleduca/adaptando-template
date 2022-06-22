<?php

function addToCart(int $productId, int $quantity, bool $qtyTotal = false)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    where('id', '=', $productId);
    $product = first('products', 'id,price,name,img');

    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = ['id' => $product->id,'qty' => $quantity,'price' => $product->price, 'subtotal' => $product->price, 'name' => $product->name, 'img' => $product->img];
    } else {
        $qty = $_SESSION['cart'][$productId]['qty'];
        $_SESSION['cart'][$productId] = ['id' => $product->id,'price' => $product->price, 'name' => $product->name, 'img' => $product->img];
        if (!$qtyTotal) {
            $_SESSION['cart'][$productId]['qty'] = $qty+=$quantity;
            $_SESSION['cart'][$productId]['subtotal'] = $product->price * $qty;
        } else {
            $_SESSION['cart'][$productId]['qty'] = $quantity;
            $_SESSION['cart'][$productId]['subtotal'] = $product->price * $quantity;
        }
    }
}


function getCart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
    }

    return [];
}

function removeFromCart(int $productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}


function totalInCart()
{
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $total+=$product['subtotal'];
        }
    }

    return $total;
}


function clearCart()
{
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}
