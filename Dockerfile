FROM php:7.0.4-fpm

# Install required repos, update, and then install PHP-FPM
RUN apt-get update -y && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libcurl4-gnutls-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt bcmath pdo_mysql curl mbstring mysqli zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd


RUN apt-get install -y supervisor git-core libmemcached-dev libmemcached11

RUN git clone https://github.com/php-memcached-dev/php-memcached && \
    cd php-memcached && \
    git checkout -b php7 origin/php7 && \
    /usr/local/bin/phpize && \
    ./configure --with-php-config=/usr/local/bin/php-config && \
    make && make install

ADD images/php/ext-memcached.ini /usr/local/etc/php/conf.d/memcached.ini
ADD images/php/php-custom.ini /usr/local/etc/php/conf.d/

RUN pecl install apcu

ADD images/php/ext-apc.ini /usr/local/etc/php/conf.d/

RUN docker-php-ext-install sockets

#################### <<<SUPERVISORD ####################

#################### <<<xhgui ####################

#################### >>>xhgui ####################

##### XDEBUG ####

RUN apt-get install -y wget

RUN wget https://xdebug.org/files/xdebug-2.4.0.tgz

RUN tar -xvf xdebug-2.4.0.tgz && cd xdebug-2.4.0/ && phpize && \
    ./configure --with-php-config=/usr/local/bin/php-config && make && make install

RUN apt-get install -y libicu-dev

RUN docker-php-ext-install intl
RUN docker-php-ext-install exif
##### XDEBUG ################

RUN mkdir /consumers
RUN mkdir /consumers/template
RUN touch /consumers/consumers.ini

WORKDIR /var/www/html/apiapps
RUN apt-get update -y && apt-get install -y libssh2-1-dev libssh2-1 unzip wget
RUN git clone https://github.com/php/pecl-networking-ssh2.git && \
        cd pecl-networking-ssh2 && \
        phpize && \
        ./configure --with-php-config=/usr/local/bin/php-config

RUN cd pecl-networking-ssh2 && \
        make && \
        make install

ADD images/php/ext-ssh2.ini /usr/local/etc/php/conf.d/ssh2.ini


RUN docker-php-ext-install exif
#################### >>>assetic ###################
RUN apt-get install -y npm
RUN npm install -g bower
RUN npm install -g grunt
RUN npm install -g gulp
RUN npm install -g uglifyjs
RUN npm install -g uglifycss
RUN ln -s /usr/bin/nodejs /usr/bin/node
#################### >>>assetic ###################

ADD images/php/php.ini /etc/php.ini

ENV TERM dumb

#################### <<<composer ###################
COPY images/php/auth.json /root/.composer/
ADD composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN composer global require hirak/prestissimo
#################### >>>composer ###################
ADD images/php/run.sh /run.sh
RUN chmod +x /run.sh
ENV XDEBUG_CONFIG="idekey=PHPSTORM"
ADD images/php/ext/apcu.so /usr/local/lib/php/extensions/no-debug-non-zts-20151012/
RUN pecl install mongodb
ADD images/php/ext-mongo.ini /usr/local/etc/php/conf.d/
ADD images/php/test.sh /test.sh
RUN chmod +x /test.sh

ADD images/php/cron.sh /cron.sh
RUN chmod +x /cron.sh
ADD images/php/slaver.sh /slaver.sh
RUN chmod +x /slaver.sh
RUN wget -O - https://download.newrelic.com/548C16BF.gpg | apt-key add -
RUN sh -c 'echo "deb http://apt.newrelic.com/debian/ newrelic non-free" > /etc/apt/sources.list.d/newrelic.list'
RUN apt-get update -y
RUN apt-get install newrelic-php5 -y
RUN apt-get install newrelic-sysmond -y
RUN nrsysmond-config --set license_key=244ed8f971d4558b76d786f4a17b1fe3fc5b0a0b
RUN newrelic-install install
# Port 9000 is how Nginx will communicate with PHP-FPM.
####### CRON ####
COPY images/php/supervisord/template/consumer.ini /consumers/template/consumer.ini
COPY images/php/supervisord/consumer.init.php /consumers/consumer.init.php
COPY images/php/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN php -f /consumers/consumer.init.php
###### END CRON ########
COPY images/php/ext-newrelic.ini /usr/local/etc/php/conf.d/newrelic.ini
RUN docker-php-ext-install opcache
ENV GIT_DIR=/var/www/html/apiapps
###### SSH ######
RUN apt-get install -y --force-yes openssh-server vim
RUN mkdir /var/run/sshd && echo 'root:root' | chpasswd
RUN sed -i 's/PermitRootLogin without-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd
RUN echo "export VISIBLE=now" >> /etc/profile
ADD images/php/ext-xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
ENV PHP_IDE_CONFIG serverName=lumen.local
# SSH
