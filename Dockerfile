FROM php:7.2.0-cli-stretch

RUN pecl install xdebug-2.6.0alpha1 && docker-php-ext-enable xdebug
