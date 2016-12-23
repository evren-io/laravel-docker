#!/usr/bin/env bash

chown -R www-data var/
chown -R www-data web/mediafile
chmod -R 777 var/

set -e
supervisord -c /etc/supervisor/conf.d/supervisord.conf
