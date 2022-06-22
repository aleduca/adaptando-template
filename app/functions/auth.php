<?php

function auth()
{
    if (isAuth()) {
        return (object)$_SESSION['user'];
    }
}

function fullName()
{
    return auth()->firstName . ' '.auth()->lastName;
}


function isAuth()
{
    return isset($_SESSION['user']);
}


function logout()
{
    if (isAuth()) {
        unset($_SESSION['user']);
        return redirect('/');
    }
}
