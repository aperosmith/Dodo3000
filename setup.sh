#!/bin/bash

# Définition du nom du raspberry
hostname ronfleur

# Synchronisation de la date et heure
apt-get install ntp
systemctl restart ntp
systemctl enable ntp

# Definition des variables
log_path="/var/log/workshop"
date=$(date +"%y-%m-%d")

# Couleurs
export White='\e[1;37m'
export Black='\e[0;30m'
export Blue='\e[0;34m'
export Green='\e[0;32m'
export Cyan='\e[0;36m'
export Red='\e[0;31m'
export Purple='\e[0;35m'
export Brown='\e[0;33m'
export Yellow='\e[1;33m'
export Grey='\e[0;30m'

# --------------------
# Services et dépendances
# --------------------

echo -e "Installation des paquets requis..."

echo -e "Installation MySQL..."
apt-get install --assume-yes -V mysql-server
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Installation MySQL ok !"
  else
    echo -e "$Red$date Installation MySQL KO"
fi

echo -e "Installation Apache2..."
apt-get install --assume-yes -V apache2
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Installation Apache2 OK !"
  else
    echo -e "$Red$date Installation Apache2 KO"
fi

echo -e "Installation PhpMyAdmin..."
apt-get install --assume-yes -V phpmyadmin
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Installation PhpMyAdmin OK !"
  else
    echo -e "$Red$date Installation PhpMyAdmin KO"
fi

# --------------------
# Déploiement Site Web
# --------------------

echo -e "Installation portail web..."
service apache2 stop
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Arret du service Apache2 OK !"
    echo -e "Installation configuration phpmyadmin web..."
    rm -f /etc/phpmyadmin/apache.conf
    cp -v ./config/apache.cong /etc/apache2/apache2.conf
    echo -e "Installation page web par defaut..."
    rm -f /etc/apache2/sites-available/000-default.conf
    cp -v ./config/000-default.conf /etc/apache2/sites-available/
  else
    echo -e "$Red$date Arret du service Apache2 KO"
fi
echo -e "Redemarrage du service Apache2 ..."
service apache2 start
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Redemarrage du service Apache2 OK !"
  else
    echo -e "$Red$date Redemarrage du service Apache2 KO"
fi
echo -e "Copie du site web /var/www/html"
cp -R -v ~/Workshop/html /var/www/html
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Copie du site web OK !"
  else
    echo -e "$Red$date Copie du site web KO"
fi

# --------------------
# Déploiement Base de données
# --------------------

echo -e "Installation de la base de données..."
mysql -u root -p berceuse < ./config/berceuse.sql
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Importation de la base de donneés OK !"
  else
    echo -e "$Red$date Importation de la base de donneés KO"
fi
