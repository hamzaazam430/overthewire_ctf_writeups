# Info

## Natas Level 10

```
Username: natas10
URL:      http://natas10.natas.labs.overthewire.org
```

## Solution

- Go to link
- you have a search box
- view the source code
- it now blocks the character `;`, `|` and `&`
- so we can't append the commands directly, like in previous level
- but their's an alternate, we can give the path to our password file.
- so pass this in the search box `a /etc/natas_webpass/natas11`
- PHP substitutes `$key` and the shell sees this exact command (words separated by whitespace):
> grep -i a /etc/natas_webpass/natas11 dictionary.txt
- so, we are actually providing two files to search the pattern: `a`
    - /etc/natas_webpass/natas11
    - dictionary.txt
- after `-i` check: 
    - first arg will be **pattern** to search
    - all the trailing args will be files to search the pattern in
- hence, this way we got our password

## Password

The password for natas11 is UJdqkK1pTu6VLt9UHWAgRZz6sVUZ3lEk