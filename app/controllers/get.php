<?php

return match ($inc) {
    'home' => function () {
        // session_destroy();
        $data = get('products');

        return ['products' => $data,'title' => 'Home'];
    },
    'details' => function () {
        $id = strip_tags($_GET['id']);

        where('id', '=', $id);
        $product = first('products');

        return ['product' => $product];
    },
    'get-products' => function () {
        echo json_encode(getCart());
    },
    'contact' => function () {
        return ['title' => 'Contact'];
    },
    'login' => function () {
        return ['title' => 'Login'];
    },
    'logout' => function () {
        logout();
        die();
    },
    'cart' => function () {
        $products = getCart();
        $total = totalInCart();

        return ['title' => 'Cart', 'products' => $products, 'total' => $total];
    },
    'cart-remove' => function () {
        $id = strip_tags($_GET['id']);

        removeFromCart($id);
    },
    'clear-cart' => function () {
        clearCart();

        return redirect('?inc=cart');

        die();
    },
    default => function () {
        var_dump("whoops, route not found ");
    }
};
