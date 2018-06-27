#!/bin/bash

cd /root/Workshop


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

echo -e "Copie du site web /var/www/html"
rm -rfv /var/www/html
cp -R -v ~/Workshop/html /var/www/html
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$date Copie du site web OK !"
  else
    echo -e "$Red$date Copie du site web KO"
fi
