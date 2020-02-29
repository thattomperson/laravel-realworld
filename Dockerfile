FROM php:7.3-apache-stretch

LABEL maintainer="Gbenga Oni B. <onigbenga@yahoo.ca>" \
      version="1.0"

COPY --chown=www-data:www-data . /srv/app

COPY vhost.conf /etc/apache2/sites-available/000-default.conf 

WORKDIR /srv/app

RUN docker-php-ext-install mbstring pdo \ 
    && a2enmod rewrite negotiation \
    && docker-php-ext-install opcache

RUN touch /srv/app/database/database.sqlite \
    && php artisan migrate