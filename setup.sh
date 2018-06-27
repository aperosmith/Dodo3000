#!/bin/bash

## Le but de ce script est d'installer tous les paquets,
## installer la base de données, et copier le site web,
## pour un déploiement rapide et facile depuis le dépot github.

# Définition du nom du raspberry
hostname ronfleur
echo ronfleur > /etc/hostname

# Synchronisation de la date et heure
apt-get install ntp
systemctl restart ntp
systemctl enable ntp

# Definition des variables
LOG="/var/log/workshop"
DATE=$(date +"%y-%m-%d")

# Couleurs
export White='\e[1;37m'
export Blue='\e[0;34m'
export Green='\e[0;32m'
export Red='\e[0;31m'
export Purple='\e[0;35m'
export Yellow='\e[1;33m'

#cd /root/
#rm -rfv /root/Workshop
#cp -vR ./Workshop /root/
cd /root/Workshop

# --------------------
# Services et dépendances
# --------------------

echo -e "Installation des paquets requis..."

echo -e "Installation MySQL..."
apt-get install --assume-yes -V mysql-server
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Installation MySQL ok !"
  else
    echo -e "$Red$DATE Installation MySQL KO"
fi

echo -e "Installation Apache2..."
apt-get install --assume-yes -V apache2
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Installation Apache2 OK !"
  else
    echo -e "$Red$DATE Installation Apache2 KO"
fi

echo -e "Installation PhpMyAdmin..."
apt-get install --assume-yes -V phpmyadmin
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Installation PhpMyAdmin OK !"
  else
    echo -e "$Red$DATE Installation PhpMyAdmin KO"
fi

echo -e "Installation sendmail..."
apt-get install --assume-yes -V sendmail
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Installation sendmail ok !"
  else
    echo -e "$Red$DATE Installation sendmail KO"
fi

# --------------------
# Déploiement Site Web
# --------------------

echo -e "Installation portail web..."
service apache2 stop
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Arret du service Apache2 OK !"
    echo -e "Installation configuration phpmyadmin web..."
    rm -f /etc/phpmyadmin/apache.conf
    cp -v ./config/apache.cong /etc/apache2/apache2.conf
    echo -e "Installation page web par defaut..."
    rm -f /etc/apache2/sites-available/000-default.conf
    cp -v ./config/000-default.conf /etc/apache2/sites-available/
  else
    echo -e "$Red$DATE Arret du service Apache2 KO"
fi
echo -e "Redemarrage du service Apache2 ..."
service apache2 start
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Redemarrage du service Apache2 OK !"
  else
    echo -e "$Red$DATE Redemarrage du service Apache2 KO"
fi
echo -e "Copie du site web /var/www/html"
rm -rfv /var/www/html
cp -R -v ~/Workshop/html /var/www/html
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Copie du site web OK !"
  else
    echo -e "$Red$DATE Copie du site web KO"
fi

# --------------------
# Déploiement Base de données
# --------------------

echo -e "Installation de la base de données..."
echo -e "Veuillez saisir votre mot de passe root :"
read $PASSWORD
cat root /root/username
cat $PASSWORD >> /root/password
chmod 600 /root/username
chmod 600 /root/password
mysql -u root -p$PASSWORD berceuse < ~/Workshop/config/berceuse.sql
if [ "$?" -eq 0 ]
  then
    echo -e "$Green$DATE Importation de la base de donneés OK !"
  else
    echo -e "$Red$DATE Importation de la base de donneés KO"
fi

# --------------------
# Cron
# --------------------

# @reboot /root/Workshop/main/

# Composer
# apt-get install composer
# composer install

touch ~.aws/credentials
echo '[Dieu]' >> ~.aws/credentials
echo 'aws_access_key_id = AKIAJRL2WK5VZLHXRXHQ' >> ~.aws/credentials
echo 'aws_secret_access_key = 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' >> ~.aws/credentials
