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


    $num_punts_ip = substr_count($ip_orig,'.');
    $num_punts_mascara = substr_count($mascara_orig,'.');
    //les ip han de tenir 3 punts i una barra per la mascara cidr
    if($num_punts_ip != 3){

        echo "Format de l'adreça IP: <code>$ip_orig</code> incorrecte<br>";
        echo "<a href=.>Tornar</a>";
        exit();
    }


    $nums_ip = explode('.', $ip_orig);
    var_dump($nums_ip);
    $n1 = $nums_ip[0] . "";
    $n2 = $nums_ip[1] . "";
    $n2 = $nums_ip[2] . "";
    $n3 = $nums_ip[3] . "";

    //echo "$n1.$n2.$n3.$n4";

    //echo $nums_ip[1];
    $ip_xarxa = "";
    $ip_max = "";
    $ip_min = "";
    $ip_broadcast = "";
    $ip_router = "";
    $ip_servidor = "";

    if($_GET['mascara'] == "8"){
        echo "/8";
        $ip_xarxa = "$n1.0.0.0";
        $ip_min = "$n1.0.0.1";
        $ip_max = "$n1.255.255.254";
        $ip_broadcast = "$n1.255.255.255";
        $ip_router = "$n1.0.0.1";
        $ip_servidor = "$n1.0.0.2";
    }

    if($_GET['mascara'] == "16"){
        $ip_xarxa =     "$n1.$n2.0.0";
        $ip_min =       "$n1.$n2.0.1";
        $ip_max =       "$n1.$n2.255.254";
        $ip_broadcast = "$n1.$n2.255.255";
        $ip_router =    "$n1.$n2.0.1";
        $ip_servidor =  "$n1.$n2.0.2";
    }

    if($_GET['mascara'] == "24"){
        $ip_xarxa =     "$n1.$n2.$n3.0";
        $ip_min =       "$n1.$n2.$n3.1";
        $ip_max =       "$n1.$n2.$n3.254";
        $ip_broadcast = "$n1.$n2.$n3.255";
        $ip_router =    "$n1.$n2.$n3.1";
        $ip_servidor =  "$n1.$n2.$n3.2";
    }

    echo "IP Xarxa: <code>$ip_xarxa</code><br>";
    echo "Marge IPs: <code>$ip_min</code> - <code>$ip_max</code><br>";
    echo "IP Broadcast: <code>$ip_broadcast</code><br>";
    echo "IP Router: <code>$ip_router</code><br>";
    echo "IP Servidor: <code>$ip_servidor</code><br>";


    echo "<a href=.>Tornar</a>";







}







?>