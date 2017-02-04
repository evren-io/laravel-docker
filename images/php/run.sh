#!/usr/bin/env bash
if [ "$APPLICATION_LIVE" = 1 ]; then
    composer install --no-dev
    composer dump-autoload --optimize --no-dev
    cp images/php/ext-newrelic.ini /usr/local/etc/php/conf.d/newrelic.ini
    ./cache.sh prod
    php app/console salon:pop --env=prod
else
    composer install
    composer dump-autoload
    ./cache.sh dev
fi

chown -R www-data var/
chown -R www-data web/mediafile
chmod -R 777 var/

/etc/init.d/newrelic-sysmond start
/usr/sbin/sshd -D & /usr/local/sbin/php-fpm --nodaemonize
