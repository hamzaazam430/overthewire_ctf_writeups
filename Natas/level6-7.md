# Info

## Natas Level 7

```
Username: natas7
URL:      http://natas7.natas.labs.overthewire.org
```

## Solution

- Go to link
- You have two links
- on clicking you can see the url is changing, that is the `page` query param
- on inspecting the page, we got a hint to get password from this location `/etc/natas_webpass/natas8`
- so best way to view it, put this location in the value for page param, like this:
> http://natas7.natas.labs.overthewire.org/index.php?page=/etc/natas_webpass/natas8
- You will get your password.

## Password

The password for natas8 is xcoXLmzMkoIP9D7hlgPlh9XD7OgLAe5Q