<?php

function contar_bits($mascara){
    $octets_mascara = explode('.', $mascara);

    $num_mascara = 0;

    foreach ($octets_mascara as $octet) {
        $bits = decbin($octet);
        $num_mascara += substr_count($bits, '1');
    }
    return $num_mascara;
}

if(isset($_GET['ip']) && isset($_GET['mascara'])){

    $ip_orig = $_GET['ip'];
    $mascara_orig = $_GET['mascara'];


    $num_punts_ip = substr_count($ip_orig,'.');
    $num_punts_mascara = substr_count($mascara_orig,'.');
    //les ip han de tenir 3 punts i una barra per la mascara cidr
    if($num_punts_ip != 3){

        echo "Format de l'adreça IP: <code>$ip_orig</code> incorrecte<br>";
        echo "<a href=.>Tornar</a>";
        exit();
    }

    if($num_punts_mascara != 3){

        echo "Format de la mascara: <code>$mascara_orig</code> incorrecte<br>";
        echo "<a href=.>Tornar</a>";
        exit();
    }



    $num_mascara = contar_bits($mascara_orig);
    

    echo "IP en format CIDR: $ip_orig/$num_mascara<br>";

    echo "<a href=.>Tornar</a>";







}







?>