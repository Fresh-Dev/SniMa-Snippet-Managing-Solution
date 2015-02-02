<?php
/*
 * Text-Absicherung in SALTEN SHA256 RIJANDAEL mit Schl�ssel
 *
 * @param $data Der zu sicherende String
 * @param $key Der Entsperr-Schl�ssel
 * @param $salt SALT-Wert
 *
 * @return string Gecrypteter String
 */
function sperren_sha256_rijndael($data, $key, $salt) {
    $newkey = substr(hash('sha256', $salt.$key.$salt), 0, 32);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $newkey, $data, MCRYPT_MODE_ECB, $iv));
    return $encrypted;
}

/*
 * Text-Entsperrung f�r SALTEN SHA256 RIJANDAEL mit Schl�ssel
 *
 * @param $data Der zu entsperrende Crypted-String
 * @param $key Der Entsperr-Schl�ssel
 * @param $salt SALT-Wert
 *
 * @return string Entschl�sselter String
 */
function entsperren_sha256_rijndael($data, $key, $salt) {
    //$salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
    $newkey = substr(hash('sha256', $salt.$key.$salt), 0, 32);    
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);        
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $newkey, base64_decode($data), MCRYPT_MODE_ECB, $iv);
    return $decrypted;
}


/**
 * Text-Verschl�sselung Salten SHA512
 * @param        $str
 * @param        $iterations
 * @param string $salt
 *
 * @return string
 */
function SHA512Crypt($str, $iterations,$salt=SALZ)
{
    for ($x=0; $x<$iterations; $x++)
    {
        $str = hash('sha512', $str . $salt);
    }
    return $str;
}