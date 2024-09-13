<?php
function connect_sised()
{
    $link = new mysqli('localhost', 'root', '', 'soicv2db');
    if ($link->connect_errno) {
        echo "Error conectando a la base de datos.<br>";
        echo "Errno: " . $link->connect_errno . "<br>";
        echo "Error: " . $link->connect_error . "<br>";
        exit;
    } else {
        return $link;
    }
}
