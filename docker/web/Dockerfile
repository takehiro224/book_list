FROM php:8.1-rc-apache

ENV TZ Asia/Tokyo

RUN apt-get update && apt-get install -y vim libpq-dev

RUN docker-php-ext-install pdo

RUN docker-php-ext-install pdo_mysql

# RUN docker-php-ext-install mysqli