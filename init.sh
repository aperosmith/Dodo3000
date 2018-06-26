#!/bin/bash

log_path="/var/log/workshop"
date=$(date +"%y-%m-%d")

git config --global http.sslverify=false


# --------------------
# Apache
# --------------------

service apache2 stop
echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf
rm -f /etc/apache2/sites-available/000-default.conf
cp /root/Workshop/config/000-default.conf /etc/apache2/sites-available/
service apache2 start
if [ "$?" -eq 0 ]
  then
    echo -e "$date Apache OK" >> $log_path/init
  else
    echo -e "$date Apache KO" >> $log_path/init
fi
