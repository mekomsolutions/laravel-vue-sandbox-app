#!/bin/sh

cd /var/www
/var/www/docker/wait-for-it.sh  $DB_CONNECTION:$DB_PORT
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan route:cache

/usr/bin/supervisord -c /etc/supervisord.conf
