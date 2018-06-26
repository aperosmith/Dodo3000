#!/bin/bash

echo -e "Redémarrage des services..."

##  Démarrer les services linux de base.
##  Ces services devraient être automatiquement démarrés.
service cron start
service mysql start
service apache2 start


##  Démarrer le programme Berceuse
# /root/berceuse.c


## Jouer un son quand le Raspberry est opérationnel
