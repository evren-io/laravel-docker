#!/usr/bin/env bash
chown -R www-data var/
chown -R www-data web/mediafile
chmod -R 777 var/
bower install --allow-root
if [ "$APPLICATION_LIVE" = 1 ]; then
  app/console assetic:dump --env=prod
else
  app/console assetic:dump --env=dev
fi
/usr/local/sbin/php-fpm --nodaemonize
