FROM serversideup/php:8.4-cli

USER root

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

USER www-data

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY . .


