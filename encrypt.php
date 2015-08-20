<?php

$po = '<' . '?php';
$pc = '?' . '>';

$input = 'file.php';
$code = file_get_contents($input);

$encoded = base64_encode($code);

$encoded_script = <<< EOL
$po

eval(base64_decode($encoded));

$pc
EOL;

file_put_contents('encoded.php', $encoded_script);