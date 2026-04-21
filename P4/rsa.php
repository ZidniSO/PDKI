<?php
function rsa_encrypt($text, $e, $n){
    $hasil = [];
    $chars = str_split($text);

    foreach($chars as $char){
        $ascii = ord($char);
        $c = bcpowmod($ascii, $e, $n);
        $hasil[] = $c;
    }

    return implode("-", $hasil);
}

function rsa_decrypt($cipher, $d, $n){
    $hasil = "";
    $blocks = explode("-", $cipher);

    foreach($blocks as $c){
        $m = bcpowmod($c, $d, $n);
        $hasil .= chr($m);
    }

    return $hasil;
}
?>