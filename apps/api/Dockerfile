FROM serversideup/php:8.4-fpm-nginx

USER root

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/html

COPY ../../core ../core

COPY ./apps/api/ .

RUN composer install --no-interaction --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/var /var/www/html/public \
    && chmod -R 775 /var/www/html/var /var/www/html/public

RUN bin/console d:m:m --no-interaction --all-or-nothing

USER www-data
