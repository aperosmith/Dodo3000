#!/bin/bash

# --------------------
# Variables
# --------------------

mkdir /var/backups
BACKUP="/var/backups"
DATE=$(date +"%y-%m-%d")
USERNAME=$(cat /root/username)
PASSWORD=$(cat /root/password)

# --------------------
# Sauvegarde
# --------------------

mysqldump --all-databases > $BACKUP/backup_base-$DATE.sql -u $USERNAME -p$PASSWORD

# --------------------
# Transfert
# --------------------

sshpass -p bigboobz scp $BACKUP/*.sql ronfleur@fritecraft.fr:/home/ronfleur
