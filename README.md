PUBLIQ API
==========

This repository holds all interfaces related to PUBLIQ API.

```console
user@pc:~$ git clone https://github.com/publiqnet/publiq-models-php
user@pc:~$ rm -rf publiq-models-php/src
user@pc:~$ install/bin/publiq.pp/idl_php publiq.pp/src/libblockchain/message.idl publiq-models-php PubliqAPI
user@pc:~$ mv publiq-models-php/PubliqAPI/src/ publiq-models-php
user@pc:~$ rm -rf publiq-models-php/PubliqAPI/
user@pc:~$ cd publiq-models-php
user@pc:~/publiq-models-php$ git commit -am "commit message"
user@pc:~/publiq-models-php$ git push
```
