#!/bin/bash

## Le but de ce script est de remettre certaines configurations
## du Raspberry à leurs valeurs par défaut.

echo -e "Reset : en cours..."

# --------------------
# Variables
# --------------------

mkdir /var/backups/
USERNAME=$(cat /root/username)
PASSWORD=$(cat /root/password)
backup_path="/var/backups"
date=$(date +"%y-%m-%d")

# --------------------
# Base de données
# --------------------

mysqldump --all-databases > $backup_path/backup_base-$date.sql -u $USERNAME -p$PASSWORD
mysql -u $USERNAME -p$PASSWORD berceuse < /root/Workshop/config/berceuse.sql

echo -e "Reset : ok"
