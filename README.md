# MyOpenSSL

# Install

```
composer require emalherbi/myopenssl
```

# Usage

```php
# require_once '../src/MyOpenSSL.php';
require_once 'vendor/autoload.php';

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
```

# Output Usage

```
String Token:ABC
Encrypted String:dTBYUE9SZnpHS1BjN0UwcTFQRDBZUT09
Decrypted string:ABC
Correct authentication
```

# References

[aalonzolu](https://gist.github.com/aalonzolu/69f63b54b6c94b9518c4e057cc88d267)
