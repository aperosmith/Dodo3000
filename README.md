<p align="center">
<img src="http://blog.xebia.fr/wp-content/uploads/2015/03/rass.png" width="200"/>
</p>

# Berceuse "Ronfleur"

Le Ronfleur est une berceuse intelligente. Il est capable de détecter les pleurs du bébé, et de déclencher automatiquement une musique douce pour l'aider à s'endormir.

Vous pouvez utiliser nos berceuses par défaut, ou ajouter vos propres mélodies. Pour cela, connectez le Ronfleur à votre réseau, et connectez-vous grâce à votre navigateur.

Le Ronfleur est aussi capable de vous fournir des statistiques sur le sommeil de votre enfant.

# Préparations

La berceuse intelligente est conçue pour fonctionner sur un micro-ordinateur RaspberryPi.

Commencez par télécharger le programme d'installation NOOBS :

> https://www.raspberrypi.org/downloads/noobs/

Copier le contenu de l'archive sur une carte micro-SD. Il faut aussi placer un fichier ssh dans le répertoire racine de la carte. Le fichier peut être vide. Ce fichier est indispensable pour se connecter en ssh sur l'appareil. Les identifiants par défaut sont 'pi:raspberry'. Il est vivement conseiller de modifier ces identifiants.

# Installation

En tant qu'utilisateur root, ou avec sudo :

```
cd /root/
git config --global http.sslverify false
git clone http://github.com/Ventouz/Workshop
cd Workshop
./setup.sh
```
Ce script va installer les paquets requis sur le raspberry : Apache, Mysql-Server, PhpMyAdmin, ntp, screen. Il va aussi copier les configurations pour apache et PhpMyAdmin, et va aussi copier le portail web.
