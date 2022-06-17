<?php

function setFlash(string $index, string $message, string $css = 'color:red')
{
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }

    $_SESSION['flash'][$index] = ['message' => $message, 'css' => $css];
}

function getFlash(string $index)
{
    if (isset($_SESSION['flash'])) {
        $sessionFlash = $_SESSION['flash'][$index];
        $flash = $sessionFlash['message'];
        unset($_SESSION['flash']);

        return "<span style='{$sessionFlash["css"]}'>{$flash}</span>";
    }
}
