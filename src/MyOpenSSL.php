<?php

/*
 * Eduardo Malherbi Martins
 * Copyright @emalherbi
 */

namespace MyOpenSSL;

class MyOpenSSL
{
    /**
     * Simple method to encrypt or decrypt a plain text string
     * initialization vector (IV) has to be the same when encrypting and decrypting.
     *
     * @param string $action: can be 'encrypt' or 'decrypt'
     * @param string $string: string to encrypt or decrypt
     *
     * @return string
     */
    private $encrypt = 'AES-256-CBC';
    private $key = '';
    private $iv = '';

    public function __construct($hash, $iv_secret)
    {
        $this->key = hash('sha256', $hash);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $this->iv = substr(hash('sha256', $iv_secret), 0, 16);
    }

    public function encrypt($key_public)
    {
        $output = openssl_encrypt($key_public, $this->encrypt, $this->key, 0, $this->iv);

        return base64_encode($output);
    }

    public function decrypt($key_public)
    {
        return openssl_decrypt(base64_decode($key_public), $this->encrypt, $this->key, 0, $this->iv);
    }
}
