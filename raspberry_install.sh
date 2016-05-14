#!/bin/bash

#update apt-get repository
apt-get update

#install gpg
apt-get --assume-yes install gnupg

#install unzip
apt-get --assume-yes install unzip

#install rng-tools
apt-get --assume-yes install rng-tools

#install nginx php5-fpm
apt-get --assume-yes install nginx php5-fpm php5-cli php5-curl

#move configurations to nginx and php5-fpm and php5-cli and then restart
mv nginx.config /etc/nginx/sites-enabled/default

#create & unzip app.zip files to /var/www
mkdir -p /var/www
chmod 777 /var/www
unzip app.zip -d /var/www

#restart nginx
service restart nginx

#let rngd feed urandom
rngd -r /dev/urandom
