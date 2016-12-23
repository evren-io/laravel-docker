#!/usr/bin/env bash
rm -rf ../apiapps-dev
mkdir ../apiapps-dev
cp -R app/ ../apiapps-dev/
cp -R sr/ ../apiapps-dev/
mkdir ../apiapps-dev/web
cp web/*.php ../apiapps-dev/web/
cp -R web/ ../apiapps-dev/
cp -R core_test ../apiapps-dev/
cp -R feature ../apiapps-dev/
cp -R bin ../apiapps-dev/
cp cache.sh ../apiapps-dev/
cp composer* ../apiapps-dev/

cd ../apiapps-dev
composer install
app/console doctrine:cache:clear-query
app/console doctrine:cache:clear-metadata
php app/console assetic:dump
php app/console d:m:migrate -n
./cache.sh dev

chown -R www-data var/
chown -R www-data web/mediafile
chmod -R 777 var/
bin/phpunit -c app/
bin/codeception --config=core_tests/frontend_test/codeception.yml run acceptance --steps
