<?php

/*
 * Eduardo Malherbi Martins
 * Copyright @emalherbi
 */

require_once '../src/MyOpenSSL.php';

$ivSSL = 'klEUGdjU4M827qruJdLZVTcVYbCsWoVG';
$hashSSL = 'WK3judku9bOVPjprhrvU2xwCPwDNk4QN';

$openSSL = new MyOpenSSL\MyOpenSSL($hashSSL, $ivSSL);

$key_public = 'ABC';

echo '<pre>';
echo 'String Token:'.$key_public."\n";

$key_encrypt = $openSSL->encrypt($key_public);
echo 'Encrypted String:'.$key_encrypt."\n";

$key_decrypt = $openSSL->decrypt($key_encrypt);
echo 'Decrypted string:'.$key_decrypt."\n";

if ($key_public == $key_decrypt) {
    echo "Correct authentication\n";
}

echo '</pre>';
