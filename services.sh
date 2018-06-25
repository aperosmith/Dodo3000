#!/bin/bash

##  Démarrer les services linux de base.
##  Ces services devraient être automatiquement démarrés.
service cron start
service mysql start
service apache2 start
