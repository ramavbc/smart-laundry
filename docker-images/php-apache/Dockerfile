FROM php:7.4-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && a2enmod rewrite && service apache2 restart