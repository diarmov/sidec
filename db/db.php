<?php
function connect()
{
    $link = new mysqli('localhost', 'root', '', 'sidec');
    if ($link->connect_errno) {
        echo "Error conectando a la base de datos.<br>";
        echo "Errno: " . $link->connect_errno . "<br>";
        echo "Error: " . $link->connect_error . "<br>";
        exit;
    } else {
        return $link;
    }
}


// <?php
// function connect()
// {
//     $link = new mysqli('10.118.11.16', 'root', 'slrfp.34*789', 'sidec');
//     if($link->connect_errno){
//         echo "Error conectando a la base de datos.<br>";
//         echo "Errno: " . $link->connect_errno . "<br>";
//         echo "Error: " . $link->connect_error . "<br>";
//         exit;
//     }else{
//         return $link;
//     }
// }