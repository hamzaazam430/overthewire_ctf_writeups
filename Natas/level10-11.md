# Info

## Natas Level 11

```
Username: natas11
URL:      http://natas11.natas.labs.overthewire.org
```

## Solution

- Go to link
- View the source code
- it creates a cookie when you submit the color
- now try decoding the token using the code below
- below is some sample code, but using these function, I got the key (a repeated string)
    - it was simple, just figure out the input string and xor it with the base64 decode string 

```php
<?php
function xor_encrypt($in) {
    $key = 'eDWo'; // recalculated this key using "recover_key_from_plain_cipher" function
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}


function recover_key_from_plain_cipher($plain, $cipher) {
    $key = '';
    for ($i = 0; $i < strlen($plain); $i++) {
        $key .= $plain[$i] ^ $cipher[$i];
    }
    // key repeats; find shortest repeating prefix
    for ($L = 1; $L <= strlen($key); $L++) {
        $prefix = substr($key, 0, $L);
        if (str_repeat($prefix, ceil(strlen($key)/$L)) === substr($key, 0, strlen($key))) {
            return $prefix;
        }
    }
    return $key;
}
//default payload, just press the submit button and generate the cookie
$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");

$cookieToken = "HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GIjEJAyIxTRg="; // my token

$base64decode = base64_decode($cookieToken);
echo $base64decode;
echo "\n";

$xorKey = recover_key_from_plain_cipher(json_encode($defaultdata), $base64decode);
echo $xorKey; // gave the key, a repeated string
// output: eDWoeDWoeDWoeDWoeDWoeDWoeDWoeDWoeDWoeDWoe
// actual key: eDWo // put it in the "xor_encrypt" function
```

- After obtaining the key, I passed the base64 decoded string in the xor_encrypt function 
- From there, I got the stringified JSON, which indicates that the key was correct
```php
$xorDec = xor_encrypt($base64decode);
echo $xorDec; // gives us back the stringified json
```

- now that we have everything, we can create a new token with some modified values
- below is the code, for generating the token

```php
$data = [
    "showpassword" => "yes",
    "bgcolor" => "#ffffff",
];

$tmp = base64_encode(xor_encrypt(json_encode($data)));
echo "\n$tmp";
?>
```

- put this token in the cookie and refresh the page
- you will get the password

## Password

The password for natas12 is yZdkjAYZRd3R7tq7T5kXMjMJlOIkzDeB