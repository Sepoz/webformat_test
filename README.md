# Test

## Comandi CLI

- Eseguire il seeding del database mysql
```console
php seeder.php
```


- Assegna una nuova task ad un developer
```console
php main.php -t -a --desc="DESCRIZIONE" --status="STATUS" --dline="DEADLINE" --dev="DEVELOPER NAME"
```


- Rimuovere una task da un developer
```console
php main.php -t -r --dev="DEVELOPER" --tID="ID TASK"
```


- Mostrare tutti i task "in elaborazione" di un developer
```console
php main.php -t -l --dev="DEVELOPER"
```


- Mostrare i progetti cross-team
```console
php main.php -p -s
```


- Mostrare il PM di riferimento di un developer
```console
php main.php -d -m --dev="DEVELOPER"
```


## ORM

RedBeanPHP

https://redbeanphp.com/index.php

Non ho utilizzato composer come specificato nella loro documentazione;