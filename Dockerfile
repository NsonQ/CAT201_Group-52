FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y openjdk-11-jdk

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
  && docker-php-ext-install zip


WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 82


