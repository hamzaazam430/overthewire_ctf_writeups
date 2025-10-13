# Info

## Natas Level 8

```
Username: natas9
URL:      http://natas9.natas.labs.overthewire.org
```

## Solution

- Go to link
- You get a field that will search anything in the file, you can also view the source code.
- here you can see, whatever the text we send, it is appended in the command.
- We can try injecting commands here.
- Try running the following command:
> test; whoami; #
- it return the user `natas9`, which is our current user.
- now let's see if we can fetch the password for other users like `natas10`
> test; cat /etc/natas_webpass/natas10; #
- And we got our password

## Password

The password for natas10 is t7I5VHvpa14sJTUGV0cbEsbYfFP2dmOu