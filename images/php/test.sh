#!/usr/bin/env bash
rm -rf ../saloneses-dev
mkdir ../saloneses-dev
cp -R app/ ../saloneses-dev/
cp -R sr/ ../saloneses-dev/
mkdir ../saloneses-dev/web
cp web/*.php ../saloneses-dev/web/
cp -R web/ ../saloneses-dev/
cp -R core_test ../saloneses-dev/
cp -R feature ../saloneses-dev/
cp -R bin ../saloneses-dev/
cp cache.sh ../saloneses-dev/
cp composer* ../saloneses-dev/

cd ../saloneses-dev
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