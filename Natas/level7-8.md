# Challenge Walkthrough

## Natas Level 8

```
Username: natas8
URL:      http://natas8.natas.labs.overthewire.org
```

## Solution

- Go to link
- You need a secret
- view the page source code
- the secret provided in the input field will get encoded and then compared
- we have the encoded secret, we can just do reverse engineer to view the actual text
- below is a php code, use it to get the secret.
```
<!DOCTYPE html>
<html>
<body>

<?php 
$str = base64_decode(strrev(hex2bin("3d3d516343746d4d6d6c315669563362")));
echo($str); // decoded string: oubWYf2kBq
?>

</body>
</html>
```
- Put the string in the field and get your password for next user. 

## Password

The password for natas9 is ZE1ck82lmdGIoErlhQgWND6j2Wzz6b6t