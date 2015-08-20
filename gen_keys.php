<?	
	$path = "keys/";

    $crt = openssl_x509_read(file_get_contents($path."cert.crt"));
    $publickey = openssl_get_publickey($crt);

    //Encrypt using public key
    openssl_public_encrypt($source, $crypted, $publickey);

    //openssl_private_encrypt($source, $crypted, $privkey);
    echo base64_encode($crypted);
?>at