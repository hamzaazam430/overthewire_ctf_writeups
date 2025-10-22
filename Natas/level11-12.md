# Info

## Natas Level 12

```
Username: natas12
URL:      http://natas12.natas.labs.overthewire.org
```

## Solution

- Go to link
- view the source code
- it is uploading a file, but whatever file is uploaded it is renamed to `.jpg` at the end with random string
- after inspecting the code, there's a hidden input field, that sets the file name with `.jpg` file ext.
- So, we have a chance to upload a php shell code, if we could change the file extension at the time of upload.
- Let open up our burp suite.
- also create a simple php file `cmd.php` with following code (you can name your file anyway you like).
```php
<?php echo shell_exec('cat /etc/natas_webpass/natas13'); ?>
```
- configure proxy, start intercepting the request. 
- now upload the php file, press the upload button.
- in burpsuite request, look for the `Request body parameters` option on the bottom right portion (under Inspector).
- you will see a param as `filename` and it's values as some random string and `.jpg` extension.
- change the extension to `.php` and forward the request.
- now it will generate a link for the uploaded file
- click on the link and it will run the code and return the key for next level 

## Password

The password for natas13 is trbs5pCjCrkuSknBBKHhaBxq6Wm1j3LC