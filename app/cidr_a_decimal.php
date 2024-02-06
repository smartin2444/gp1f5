<?php

function crear_mascara($mascara){
    $uns_restants = $mascara;

    $octet_n = "";
    $octets = array();
    for ($i=0; $i < 32; $i++) { 
        if($uns_restants-- > 0){
            $octet_n .= "1";
        } else {
            $octet_n .= "0";
        }

        if(strlen($octet_n) == 8){
            array_push($octets, bindec($octet_n));
            $octet_n = "";
        }
    }

    $mascara_decimal = implode('.',$octets);
    return $mascara_decimal;
}

if(isset($_GET['ip'])){

    $ip_orig = $_GET['ip'];


    $num_punts = substr_count($ip_orig,'.');
    $num_barra = substr_count($ip_orig,'/');
    //les ip han de tenir 3 punts i una barra per la mascara cidr
    if($num_punts != 3){

        echo "Format de l'adreça IP: <code>$ip_orig</code> incorrecte<br>";
        echo "<a href=.>Tornar</a>";
        exit();
    }

    if($num_barra != 1){

        echo "Format de l'adreça IP CIDR: <code>$ip_orig</code> incorrecte<br>";
        echo "<a href=.>Tornar</a>";
        exit();

    }


    $ip_orig_parts = explode('/', $ip_orig);

    $mascara = intval($ip_orig_parts[1]);
    $ip_str = $ip_orig_parts[0];
    $ip = explode('.', $ip_str);

    echo "IP: <code>$ip_str</code><br>";
    $mascara_decimal = crear_mascara($mascara);
    
    

    echo "Mascara decimal: <code>$mascara_decimal</code><br>";

    echo "<a href=.>Tornar</a>";







}







?>