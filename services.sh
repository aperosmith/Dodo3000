#!/bin/bash

echo -e "Redemarrage des services..."

##  Demarrer les services linux de base.
##  Ces services devraient etre automatiquement demarres.
service cron start
service mysql start
service apache2 start


##  Demarrer le programme Berceuse
# /root/berceuse.c


## Jouer un son quand le Raspberry est operationnel
